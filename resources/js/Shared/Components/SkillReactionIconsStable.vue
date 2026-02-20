<template>
  <div
    class="relative w-full max-w-4xl aspect-square rounded-3xl border border-slate-800 bg-slate-900/30 shadow-xl overflow-hidden select-none"
  >
    <canvas
      ref="canvasRef"
      class="w-full h-full block"
      @pointerdown="onPointerDown"
      @pointermove="onPointerMove"
      @pointerup="onPointerUp"
      @pointercancel="onPointerUp"
      @pointerleave="onPointerUp"
    ></canvas>

    <div
      class="pointer-events-none absolute left-4 top-4 text-xs text-slate-300/90 bg-slate-950/40 border border-slate-800 rounded-full px-3 py-1"
    >
      Drag & throw • Bonds • Collide = color • Fades after 3s since last bump
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from "vue";

const props = defineProps({
  // icons
  skills: {
    type: Array,
    default: () => [
      { key: "laravel", src: "/icons/laravel.svg" },
      { key: "vue", src: "/icons/vue.svg" },
      { key: "mysql", src: "/icons/mysql.svg" },
      { key: "docker", src: "/icons/docker.svg" },
      { key: "git", src: "/icons/git.svg" },
      { key: "dotnet", src: "/icons/dotnet.svg" },
      { key: "redis", src: "/icons/redis.svg" },
      { key: "linux", src: "/icons/linux.svg" },
      { key: "tailwind", src: "/icons/tailwind.svg" },
    ],
  },

  // node sizing
  nodeRadius: { type: Number, default: 30 },
  radiusJitter: { type: Number, default: 8 },
  iconPadding: { type: Number, default: 10 },

  // motion
  minSpeed: { type: Number, default: 35 }, // px/sec
  maxSpeed: { type: Number, default: 90 }, // px/sec
  restitution: { type: Number, default: 0.98 }, // 1=perfectly elastic
  friction: { type: Number, default: 0.999 }, // velocity decay

  // collision solver stability
  iterations: { type: Number, default: 2 },

  // bonds / chemical vibe
  bondDistance: { type: Number, default: 190 },
  showElectronDots: { type: Boolean, default: true },

  // color reaction timing
  colorHoldSeconds: { type: Number, default: 3 }, // stay full color for 3s after last collision
  fadeSeconds: { type: Number, default: 0.6 }, // fade duration AFTER hold (tweak)
});

const canvasRef = ref(null);

let ctx = null;
let rafId = null;
let ro = null;
let lastT = 0;
let dpr = 1;

let nodes = [];
let imageMap = new Map();

// drag + throw state
const drag = {
  pointerId: null,
  node: null,
  offsetX: 0,
  offsetY: 0,
  lastX: 0,
  lastY: 0,
  lastTime: 0,
};

// utils
function rand(min, max) {
  return min + Math.random() * (max - min);
}
function clamp(v, min, max) {
  return Math.min(Math.max(v, min), max);
}
function getCssSize() {
  const rect = canvasRef.value.getBoundingClientRect();
  return { w: rect.width, h: rect.height };
}

function resizeCanvas() {
  const { w, h } = getCssSize();
  dpr = Math.max(1, window.devicePixelRatio || 1);

  const canvas = canvasRef.value;
  canvas.width = Math.floor(w * dpr);
  canvas.height = Math.floor(h * dpr);

  ctx = canvas.getContext("2d");
  ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

  if (nodes.length) clampNodesIntoBounds();
}

function clampNodesIntoBounds() {
  const { w, h } = getCssSize();
  for (const n of nodes) {
    n.x = clamp(n.x, n.r, w - n.r);
    n.y = clamp(n.y, n.r, h - n.r);
  }
}

async function loadImages() {
  imageMap.clear();

  const loaders = props.skills.map((s) => {
    return new Promise((resolve) => {
      const img = new Image();
      // If icons are hosted elsewhere, enable CORS and uncomment:
      // img.crossOrigin = "anonymous";
      img.onload = () => resolve({ key: s.key, img, ok: true });
      img.onerror = () => resolve({ key: s.key, img: null, ok: false });
      img.src = s.src;
    });
  });

  const results = await Promise.all(loaders);
  for (const r of results) {
    if (r.ok && r.img) imageMap.set(r.key, r.img);
  }
}

