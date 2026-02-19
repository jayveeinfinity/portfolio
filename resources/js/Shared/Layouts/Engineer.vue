<script setup>
    import { onMounted } from 'vue'
    import { useSmoothAnchorScroll } from '@/Composables/useSmoothAnchorScroll';

    const { onAnchorClick, scrollToHash } = useSmoothAnchorScroll(80);

    onMounted(() => {
        if (window.location.hash) {
            setTimeout(() => scrollToHash(window.location.hash), 0);
        }
    });
</script>

<template>
    <div @click="onAnchorClick">
        <!-- Top Navigation Bar -->
        <header class="sticky top-0 z-50 w-full border-b border-border-muted bg-background-dark/80 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="size-8 bg-primary rounded flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-xl">architecture</span>
                    </div>
                    <div>
                        <h2 class="text-white text-sm font-bold leading-tight tracking-wider uppercase">JVJB_ARCH</h2>
                        <p class="text-[10px] text-primary font-mono">BUILD_VER: 2026.1.0</p>
                    </div>
                </div>
                <nav class="hidden md:flex items-center gap-10">
                    <a class="text-xs font-bold uppercase tracking-widest hover:text-primary transition-colors" href="#repository">Repository</a>
                    <a class="text-xs font-bold uppercase tracking-widest hover:text-primary transition-colors" href="#matrix">Matrix</a>
                    <a class="text-xs font-bold uppercase tracking-widest hover:text-primary transition-colors" href="#offerings">Offerings</a>
                    <a class="text-xs font-bold uppercase tracking-widest hover:text-primary transition-colors" href="#handshake">Handshake</a>
                </nav>
                <div class="flex items-center gap-4">
                    <button class="hidden lg:flex items-center gap-2 px-4 py-2 bg-primary/10 border border-primary/30 rounded text-[10px] font-bold tracking-tighter text-primary uppercase">
                    <span class="size-2 rounded-full bg-primary animate-pulse"></span>
                        System_Online
                    </button>
                    <button class="px-5 py-2 bg-primary text-white text-xs font-bold rounded uppercase tracking-widest hover:bg-blue-600 transition-all">
                        Download_Spec
                    </button>
                </div>
            </div>
        </header>
        <slot />
        <!-- Footer -->
        <footer class="border-t border-border-muted py-10 bg-background-dark">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-sm">copyright</span>
                    <p class="text-[10px] text-text-muted uppercase tracking-widest font-bold">2024 DEV_ARCHITECT_v1.0. All Specs Reserved.</p>
                </div>
                <div class="flex gap-8">
                    <a class="text-text-muted hover:text-primary transition-colors" href="#">
                        <span class="text-[10px] font-bold uppercase tracking-widest">GitHub</span>
                    </a>
                    <a class="text-text-muted hover:text-primary transition-colors" href="#">
                        <span class="text-[10px] font-bold uppercase tracking-widest">LinkedIn</span>
                    </a>
                    <a class="text-text-muted hover:text-primary transition-colors" href="#">
                        <span class="text-[10px] font-bold uppercase tracking-widest">Twitter</span>
                    </a>
                </div>
                <div class="text-right">
                    <p class="text-[10px] text-text-muted font-mono uppercase">System_Load: 1.2%</p>
                    <p class="text-[10px] text-primary font-mono uppercase">Sync_Status: Verified</p>
                </div>
            </div>
        </footer>
    </div>
</template>