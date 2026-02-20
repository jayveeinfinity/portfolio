<template>
    <div class="w-full max-w-4xl mx-auto">
        <!-- CARTOON HUD (outside canvas) -->
        <div class="mb-4">
            <h1 class="my-4 text-6xl md:text-8xl font-black leading-[0.9] tracking-tighter uppercase italic drop-shadow-[4px_4px_0px_rgba(212,17,17,1)] text-center">
                SKILL <span class="text-primary">REACTOR!</span>
            </h1>
            <div class="grid gap-3 sm:grid-cols-3">
                <!-- SCORE CARD -->
                <div class="relative rounded-3xl border-4 border-slate-950 bg-yellow-200 shadow-[6px_6px_0_0_rgb(2,6,23)] p-4">
                    <div class="absolute -top-3 -left-3 rotate-[-8deg] rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-[11px] text-black tracking-wide shadow-[4px_4px_0_0_rgb(2,6,23)]">
                        SCORE!
                    </div>

                    <div class="flex items-end justify-between gap-3">
                        <div>
                        <div class="text-[11px] text-black tracking-wide text-slate-900/80">TOTAL</div>
                        <div class="mt-1 text-4xl text-black leading-none text-slate-950 tabular-nums">
                            {{ Math.floor(score) }}
                        </div>
                        </div>

                        <div class="flex flex-col items-end gap-2">
                        <div class="rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-xs text-black shadow-[3px_3px_0_0_rgb(2,6,23)]">
                            x {{ streak }}
                            <span class="text-slate-500 text-black">STREAK</span>
                        </div>

                        <div class="rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-xs text-black shadow-[3px_3px_0_0_rgb(2,6,23)]">
                            {{ comboLabel }}
                            <span class="text-slate-500 text-black">COMBO</span>
                        </div>
                        </div>
                    </div>

                    <div class="mt-3 text-[11px] font-bold text-slate-950/80">
                        Hold the player circle to gain points. Combo unlocks after <span class="text-black">20s</span>.
                    </div>
                </div>

                <!-- LIVES CARD -->
                <div class="relative rounded-3xl border-4 border-slate-950 bg-pink-200 shadow-[6px_6px_0_0_rgb(2,6,23)] p-4">
                    <div class="absolute -top-3 -left-3 rotate-[6deg] rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-[11px] text-black tracking-wide shadow-[4px_4px_0_0_rgb(2,6,23)]">
                        LIVES!
                    </div>

                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <div class="text-[11px] text-black tracking-wide text-slate-900/80">HP</div>
                            <div class="mt-1 flex items-center gap-1.5">
                                <span v-for="i in livesMax" :key="i" class="text-2xl leading-none">
                                <span v-if="i <= lives">❤️</span>
                                <span v-else class="opacity-30">🤍</span>
                                </span>
                            </div>
                        </div>

                        <div class="text-right">
                            <div class="rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-xs text-black shadow-[3px_3px_0_0_rgb(2,6,23)]">
                                LVL {{ difficultyLevel }}
                                <span class="text-slate-500 text-black">DIFF</span>
                            </div>

                            <div class="mt-2 rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-xs text-black shadow-[3px_3px_0_0_rgb(2,6,23)]">
                                <span class="tabular-nums">{{ survivalSeconds.toFixed(1) }}s</span>
                                <span class="text-slate-500 text-black">TIME</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 flex items-center justify-between gap-2">
                        <div class="text-[11px] font-bold text-slate-950/80">
                        Hit = lose a life.
                        </div>

                        <div
                        v-if="invulnLeft > 0"
                        class="rounded-full border-4 border-slate-950 bg-cyan-200 px-3 py-1 text-[11px] text-black shadow-[3px_3px_0_0_rgb(2,6,23)]"
                        >
                        SHIELD {{ invulnLeft.toFixed(1) }}s
                        </div>
                    </div>
                </div>

                <!-- BEST CARD -->
                <div class="relative rounded-3xl border-4 border-slate-950 bg-lime-200 shadow-[6px_6px_0_0_rgb(2,6,23)] p-4">
                    <div class="absolute -top-3 -left-3 rotate-[-4deg] rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-[11px] text-black tracking-wide shadow-[4px_4px_0_0_rgb(2,6,23)]">
                        BEST!
                    </div>

                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <div class="text-[11px] text-black tracking-wide text-slate-900/80">HIGHSCORE</div>
                            <div class="mt-1 text-3xl text-black leading-none text-slate-950 tabular-nums">
                                {{ bestScore }}
                            </div>
                            <div class="mt-1 text-sm text-black text-slate-950/80 truncate max-w-[14rem]">
                                {{ bestName }}
                            </div>
                        </div>

                        <div class="hidden sm:flex flex-col items-end gap-2">
                            <div class="rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-xs text-black shadow-[3px_3px_0_0_rgb(2,6,23)]">
                                Drag + Throw
                            </div>
                            <div class="rounded-2xl border-4 border-slate-950 bg-white px-3 py-1 text-xs text-black shadow-[3px_3px_0_0_rgb(2,6,23)]">
                                Don’t Touch!
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-[11px] font-bold text-slate-950/80">
                        Your score saves to the local leaderboard. Beat the best!
                    </div>
                </div>
            </div>

            <!-- COMIC STRIP TIP BAR -->
            <div class="mt-3 flex flex-wrap items-center gap-2">
                <div class="rounded-full border-4 border-slate-950 bg-white px-4 py-2 text-[12px] text-black shadow-[4px_4px_0_0_rgb(2,6,23)]">
                💥 Collide = color flash
                </div>
                <div class="rounded-full border-4 border-slate-950 bg-white px-4 py-2 text-[12px] text-black shadow-[4px_4px_0_0_rgb(2,6,23)]">
                🧪 Bonds = chemical links
                </div>
                <div class="rounded-full border-4 border-slate-950 bg-white px-4 py-2 text-[12px] text-black shadow-[4px_4px_0_0_rgb(2,6,23)]">
                ⚡ Survive 20s = combo boost
                </div>
            </div>
        </div>

        <!-- Square Canvas Wrapper (canvas only) -->
        <div class="relative w-full aspect-square rounded-3xl border border-slate-800 bg-slate-900/30 shadow-xl overflow-hidden select-none">
            <canvas
                ref="canvasRef"
                class="w-full h-full block"
                @pointerdown="onPointerDown"
                @pointermove="onPointerMove"
                @pointerup="onPointerUp"
                @pointercancel="onPointerUp"
                @pointerleave="onPointerUp"
            ></canvas>

            <!-- Leaderboard stays inside canvas (top-right) -->
            <div class="absolute right-4 top-4 w-64 hidden sm:block">
                <div class="rounded-2xl border border-slate-800 bg-slate-950/45 px-3 py-2">
                    <div class="text-xs font-semibold text-slate-200 mb-2">Global Leaderboard (Simulated)</div>
                    <ol class="space-y-1 text-[11px]">
                        <li
                        v-for="(r, idx) in leaderboard"
                        :key="r.name + '_' + r.score + '_' + idx"
                        class="flex items-center justify-between text-slate-300"
                        >
                        <span class="truncate max-w-[140px]">
                            <span class="text-slate-500 mr-1">{{ idx + 1 }}.</span>{{ r.name }}
                        </span>
                        <span class="tabular-nums text-slate-200">{{ r.score }}</span>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Game Over Modal stays inside canvas -->
            <div v-if="gameState === 'over'" class="absolute inset-0 grid place-items-center bg-slate-950/65 backdrop-blur-sm">
                <div class="w-[92%] max-w-md rounded-3xl border border-slate-800 bg-slate-900/70 shadow-2xl p-5">
                    <div class="text-lg font-semibold">Game Over</div>

                    <div class="mt-1 text-slate-300 text-sm">
                        Final score:
                        <span class="font-semibold tabular-nums">{{ Math.floor(score) }}</span>
                    </div>

                    <div class="mt-2 text-slate-400 text-[12px]">
                        Survived:
                        <span class="tabular-nums">{{ survivalSeconds.toFixed(1) }}s</span>
                        • Combo:
                        <span class="tabular-nums">{{ comboLabel }}</span>
                        • Difficulty:
                        <span class="tabular-nums">{{ difficultyLevel }}</span>
                    </div>

                    <div class="mt-4 space-y-2">
                        <label class="text-xs text-slate-400">Name</label>
                        <input
                        v-model="playerName"
                        class="w-full rounded-xl bg-slate-950/60 border border-slate-800 px-3 py-2 text-sm outline-none focus:border-slate-600"
                        placeholder="e.g., Jayvee"
                        maxlength="24"
                        />
                    </div>

                    <div class="mt-4 flex gap-2">
                        <button
                        class="flex-1 rounded-xl bg-slate-100 text-slate-950 font-semibold py-2 hover:opacity-90 active:opacity-80"
                        @click="saveAndRestart"
                        >
                        Save & Restart
                        </button>
                        <button class="flex-1 rounded-xl border border-slate-700 py-2 hover:bg-slate-800/40" @click="restart">
                        Restart (no save)
                        </button>
                    </div>

                    <div class="mt-3 text-[11px] text-slate-400">
                        Leaderboard is simulated in this browser (stored in localStorage).
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { computed, ref, onMounted, onBeforeUnmount, watch } from "vue";

    const props = defineProps({
        hud: { type: Object, default: null },
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

        // sizing
        nodeRadius: { type: Number, default: 30 },
        radiusJitter: { type: Number, default: 8 },
        iconPadding: { type: Number, default: 10 },

        // motion
        minSpeed: { type: Number, default: 35 },
        maxSpeed: { type: Number, default: 90 },
        restitution: { type: Number, default: 0.98 },
        friction: { type: Number, default: 0.999 },
        iterations: { type: Number, default: 2 },

        // bonds
        bondDistance: { type: Number, default: 190 },
        showElectronDots: { type: Boolean, default: true },

        // collision color timing
        colorHoldSeconds: { type: Number, default: 3 },
        fadeSeconds: { type: Number, default: 0.6 },

        // scoring
        baseScorePerSecond: { type: Number, default: 10 },
        streakEverySeconds: { type: Number, default: 5 },

        // lives + invulnerability
        livesMax: { type: Number, default: 3 },
        invulnSeconds: { type: Number, default: 1.2 },

        // difficulty scaling
        speedStepScore: { type: Number, default: 500 },  // each 500 points => step up
        stepSpeedMultiplier: { type: Number, default: 1.12 },
        smoothSpeedCurve: { type: Number, default: 0.18 }, // strength of smooth curve (score-based)
        maxNodeSpeed: { type: Number, default: 280 },

        // combo bonus
        comboUnlockSeconds: { type: Number, default: 20 },
        comboRampPerSecond: { type: Number, default: 0.04 }, // after unlock, combo increases gradually
        comboMax: { type: Number, default: 3.0 },            // max combo multiplier
    });

    const canvasRef = ref(null);
    let ctx = null;
    let rafId = null;
    let ro = null;
    let lastT = 0;
    let dpr = 1;

    let nodes = [];
    let imageMap = new Map();

    // particles for explosions
    let particles = [];

    const gameState = ref("idle"); // idle | running | over
    const score = ref(0);
    const streak = ref(1);
    const lives = ref(props.livesMax);
    const livesMax = props.livesMax;

    const invulnLeft = ref(0); // seconds remaining
    const survivalSeconds = ref(0);

    const playerName = ref("");
    let playerNode = null;

    // Hold tracking
    let holdTimeSec = 0;
    let nextStreakAt = props.streakEverySeconds;

    // difficulty state
    let speedLevel = 0;
    const difficultyLevel = computed(() => speedLevel);

    // combo state
    const combo = ref(1); // multiplier applied to scoring after unlock
    const comboLabel = computed(() => combo.value.toFixed(2) + "x");

    // leaderboard
    const STORAGE_BEST = "skill_reaction_best";
    const STORAGE_LB = "skill_reaction_leaderboard";
    const best = ref({ name: "None", score: 0 });
    const leaderboard = ref([]);

    // drag + throw
    const drag = {
        pointerId: null,
        node: null,
        offsetX: 0,
        offsetY: 0,
        lastX: 0,
        lastY: 0,
        lastTime: 0,
    };

    // ---------------- utils ----------------
    const rand = (min, max) => { return min + Math.random() * (max - min); }
    const clamp = (v, min, max) => { return Math.min(Math.max(v, min), max); }

    const getCssSize =() => {
        const rect = canvasRef.value.getBoundingClientRect();
        return { w: rect.width, h: rect.height };
    }

    const resizeCanvas = () => {
        const { w, h } = getCssSize();
        dpr = Math.max(1, window.devicePixelRatio || 1);

        const canvas = canvasRef.value;
        canvas.width = Math.floor(w * dpr);
        canvas.height = Math.floor(h * dpr);

        ctx = canvas.getContext("2d");
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

        if (nodes.length) clampNodesIntoBounds();
    }

    const clampNodesIntoBounds = () => {
        const { w, h } = getCssSize();
        for (const n of nodes) {
            n.x = clamp(n.x, n.r, w - n.r);
            n.y = clamp(n.y, n.r, h - n.r);
        }
    }

    // ---------------- images ----------------
    const loadImages = async () => {
        imageMap.clear();
        const loaders = props.skills.map((s) => new Promise((resolve) => {
            const img = new Image();
            // If hosted elsewhere, enable CORS + uncomment:
            // img.crossOrigin = "anonymous";
            img.onload = () => resolve({ key: s.key, img, ok: true });
            img.onerror = () => resolve({ key: s.key, img: null, ok: false });
            img.src = s.src;
        }));
        const results = await Promise.all(loaders);
        for (const r of results) if (r.ok && r.img) imageMap.set(r.key, r.img);
    }

    // ---------------- init nodes ----------------
    const initNodes = () => {
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
            x, y,
            vx: Math.cos(ang) * spd,
            vy: Math.sin(ang) * spd,
            r,
            mass: r * r,
            dragging: false,
            lastCollisionAt: -1e9,
            };
        });

        separateOverlaps(4);
        playerNode = null;
    }

    const separateOverlaps = (passes = 3) => {
        for (let p = 0; p < passes; p++) {
            for (let i = 0; i < nodes.length; i++) {
            for (let j = i + 1; j < nodes.length; j++) {
                const a = nodes[i], b = nodes[j];
                const dx = b.x - a.x, dy = b.y - a.y;
                const dist = Math.hypot(dx, dy);
                const minDist = a.r + b.r;
                if (dist === 0 || dist >= minDist) continue;
                const nx = dx / dist, ny = dy / dist;
                const overlap = minDist - dist;
                a.x -= nx * overlap * 0.5; a.y -= ny * overlap * 0.5;
                b.x += nx * overlap * 0.5; b.y += ny * overlap * 0.5;
            }
            }
            clampNodesIntoBounds();
        }
    }

    // ---------------- reaction coloring ----------------
    const markCollision = (a, b, nowSec) => {
        a.lastCollisionAt = nowSec;
        b.lastCollisionAt = nowSec;
    }

    const colorStrength = (node, nowSec) => {
        const dt = nowSec - node.lastCollisionAt;
        if (dt <= props.colorHoldSeconds) return 1;

        const fadeT = (dt - props.colorHoldSeconds) / Math.max(0.0001, props.fadeSeconds);
        const t = clamp(fadeT, 0, 1);
        const eased = 1 - (1 - t) * (1 - t);
        return 1 - eased;
    }

    // ---------------- leaderboard (simulated) ----------------
    const seedLeaderboardIfEmpty = () => {
        const raw = localStorage.getItem(STORAGE_LB);
        if (raw) return;

        const names = [
            "Nova", "ByteWiz", "Kairo", "LunaDev", "Cipher", "Astra", "NeonFox", "Zeta", "Orion", "Pulse",
            "Talon", "Echo", "Sage", "Rift", "Mika", "Atlas", "Vanta", "Quill", "Raven", "Pixel"
        ];

        // Generate plausible scores
        const list = Array.from({ length: 10 }, (_, i) => ({
            name: names[i % names.length],
            score: 300 + Math.floor(Math.random() * 1800),
        })).sort((a, b) => b.score - a.score);

        localStorage.setItem(STORAGE_LB, JSON.stringify(list));
    }

    const loadBestAndLeaderboard = () => {
        try {
            const bestRaw = localStorage.getItem(STORAGE_BEST);
            best.value = bestRaw ? JSON.parse(bestRaw) : { name: "None", score: 0 };
        } catch {
            best.value = { name: "None", score: 0 };
        }

        //   seedLeaderboardIfEmpty();

        try {
            const lbRaw = localStorage.getItem(STORAGE_LB);
            leaderboard.value = lbRaw ? JSON.parse(lbRaw) : [];
        } catch {
            leaderboard.value = [];
        }
    }

    const updateLeaderboard = (name, newScore) => {
        const cleanName = (name || "Anonymous").trim().slice(0, 24);
        const entry = { name: cleanName || "Anonymous", score: Math.floor(newScore) };

        // Best record
        if (entry.score > (best.value?.score ?? 0)) {
            best.value = entry;
            localStorage.setItem(STORAGE_BEST, JSON.stringify(entry));
        }

        // Leaderboard top 10 (simulated local)
        const list = Array.isArray(leaderboard.value) ? [...leaderboard.value] : [];
        list.push(entry);
        list.sort((a, b) => b.score - a.score);
        const top10 = list.slice(0, 10);

        leaderboard.value = top10;
        localStorage.setItem(STORAGE_LB, JSON.stringify(top10));
    }

    const bestScore = computed(() => best.value?.score ?? 0);
    const bestName = computed(() => best.value?.name ?? "None");

    // ---------------- pointer / drag + throw ----------------
    const getPointerPos = (e) => {
        const rect = canvasRef.value.getBoundingClientRect();
        return { x: e.clientX - rect.left, y: e.clientY - rect.top };
    }

    const hitTest = (x, y) => {
        let best = null, bestD = Infinity;
        for (const n of nodes) {
            const d = Math.hypot(x - n.x, y - n.y);
            if (d <= n.r && d < bestD) { bestD = d; best = n; }
        }
        return best;
    }

    const startRunIfNeeded = (selected) => {
        if (gameState.value === "idle") {
            gameState.value = "running";
            score.value = 0;
            streak.value = 1;
            combo.value = 1;
            lives.value = props.livesMax;
            invulnLeft.value = 0;
            survivalSeconds.value = 0;

            holdTimeSec = 0;
            nextStreakAt = props.streakEverySeconds;

            speedLevel = 0;
            playerNode = selected;
        }
    }

    const onPointerDown = (e) => {
        if (gameState.value === "over") return;

        canvasRef.value.setPointerCapture?.(e.pointerId);

        const { x, y } = getPointerPos(e);
        const n = hitTest(x, y);
        if (!n) return;

        // After start, only drag player node
        if (gameState.value === "running" && playerNode && n !== playerNode) return;

        startRunIfNeeded(n);

        // Reset hold timers when user starts holding again (your rule)
        holdTimeSec = 0;
        streak.value = 1;
        nextStreakAt = props.streakEverySeconds;

        drag.pointerId = e.pointerId;
        drag.node = n;
        n.dragging = true;

        drag.offsetX = x - n.x;
        drag.offsetY = y - n.y;
        drag.lastX = x;
        drag.lastY = y;
        drag.lastTime = performance.now();

        n.vx = 0;
        n.vy = 0;
    }

    const onPointerMove = (e) => {
        if (drag.pointerId !== e.pointerId || !drag.node) return;

        const n = drag.node;
        const { x, y } = getPointerPos(e);

        n.x = x - drag.offsetX;
        n.y = y - drag.offsetY;
        clampNodesIntoBounds();

        const now = performance.now();
        const dt = Math.max(1, now - drag.lastTime);
        const dx = x - drag.lastX;
        const dy = y - drag.lastY;

        n._throwVx = (dx / dt) * 1000;
        n._throwVy = (dy / dt) * 1000;

        drag.lastX = x;
        drag.lastY = y;
        drag.lastTime = now;

        resolveDraggedCollisions(n);
    }

    const onPointerUp = (e) => {
        if (drag.pointerId !== e.pointerId) return;

        const n = drag.node;
        if (n) {
            n.dragging = false;
            const maxThrow = props.maxNodeSpeed * 1.2;
            n.vx = clamp(n._throwVx ?? 0, -maxThrow, maxThrow);
            n.vy = clamp(n._throwVy ?? 0, -maxThrow, maxThrow);
            delete n._throwVx;
            delete n._throwVy;
        }

        drag.pointerId = null;
        drag.node = null;
    }

    const resolveDraggedCollisions = (dragged) => {
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

            const kick = Math.min(420, overlap * 22);
            other.vx += nx * kick;
            other.vy += ny * kick;
        }
        clampNodesIntoBounds();
    }

    // ---------------- difficulty scaling ----------------
    const applySpeedBoost = (mult) => {
        for (const n of nodes) {
            if (n.dragging) continue;
            n.vx *= mult;
            n.vy *= mult;

            const s = Math.hypot(n.vx, n.vy);
            if (s > props.maxNodeSpeed) {
            const k = props.maxNodeSpeed / s;
            n.vx *= k;
            n.vy *= k;
            }
        }
    }

    /**
     * Smooth curve + step boosts:
     * - smoothFactor grows with score (gradual)
     * - each speedStepScore triggers an extra step multiplier
     */
    const updateDifficulty = () => {
        const desiredLevel = Math.floor(score.value / props.speedStepScore);
        while (speedLevel < desiredLevel) {
            speedLevel++;
            applySpeedBoost(props.stepSpeedMultiplier);
        }
    }

    // ---------------- lives + game over + explosions ----------------
    const spawnExplosion = (x, y, intensity = 1) => {
        const count = Math.floor(24 + intensity * 40);
        for (let i = 0; i < count; i++) {
            const ang = rand(0, Math.PI * 2);
            const spd = rand(40, 220) * (0.6 + intensity);
            particles.push({
            x, y,
            vx: Math.cos(ang) * spd,
            vy: Math.sin(ang) * spd,
            r: rand(1.2, 3.5) * (0.9 + intensity * 0.4),
            life: rand(0.25, 0.7) * (0.9 + intensity * 0.5),
            t: 0,
            });
        }
    }

    const loseLifeAt = (x, y) => {
        if (invulnLeft.value > 0) return;

        lives.value -= 1;
        invulnLeft.value = props.invulnSeconds;

        spawnExplosion(x, y, 0.9);

        if (lives.value <= 0) {
            gameOver(x, y);
        }
    }

    const gameOver = (x, y) => {
        if (gameState.value !== "running") return;

        // bigger explosion
        spawnExplosion(x, y, 2.0);

        gameState.value = "over";

        // stop dragging
        if (drag.node) drag.node.dragging = false;
        drag.pointerId = null;
        drag.node = null;
    }

    const restart = () => {
        gameState.value = "idle";
        score.value = 0;
        streak.value = 1;
        combo.value = 1;
        lives.value = props.livesMax;
        invulnLeft.value = 0;
        survivalSeconds.value = 0;
        playerName.value = "";
        holdTimeSec = 0;
        nextStreakAt = props.streakEverySeconds;
        speedLevel = 0;

        particles = [];
        initNodes();
    }

    const saveAndRestart = () => {
        updateLeaderboard(playerName.value, score.value);
        restart();
    }

    // ---------------- scoring + combo ----------------
    const updateScoreAndCombo = (dtSec) => {
        if (gameState.value !== "running" || !playerNode) return;

        survivalSeconds.value += dtSec;

        // Combo unlock after 20 seconds survival
        if (survivalSeconds.value >= props.comboUnlockSeconds) {
            // ramp combo slowly (capped)
            combo.value = Math.min(props.comboMax, combo.value + props.comboRampPerSecond * dtSec);
        } else {
            combo.value = 1;
        }

        // Only score while dragging/holding player
        if (playerNode.dragging) {
            holdTimeSec += dtSec;

            // score rate influenced by streak + combo
            const rate = props.baseScorePerSecond * streak.value * combo.value;
            score.value += rate * dtSec;

            while (holdTimeSec >= nextStreakAt) {
            streak.value += 1;
            nextStreakAt += props.streakEverySeconds;
            }
        }
    }

    // ---------------- physics update ----------------
    const updateMotion = (dtSec) => {
        const { w, h } = getCssSize();
        const f = Math.pow(props.friction, dtSec * 60);

        // smooth difficulty curve (continuous): scale velocities slightly with score
        const smooth = 1 + props.smoothSpeedCurve * Math.log10(1 + score.value / 150);
        const smoothClamp = clamp(smooth, 1, 1.6); // keep sane

        for (const n of nodes) {
            if (n.dragging) continue;

            n.x += n.vx * dtSec;
            n.y += n.vy * dtSec;

            // edge bounce
            if (n.x <= n.r) { n.x = n.r; n.vx = Math.abs(n.vx) * props.restitution; }
            else if (n.x >= w - n.r) { n.x = w - n.r; n.vx = -Math.abs(n.vx) * props.restitution; }

            if (n.y <= n.r) { n.y = n.r; n.vy = Math.abs(n.vy) * props.restitution; }
            else if (n.y >= h - n.r) { n.y = h - n.r; n.vy = -Math.abs(n.vy) * props.restitution; }

            // friction
            n.vx *= f;
            n.vy *= f;

            // apply smooth difficulty scaling gently
            n.vx *= Math.pow(smoothClamp, dtSec * 0.25);
            n.vy *= Math.pow(smoothClamp, dtSec * 0.25);

            // clamp speed
            const s = Math.hypot(n.vx, n.vy);
            if (s > props.maxNodeSpeed) {
            const k = props.maxNodeSpeed / s;
            n.vx *= k; n.vy *= k;
            }
        }

        // invulnerability timer
        if (invulnLeft.value > 0) {
            invulnLeft.value = Math.max(0, invulnLeft.value - dtSec);
        }
    }

    const solveCollisions = (nowSec) => {
        for (let pass = 0; pass < props.iterations; pass++) {
            for (let i = 0; i < nodes.length; i++) {
                for (let j = i + 1; j < nodes.length; j++) {
                    const a = nodes[i], b = nodes[j];

                    const dx = b.x - a.x, dy = b.y - a.y;
                    const dist = Math.hypot(dx, dy);
                    const minDist = a.r + b.r;
                    if (dist === 0 || dist >= minDist) continue;

                    const nx = dx / dist, ny = dy / dist;

                    // separate
                    const overlap = minDist - dist;
                    const invMa = 1 / a.mass, invMb = 1 / b.mass;
                    const invSum = invMa + invMb;
                    const moveA = overlap * (invMa / invSum);
                    const moveB = overlap * (invMb / invSum);

                    if (!a.dragging) { a.x -= nx * moveA; a.y -= ny * moveA; }
                    if (!b.dragging) { b.x += nx * moveB; b.y += ny * moveB; }

                    // impulse
                    const rvx = b.vx - a.vx;
                    const rvy = b.vy - a.vy;
                    const velAlongNormal = rvx * nx + rvy * ny;

                    if (velAlongNormal <= 0) {
                    const e = props.restitution;
                    const jImpulse = -(1 + e) * velAlongNormal / (invMa + invMb);
                    const ix = jImpulse * nx, iy = jImpulse * ny;

                    if (!a.dragging) { a.vx -= ix * invMa; a.vy -= iy * invMa; }
                    if (!b.dragging) { b.vx += ix * invMb; b.vy += iy * invMb; }
                    }

                    // collision -> color reset
                    markCollision(a, b, nowSec);

                    // Player collision costs life (not instant game over)
                    if (gameState.value === "running" && playerNode && (a === playerNode || b === playerNode)) {
                    // collision point approx midpoint
                    const cx = (a.x + b.x) / 2;
                    const cy = (a.y + b.y) / 2;
                    loseLifeAt(cx, cy);
                    if (gameState.value === "over") return;
                    }
                }
            }
            clampNodesIntoBounds();
        }
    }

    // ---------------- particles ----------------
    const updateParticles = (dtSec) => {
        // gravity-like drift (subtle)
        const g = 120;

        for (const p of particles) {
            p.t += dtSec;
            p.life -= dtSec;
            p.vy += g * dtSec * 0.25;
            p.x += p.vx * dtSec;
            p.y += p.vy * dtSec;
            p.vx *= Math.pow(0.985, dtSec * 60);
            p.vy *= Math.pow(0.985, dtSec * 60);
        }
        particles = particles.filter(p => p.life > 0);
    }

    const drawParticles = () => {
        for (const p of particles) {
            const alpha = clamp(p.life / 0.7, 0, 1);
            ctx.fillStyle = `rgba(226,232,240,${0.12 + alpha * 0.35})`;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    // ---------------- drawing ----------------
    const drawBackground = (w, h) => {
        const g = ctx.createRadialGradient(w / 2, h / 2, Math.min(w, h) * 0.1, w / 2, h / 2, Math.min(w, h) * 0.78);
        g.addColorStop(0, "rgba(2,6,23,0)");
        g.addColorStop(1, "rgba(2,6,23,0.58)");
        ctx.fillStyle = g;
        ctx.fillRect(0, 0, w, h);
    }

    const coverRect = (srcW, srcH, dstW, dstH) => {
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

    const drawBonds = (nowSec) => {
        const bd = props.bondDistance;

        for (let i = 0; i < nodes.length; i++) {
            for (let j = i + 1; j < nodes.length; j++) {
                const a = nodes[i], b = nodes[j];
                const dx = b.x - a.x, dy = b.y - a.y;
                const dist = Math.hypot(dx, dy);
                if (dist >= bd) continue;

                const proximity = 1 - dist / bd;

                const ca = colorStrength(a, nowSec);
                const cb = colorStrength(b, nowSec);
                const energy = Math.max(ca, cb);

                ctx.strokeStyle = `rgba(148,163,184,${0.10 + proximity * 0.42 + energy * 0.45})`;
                ctx.lineWidth = 1.1 + proximity * 0.8 + energy * 2.1;

                ctx.beginPath();
                ctx.moveTo(a.x, a.y);
                ctx.lineTo(b.x, b.y);
                ctx.stroke();

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

    const drawNode = (n, nowSec) => {
        const img = imageMap.get(n.key);
        if (!img) return;

        const c = colorStrength(n, nowSec);
        const gray = 1 - c;

        const isPlayer = playerNode && n === playerNode;

        // base circle
        ctx.beginPath();
        ctx.arc(n.x, n.y, n.r, 0, Math.PI * 2);
        ctx.fillStyle = "rgba(2,6,23,0.85)";
        ctx.fill();

        // ring (blink if invulnerable and player)
        const invBlink = isPlayer && invulnLeft.value > 0 ? (Math.sin(performance.now() * 0.018) + 1) / 2 : 1;

        ctx.lineWidth = isPlayer ? 3.4 : (2 + c * 2.2);
        ctx.strokeStyle = isPlayer
            ? `rgba(248,250,252,${0.35 + invBlink * 0.55})`
            : `rgba(226,232,240,${0.28 + c * 0.62})`;
        ctx.stroke();

        // glow when colored
        if (c > 0.05) {
            ctx.beginPath();
            ctx.arc(n.x, n.y, n.r + 8 + c * 10, 0, Math.PI * 2);
            ctx.strokeStyle = `rgba(226,232,240,${0.05 + c * 0.2})`;
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

    // ---------------- loop ----------------
    const frame = (t) => {
        if (!ctx) return;

        if (!lastT) lastT = t;
        const dtMs = Math.min(34, t - lastT);
        lastT = t;

        const dtSec = dtMs / 1000;
        const nowSec = t / 1000;

        const { w, h } = getCssSize();
        ctx.clearRect(0, 0, w, h);
        drawBackground(w, h);

        if (gameState.value !== "over") {
            updateMotion(dtSec);
            solveCollisions(nowSec);
            updateScoreAndCombo(dtSec);
            updateDifficulty();
        }

        updateParticles(dtSec);

        drawBonds(nowSec);
        for (const n of nodes) drawNode(n, nowSec);
        drawParticles();

        rafId = requestAnimationFrame(frame);
    }

    // ---------------- lifecycle ----------------
    onMounted(async () => {
        loadBestAndLeaderboard();
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