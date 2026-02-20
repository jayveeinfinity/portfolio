<!-- SkillReactionNetwork.vue (Vue 3 <script setup>) -->
<template>
  <div class="relative rounded-3xl border border-slate-800 bg-slate-900/30 shadow-xl overflow-hidden">
    <canvas
      ref="canvasRef"
      class="block w-full h-[520px]"
      @click="onClick"
    ></canvas>

    <!-- Optional overlay -->
    <div
      class="pointer-events-none absolute left-4 top-4 text-xs text-slate-300/90 bg-slate-950/40 border border-slate-800 rounded-full px-3 py-1"
    >
      Click a node to trigger a chain reaction
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from "vue";

/**
 * Props (edit defaults as you like)
 */
const props = defineProps({
  skills: {
    type: Array,
    default: () => [
      "Laravel", "Vue 3", "MySQL", "REST API",
      "Docker", "Git", "C# .NET", "Tailwind",
      "Redis", "Linux", "CI/CD", "System Design",
    ],
  },
  bondDistance: { type: Number, default: 160 },
  floatRadius: { type: Number, default: 25 },      // how far nodes drift from base
  floatSpeedX: { type: Number, default: 0.0005 },  // horizontal wave speed
  floatSpeedY: { type: Number, default: 0.0004 },  // vertical wave speed
  nodeRadius: { type: Number, default: 28 },
  height: { type: Number, default: 520 },          // canvas CSS height in px
});

const canvasRef = ref(null);

let ctx = null;
let rafId = null;
let ro = null; // ResizeObserver

// Nodes state (no reactive needed for performance)
let nodes = [];
let dpr = 1;

function rand(min, max) {
  return min + Math.random() * (max - min);
}

function getCssSize() {
  const canvas = canvasRef.value;
  if (!canvas) return { w: 0, h: 0 };
  const rect = canvas.getBoundingClientRect();
  return { w: rect.width, h: rect.height };
}

/**
 * Resize canvas for HiDPI & correct drawing scale
 */
function resizeCanvas() {
  const canvas = canvasRef.value;
  if (!canvas) return;

  const { w, h } = getCssSize();
  dpr = Math.max(1, window.devicePixelRatio || 1);

  canvas.width = Math.floor(w * dpr);
  canvas.height = Math.floor(h * dpr);

  ctx = canvas.getContext("2d");
  // Draw using CSS pixels
  ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

  // Re-seed nodes if needed (e.g. first load)
  if (!nodes.length) initNodes();
  // Keep nodes within new bounds
  clampBasePositions();
}

function initNodes() {
  const { w, h } = getCssSize();
  const pad = 90;

  nodes = props.skills.map((label) => ({
    label,
    baseX: rand(pad, Math.max(pad + 1, w - pad)),
    baseY: rand(pad, Math.max(pad + 1, h - pad)),
    x: 0,
    y: 0,
    r: props.nodeRadius,
    floatOffset: Math.random() * 1000,
    energy: 0, // 0..1
  }));
}

function clampBasePositions() {
  const { w, h } = getCssSize();
  const pad = 60;

  for (const n of nodes) {
    n.baseX = Math.min(Math.max(n.baseX, pad), Math.max(pad, w - pad));
    n.baseY = Math.min(Math.max(n.baseY, pad), Math.max(pad, h - pad));
  }
}

/**
 * Interaction: click to energize a node
 */
function onClick(e) {
  const canvas = canvasRef.value;
  if (!canvas) return;

  const rect = canvas.getBoundingClientRect();
  const x = e.clientX - rect.left;
  const y = e.clientY - rect.top;

  for (const n of nodes) {
    const dx = x - n.x;
    const dy = y - n.y;
    if (Math.hypot(dx, dy) < n.r) {
      n.energy = 1;
      break;
    }
  }
}

/**
 * Render loop (smooth drifting, no shaking)
 */
