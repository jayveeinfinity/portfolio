<script setup>
    import { onMounted } from 'vue'
    import { useSmoothAnchorScroll } from '@/Composables/useSmoothAnchorScroll';

    const { onAnchorClick, scrollToHash } = useSmoothAnchorScroll(50);

    onMounted(() => {
        if (window.location.hash) {
            setTimeout(() => scrollToHash(window.location.hash), 0);
        }
    });
</script>

<template>
    <div @click="onAnchorClick">
        <Head title="John Vincent Bonza Portfolio" />
        <header class="sticky top-0 z-50 w-full border-b border-[#e5e7eb] bg-white/80 backdrop-blur-md">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
                <div class="flex items-center gap-2 group cursor-pointer">
                    <div class="bg-primary p-1 rounded-sm text-white">
                        <!-- <span class="material-symbols-outlined text-xl">architecture</span> -->
                         <img src="">
                    </div>
                    <h2 class="text-lg font-extrabold tracking-tight text-[#0e121b]">Founder &amp; Architect</h2>
                </div>
                <nav class="hidden md:flex items-center gap-8">
                    <a class="text-sm font-medium text-gray-600 hover:text-primary transition-colors" href="#vision">Vision</a>
                    <a class="text-sm font-medium text-gray-600 hover:text-primary transition-colors" href="#platforms">Platforms</a>
                    <a class="text-sm font-medium text-gray-600 hover:text-primary transition-colors" href="#engineering">Engineering</a>
                    <a class="text-sm font-medium text-gray-600 hover:text-primary transition-colors" href="#future">Future</a>
                </nav>
                <div class="flex items-center gap-4">
                    <button class="hidden md:block rounded-sm bg-primary px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-blue-700 transition-all">
                        Book a Consultation
                    </button>
                    <div class="h-10 w-10 rounded-full bg-gray-200 border border-gray-300 bg-cover bg-center" data-alt="Professional profile headshot of a tech CEO" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuArOuMQS21ElJDsWUnMyt5soJnKFsolu7NGUwv9G_tN-SEr8yxKftQTCxUd4rULdY-hJ3CDgro7y95fSVyDX1To35Ltnb5njpzKkofHNSNo3Xnht_0ni7UjkL3tH3XSgiFt4c5hY3pxgeiahpHTH7onth-z_RfUk8pPfupaCykWVXVaoIdoKPtMKJXbKpCm33ovXjAkAQUn3lL4tlL45HhqRp3NaYMuYx66XSgkoEhE_UaJJcuekMkQTKryoNdbAVDz2CoGUsJgjq4j')"></div>
                </div>
            </div>
        </header>
        <slot />
    </div>
</template>