function initNodes() {
  const { w, h } = getCssSize();

  nodes = props.skills.map((s, i) => {
    const r = Math.max(18, props.nodeRadius + rand(-props.radiusJitter, props.radiusJitter));
    const x = rand(r, Math.max(r + 1, w - r));
    const y = rand(r, Math.max(r + 1, h - r));

    const ang = rand(0, Math.PI * 2);
    const spd = rand(props.minSpeed, props.maxSpeed);

    return {
      id: i,
      key: s.key,
      x,
      y,
      vx: Math.cos(ang) * spd,
      vy: Math.sin(ang) * spd,
      r,
      mass: r * r,

      // reaction timing
      lastCollisionAt: -1e9, // timestamp in seconds
    };
  });

  separateOverlaps(4);
}

/**
 * Keep nodes from starting overlapped.
 */
function separateOverlaps(passes = 3) {
  for (let p = 0; p < passes; p++) {
    for (let i = 0; i < nodes.length; i++) {
      for (let j = i + 1; j < nodes.length; j++) {
        const a = nodes[i];
        const b = nodes[j];
        const dx = b.x - a.x;
        const dy = b.y - a.y;
        const dist = Math.hypot(dx, dy);
        const minDist = a.r + b.r;

        if (dist === 0 || dist >= minDist) continue;

        const nx = dx / dist;
        const ny = dy / dist;
        const overlap = minDist - dist;

        a.x -= nx * overlap * 0.5;
        a.y -= ny * overlap * 0.5;
        b.x += nx * overlap * 0.5;
        b.y += ny * overlap * 0.5;
      }
    }
    clampNodesIntoBounds();
  }
}

/**
 * Collision reaction: reset timer.
 */
function markCollision(a, b, nowSec) {
  a.lastCollisionAt = nowSec;
  b.lastCollisionAt = nowSec;
}

/**
 * Color strength based on time since last collision.
 * - Full color for colorHoldSeconds
 * - Then fade to grayscale over fadeSeconds
 */
function colorStrength(node, nowSec) {
  const dt = nowSec - node.lastCollisionAt;

  if (dt <= props.colorHoldSeconds) return 1;

  const fadeT = (dt - props.colorHoldSeconds) / Math.max(0.0001, props.fadeSeconds);
  // 0..1 fade progress
  const t = clamp(fadeT, 0, 1);
  // ease-out fade (nicer than linear)
  const eased = 1 - (1 - t) * (1 - t);
  return 1 - eased; // 1 -> 0
}

/* --------------------- Drag + Throw --------------------- */

function getPointerPos(e) {
  const rect = canvasRef.value.getBoundingClientRect();
  return { x: e.clientX - rect.left, y: e.clientY - rect.top };
}

function hitTest(x, y) {
  let best = null;
  let bestD = Infinity;
  for (const n of nodes) {
    const d = Math.hypot(x - n.x, y - n.y);
    if (d <= n.r && d < bestD) {
      bestD = d;
      best = n;
    }
  }
  return best;
}

function onPointerDown(e) {
  canvasRef.value.setPointerCapture?.(e.pointerId);

  const { x, y } = getPointerPos(e);
  const n = hitTest(x, y);
  if (!n) return;

  drag.pointerId = e.pointerId;
  drag.node = n;

  drag.offsetX = x - n.x;
  drag.offsetY = y - n.y;

  drag.lastX = x;
  drag.lastY = y;
  drag.lastTime = performance.now();

  // stop while dragging
  n.vx = 0;
  n.vy = 0;
  n.dragging = true;
}

function onPointerMove(e) {
  if (drag.pointerId !== e.pointerId || !drag.node) return;

  const n = drag.node;
  const { x, y } = getPointerPos(e);

  // move node
  n.x = x - drag.offsetX;
  n.y = y - drag.offsetY;
  clampNodesIntoBounds();

  // compute throw velocity from pointer movement
  const now = performance.now();
  const dt = Math.max(1, now - drag.lastTime); // ms
  const dx = x - drag.lastX;
  const dy = y - drag.lastY;

  n._throwVx = (dx / dt) * 1000;
  n._throwVy = (dy / dt) * 1000;

  drag.lastX = x;
  drag.lastY = y;
  drag.lastTime = now;

  // push neighbors out immediately for good feel while dragging
  resolveDraggedCollisions(n);
}

function onPointerUp(e) {
  if (drag.pointerId !== e.pointerId) return;

  const n = drag.node;
  if (n) {
    n.dragging = false;

    const maxThrow = props.maxSpeed * 2.4;
    n.vx = clamp(n._throwVx ?? 0, -maxThrow, maxThrow);
    n.vy = clamp(n._throwVy ?? 0, -maxThrow, maxThrow);

    delete n._throwVx;
    delete n._throwVy;
  }

  drag.pointerId = null;
  drag.node = null;
}