function draw(time) {
  if (!ctx) return;

  const { w, h } = getCssSize();
  ctx.clearRect(0, 0, w, h);

  // Subtle vignette background
  const vg = ctx.createRadialGradient(w / 2, h / 2, Math.min(w, h) * 0.12, w / 2, h / 2, Math.min(w, h) * 0.7);
  vg.addColorStop(0, "rgba(2,6,23,0.0)");
  vg.addColorStop(1, "rgba(2,6,23,0.55)");
  ctx.fillStyle = vg;
  ctx.fillRect(0, 0, w, h);

  // Update smooth floating motion + energy decay
  for (const n of nodes) {
    n.x = n.baseX + Math.sin(time * props.floatSpeedX + n.floatOffset) * props.floatRadius;
    n.y = n.baseY + Math.cos(time * props.floatSpeedY + n.floatOffset) * props.floatRadius;
    n.energy *= 0.985;
    if (n.energy < 0.001) n.energy = 0;
  }

  // Draw connections + chain reaction propagation
  for (let i = 0; i < nodes.length; i++) {
    for (let j = i + 1; j < nodes.length; j++) {
      const a = nodes[i];
      const b = nodes[j];

      const dx = b.x - a.x;
      const dy = b.y - a.y;
      const dist = Math.hypot(dx, dy);

      if (dist < props.bondDistance) {
        const proximity = 1 - dist / props.bondDistance;
        const energy = Math.max(a.energy, b.energy);

        ctx.strokeStyle = `rgba(148,163,184,${0.15 + proximity * 0.4 + energy * 0.5})`;
        ctx.lineWidth = 1.5 + energy * 2;

        ctx.beginPath();
        ctx.moveTo(a.x, a.y);
        ctx.lineTo(b.x, b.y);
        ctx.stroke();

        // Chain reaction propagation (gentle)
        if (a.energy > 0.6 && b.energy < 0.4) b.energy = Math.min(1, b.energy + 0.02);
        if (b.energy > 0.6 && a.energy < 0.4) a.energy = Math.min(1, a.energy + 0.02);

        // Optional "electron" dot (slow travel)
        if (proximity > 0.25) {
          const tt = time * 0.00006;
          const p = (Math.sin(tt + (i * 7 + j * 11)) + 1) / 2;
          const ex = a.x + dx * p;
          const ey = a.y + dy * p;
          ctx.fillStyle = `rgba(226,232,240,${0.08 + proximity * 0.22 + energy * 0.28})`;
          ctx.beginPath();
          ctx.arc(ex, ey, 2.2 + energy * 2.2, 0, Math.PI * 2);
          ctx.fill();
        }
      }
    }
  }

  // Draw nodes + glow + labels
  for (const n of nodes) {
    const e = n.energy;

    // Node fill
    ctx.beginPath();
    ctx.arc(n.x, n.y, n.r, 0, Math.PI * 2);
    ctx.fillStyle = "rgba(2,6,23,0.85)";
    ctx.fill();

    // Ring
    ctx.lineWidth = 2 + e * 3;
    ctx.strokeStyle = `rgba(226,232,240,${0.4 + e * 0.6})`;
    ctx.stroke();

    // Glow
    if (e > 0.05) {
      ctx.beginPath();
      ctx.arc(n.x, n.y, n.r + 8 + e * 10, 0, Math.PI * 2);
      ctx.strokeStyle = `rgba(226,232,240,${0.08 + e * 0.2})`;
      ctx.lineWidth = 10;
      ctx.stroke();
    }

    // Label
    const fontSize = Math.max(10, Math.min(14, 16 - (n.label.length * 0.25)));
    ctx.font = `600 ${fontSize}px ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto`;
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";

    // tiny shadow
    ctx.fillStyle = "rgba(2,6,23,0.65)";
    ctx.fillText(n.label, n.x + 1, n.y + 1);

    ctx.fillStyle = `rgba(241,245,249,${0.9 + e * 0.1})`;
    ctx.fillText(n.label, n.x, n.y);
  }

  rafId = requestAnimationFrame(draw);
}

onMounted(() => {
  // set canvas height from prop (Tailwind class is fine too, but this ensures correct CSS height if you want dynamic)
  const canvas = canvasRef.value;
  if (canvas) {
    canvas.style.height = `${props.height}px`;
  }

  resizeCanvas();

  // ResizeObserver to handle container size changes (not just window resize)
  ro = new ResizeObserver(() => {
    // If the element changes size, resize the canvas (keeps crisp rendering)
    resizeCanvas();
  });
  ro.observe(canvasRef.value);

  rafId = requestAnimationFrame(draw);
});

onBeforeUnmount(() => {
  if (rafId) cancelAnimationFrame(rafId);
  if (ro && canvasRef.value) ro.unobserve(canvasRef.value);
  ro = null;
});

/**
 * If skills change, re-init nodes (safe and simple)
 */
watch(
  () => props.skills,
  () => {
    initNodes();
  },
  { deep: true }
);
</script>