/**
 * While dragging, collisions feel immediate (like billiards).
 */
function resolveDraggedCollisions(dragged) {
  for (const other of nodes) {
    if (other === dragged) continue;

    const dx = other.x - dragged.x;
    const dy = other.y - dragged.y;
    const dist = Math.hypot(dx, dy);
    const minDist = other.r + dragged.r;

    if (dist === 0 || dist >= minDist) continue;

    const nx = dx / dist;
    const ny = dy / dist;
    const overlap = minDist - dist;

    other.x += nx * overlap;
    other.y += ny * overlap;

    // kick away (chemical bump)
    const kick = Math.min(400, overlap * 22);
    other.vx += nx * kick;
    other.vy += ny * kick;
  }

  clampNodesIntoBounds();
}

/* --------------------- Physics + Bonds --------------------- */

function updateMotion(dtSec) {
  const { w, h } = getCssSize();
  const f = Math.pow(props.friction, dtSec * 60);

  for (const n of nodes) {
    if (n.dragging) continue;

    n.x += n.vx * dtSec;
    n.y += n.vy * dtSec;

    // bounce edges (and treat as “collision” too)
    if (n.x <= n.r) {
      n.x = n.r;
      n.vx = Math.abs(n.vx) * props.restitution;
    } else if (n.x >= w - n.r) {
      n.x = w - n.r;
      n.vx = -Math.abs(n.vx) * props.restitution;
    }

    if (n.y <= n.r) {
      n.y = n.r;
      n.vy = Math.abs(n.vy) * props.restitution;
    } else if (n.y >= h - n.r) {
      n.y = h - n.r;
      n.vy = -Math.abs(n.vy) * props.restitution;
    }

    // friction
    n.vx *= f;
    n.vy *= f;
  }
}

/**
 * Billiards: resolve overlap + apply elastic impulse.
 * Also triggers collision reaction timer reset.
 */
function solveCollisions(nowSec) {
  for (let pass = 0; pass < props.iterations; pass++) {
    for (let i = 0; i < nodes.length; i++) {
      for (let j = i + 1; j < nodes.length; j++) {
        const a = nodes[i];
        const b = nodes[j];

        const dx = b.x - a.x;
        const dy = b.y - a.y;
        const dist = Math.hypot(dx, dy);
        const minDist = a.r + b.r;

        if (dist === 0 || dist >= minDist) continue;

        const nx = dx / dist;
        const ny = dy / dist;

        // 1) separate
        const overlap = minDist - dist;
        const invMa = 1 / a.mass;
        const invMb = 1 / b.mass;
        const invSum = invMa + invMb;

        const moveA = overlap * (invMa / invSum);
        const moveB = overlap * (invMb / invSum);

        if (!a.dragging) {
          a.x -= nx * moveA;
          a.y -= ny * moveA;
        }
        if (!b.dragging) {
          b.x += nx * moveB;
          b.y += ny * moveB;
        }

        // 2) impulse
        const rvx = b.vx - a.vx;
        const rvy = b.vy - a.vy;
        const velAlongNormal = rvx * nx + rvy * ny;

        // if separating, skip impulse
        if (velAlongNormal > 0) {
          // still counts as “contact” only if overlapped
          markCollision(a, b, nowSec);
          continue;
        }

        const e = props.restitution;
        const jImpulse = -(1 + e) * velAlongNormal / (invMa + invMb);
        const ix = jImpulse * nx;
        const iy = jImpulse * ny;

        if (!a.dragging) {
          a.vx -= ix * invMa;
          a.vy -= iy * invMa;
        }
        if (!b.dragging) {
          b.vx += ix * invMb;
          b.vy += iy * invMb;
        }

        // collision reaction => reset “3s then fade” timer
        markCollision(a, b, nowSec);
      }
    }
    clampNodesIntoBounds();
  }
}

/* --------------------- Drawing --------------------- */

function drawBackground(w, h) {
  // subtle vignette
  const g = ctx.createRadialGradient(w / 2, h / 2, Math.min(w, h) * 0.1, w / 2, h / 2, Math.min(w, h) * 0.75);
  g.addColorStop(0, "rgba(2,6,23,0)");
  g.addColorStop(1, "rgba(2,6,23,0.55)");
  ctx.fillStyle = g;
  ctx.fillRect(0, 0, w, h);
}

function coverRect(srcW, srcH, dstW, dstH) {
  const srcRatio = srcW / srcH;
  const dstRatio = dstW / dstH;

  let sw = srcW, sh = srcH, sx = 0, sy = 0;

  if (srcRatio > dstRatio) {
    sh = srcH;
    sw = Math.round(sh * dstRatio);
    sx = Math.round((srcW - sw) / 2);
  } else {
    sw = srcW;
    sh = Math.round(sw / dstRatio);
    sy = Math.round((srcH - sh) / 2);
  }
  return { sx, sy, sw, sh };
}

function drawBonds(nowSec) {
  const bd = props.bondDistance;

  for (let i = 0; i < nodes.length; i++) {
    for (let j = i + 1; j < nodes.length; j++) {
      const a = nodes[i];
      const b = nodes[j];

      const dx = b.x - a.x;
      const dy = b.y - a.y;
      const dist = Math.hypot(dx, dy);
      if (dist >= bd) continue;

      const proximity = 1 - dist / bd;

      // bond intensity stronger if recently collided (more “reactive”)
      const ca = colorStrength(a, nowSec);
      const cb = colorStrength(b, nowSec);
      const energy = Math.max(ca, cb);

      ctx.strokeStyle = `rgba(148,163,184,${0.10 + proximity * 0.42 + energy * 0.45})`;
      ctx.lineWidth = 1.2 + proximity * 0.8 + energy * 2;

      ctx.beginPath();
      ctx.moveTo(a.x, a.y);
      ctx.lineTo(b.x, b.y);
      ctx.stroke();

      // electron dot traveling along bond
      if (props.showElectronDots && proximity > 0.25) {
        const t = performance.now() * 0.00008;
        const p = (Math.sin(t + (a.id * 7 + b.id * 11)) + 1) / 2;
        const ex = a.x + dx * p;
        const ey = a.y + dy * p;

        ctx.fillStyle = `rgba(226,232,240,${0.06 + proximity * 0.18 + energy * 0.35})`;
        ctx.beginPath();
        ctx.arc(ex, ey, 2 + energy * 2.5, 0, Math.PI * 2);
        ctx.fill();
      }
    }
  }
}

function drawNode(n, nowSec) {
  const img = imageMap.get(n.key);
  if (!img) return;

  const c = colorStrength(n, nowSec); // 0..1
  const gray = 1 - c;

  // base circle
  ctx.beginPath();
  ctx.arc(n.x, n.y, n.r, 0, Math.PI * 2);
  ctx.fillStyle = "rgba(2,6,23,0.85)";
  ctx.fill();

  // ring reacts slightly
  ctx.lineWidth = 2 + c * 2.5;
  ctx.strokeStyle = `rgba(226,232,240,${0.30 + c * 0.6})`;
  ctx.stroke();

  // glow when colored
  if (c > 0.05) {
    ctx.beginPath();
    ctx.arc(n.x, n.y, n.r + 8 + c * 10, 0, Math.PI * 2);
    ctx.strokeStyle = `rgba(226,232,240,${0.06 + c * 0.18})`;
    ctx.lineWidth = 10;
    ctx.stroke();
  }

  // icon clipped
  ctx.save();
  ctx.beginPath();
  ctx.arc(n.x, n.y, n.r - 2, 0, Math.PI * 2);
  ctx.clip();

  ctx.filter = `grayscale(${gray})`;

  const size = n.r * 2 - props.iconPadding * 2;
  const { sx, sy, sw, sh } = coverRect(img.width, img.height, size, size);
  ctx.drawImage(img, sx, sy, sw, sh, n.x - size / 2, n.y - size / 2, size, size);

  ctx.restore();
}

/* --------------------- Loop --------------------- */

function frame(t) {
  if (!ctx) return;

  if (!lastT) lastT = t;
  const dtMs = Math.min(34, t - lastT);
  lastT = t;
  const dtSec = dtMs / 1000;

  const nowSec = t / 1000;

  const { w, h } = getCssSize();
  ctx.clearRect(0, 0, w, h);
  drawBackground(w, h);

  updateMotion(dtSec);
  solveCollisions(nowSec);

  drawBonds(nowSec);
  for (const n of nodes) drawNode(n, nowSec);

  rafId = requestAnimationFrame(frame);
}

/* --------------------- Lifecycle --------------------- */

onMounted(async () => {
  resizeCanvas();
  initNodes();
  await loadImages();

  ro = new ResizeObserver(() => resizeCanvas());
  ro.observe(canvasRef.value);

  rafId = requestAnimationFrame(frame);
});

onBeforeUnmount(() => {
  if (rafId) cancelAnimationFrame(rafId);
  if (ro) ro.disconnect();
});

watch(
  () => props.skills,
  async () => {
    initNodes();
    await loadImages();
  },
  { deep: true }
);
</script>