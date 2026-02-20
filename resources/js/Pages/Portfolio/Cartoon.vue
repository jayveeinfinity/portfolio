<script setup>
    import { ref, onMounted, onBeforeUnmount, watch } from 'vue'
    import { useSmoothAnchorScroll } from '@/Composables/useSmoothAnchorScroll';
    import SkillReactionNetwork from "@/Shared/Components/SkillReactionNetwork.vue";
    import SkillReactionIcons from "@/Shared/Components/SkillReactionIcons.vue";

    defineProps({
        component: String
    });

    const skills = [
        { key: "laravel", src: "/images/icons/laravel.svg" },
        { key: "tailwind", src: "/images/icons/tailwind.svg" },
        { key: "mysql", src: "/images/icons/mysql.svg" },
        { key: "dotnet", src: "/images/icons/dotnet.svg" },
        { key: "docker", src: "/images/icons/docker.svg" },
        { key: "git", src: "/images/icons/git.svg" },
        { key: "redis", src: "/images/icons/redis.svg" },
        { key: "linux", src: "/images/icons/linux.svg" },
        { key: "vuejs", src: "/images/icons/vuejs.svg" },
        { key: "csharp", src: "/images/icons/csharp.svg" },
        { key: "windows", src: "/images/icons/windows.svg" },
        { key: "vite", src: "/images/icons/vite.svg" },
        { key: "nodejs", src: "/images/icons/nodejs.svg" },
        { key: "alpinejs", src: "/images/icons/alpinejs.svg" },
        { key: "php", src: "/images/icons/php.svg" },
        { key: "ubuntu", src: "/images/icons/ubuntu.svg" },
        { key: "github", src: "/images/icons/github.svg" },
        { key: "githubactions", src: "/images/icons/githubactions.svg" },
        { key: "aws", src: "/images/icons/aws.svg" },
        { key: "gitlab", src: "/images/icons/gitlab.svg" },
        { key: "nuxtjs", src: "/images/icons/nuxtjs.svg" },
        { key: "react", src: "/images/icons/react.svg" },
        { key: "nestjs", src: "/images/icons/nestjs.svg" },
        { key: "py", src: "/images/icons/py.svg" },
        { key: "java", src: "/images/icons/java.svg" },
        { key: "pinia", src: "/images/icons/pinia.svg" },
        { key: "git", src: "/images/icons/git.svg" },
        { key: "jquery", src: "/images/icons/jquery.svg" },
        { key: "html", src: "/images/icons/html.svg" },
        { key: "gcp", src: "/images/icons/gcp.svg" },
        { key: "cloudflare", src: "/images/icons/cloudflare.svg" },
        { key: "bootstrap", src: "/images/icons/bootstrap.svg" },
    ];

    const { onAnchorClick, scrollToHash } = useSmoothAnchorScroll(150);

    const open = ref(false)

    const close = () => (open.value = false)

    const onKeydown = (e) => {
        if (e.key === 'Escape') close()
    }

    const onClickOutside = (e) => {
        if (!open.value) return

        const nav = e.target.closest('nav')
        if (!nav) close()
    }

    onMounted(() => {
        if (window.location.hash) {
            setTimeout(() => scrollToHash(window.location.hash), 0);
        }

        window.addEventListener('keydown', onKeydown)
        document.addEventListener('click', onClickOutside)
    }); 

    onBeforeUnmount(() => {
        window.removeEventListener('keydown', onKeydown)
        document.removeEventListener('click', onClickOutside)
    })

    watch(open, (val) => {
        document.body.style.overflow = val ? 'hidden' : ''
    })
</script>

<template>
    <div @click="onAnchorClick">
        <!-- Navigation -->
        <!-- <nav class="sticky top-0 z-50 px-4 py-4 md:px-20">
            <div class="max-w-7xl mx-auto flex items-center justify-between bg-white dark:bg-card-bg border-4 border-black dark:border-white rounded-xl px-6 py-3 shadow-comic dark:shadow-comic-red">
                <div class="flex items-center gap-3">
                    <div class="bg-primary p-2 border-2 border-black rounded-lg transform -rotate-3">
                        <span class="material-symbols-outlined text-white font-bold">terminal</span>
                    </div>
                    <h1 class="text-2xl font-black tracking-tighter italic">JAYVEE_INFINITY</h1>
                </div>
                <div class="hidden md:flex items-center gap-8 font-bold uppercase text-sm">
                    <a class="hover:text-primary transition-colors" href="#hero">Origins</a>
                    <a class="hover:text-primary transition-colors" href="#projects">Panels</a>
                    <a class="hover:text-primary transition-colors" href="#superpowers">Powers</a>
                    <a class="hover:text-primary transition-colors" href="#stats">Intel</a>
                    <a class="hover:text-primary transition-colors" href="#skills">Skill Reactor</a>
                    <button class="bg-primary text-white border-3 border-black px-6 py-2 rounded-lg shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all">
                        HIRE ME!
                    </button>
                </div>
            </div>
        </nav> -->
        <nav class="sticky top-0 z-50 px-4 py-4 sm:px-6 md:px-20">
            <div
                class="max-w-7xl mx-auto flex items-center justify-between bg-white dark:bg-card-bg border-4 border-black dark:border-white rounded-xl px-4 sm:px-6 py-3 shadow-comic dark:shadow-comic-red"
                >
                <!-- Brand -->
                <div class="flex items-center gap-3 min-w-0">
                    <div class="bg-primary p-2 border-2 border-black rounded-lg transform -rotate-3 shrink-0">
                        <span class="material-symbols-outlined text-white font-bold">terminal</span>
                    </div>
                    <h1 class="font-black tracking-tighter italic text-lg sm:text-xl md:text-2xl">
                        JAYVEE_INFINITY
                    </h1>
                </div>

                <!-- Desktop -->
                <div class="hidden lg:flex items-center gap-6 lg:gap-8 font-bold uppercase text-sm">
                    <a class="hover:text-primary transition-colors" href="#hero">Origins</a>
                    <a class="hover:text-primary transition-colors" href="#projects">Panels</a>
                    <a class="hover:text-primary transition-colors" href="#superpowers">Powers</a>
                    <a class="hover:text-primary transition-colors" href="#stats">Intel</a>
                    <a class="hover:text-primary transition-colors" href="#skills">Skill Reactor</a>
                    <button
                        class="bg-primary text-white border-3 border-black px-5 lg:px-6 py-2 rounded-lg shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all"
                    >
                        HIRE ME!
                    </button>
                </div>

                <!-- Mobile button -->
                <button
                    class="lg:hidden inline-flex items-center justify-center border-2 border-black rounded-lg px-3 py-2 shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all bg-primary"
                    aria-label="Open menu"
                    :aria-expanded="open.toString()"
                    @click="open = !open"
                >
                    <span class="material-symbols-outlined">{{ open ? 'close' : 'menu' }}</span>
                </button>
            </div>

            <!-- Mobile dropdown -->
            <transition
                enter-active-class="transition duration-150 ease-out"
                enter-from-class="opacity-0 -translate-y-2"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition duration-120 ease-in"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 -translate-y-2"
                >
                <div
                    v-if="open"
                    class="lg:hidden max-w-7xl mx-auto mt-2 bg-white dark:bg-card-bg border-4 border-black dark:border-white rounded-xl shadow-comic dark:shadow-comic-red overflow-hidden"
                >
                    <div class="flex flex-col p-4 gap-3 font-bold uppercase text-sm">
                    <a class="hover:text-primary transition-colors" href="#hero" @click="close()">Origins</a>
                    <a class="hover:text-primary transition-colors" href="#projects" @click="close()">Panels</a>
                    <a class="hover:text-primary transition-colors" href="#superpowers" @click="close()">Powers</a>
                    <a class="hover:text-primary transition-colors" href="#stats" @click="close()">Intel</a>
                    <a class="hover:text-primary transition-colors" href="#skills" @click="close()">Skill Reactor</a>

                    <button class="mt-2 bg-primary text-white border-3 border-black px-6 py-2 rounded-lg shadow-comic">
                        HIRE ME!
                    </button>
                    </div>
                </div>
            </transition>
        </nav>
        <main class="max-w-7xl mx-auto px-4 py-12 md:px-20">
            <!-- Hero Section -->
            <section class="flex flex-col lg:flex-row gap-12 items-center mb-32" id="hero">
                <div class="w-full lg:w-1/2 flex flex-col gap-6">
                    <div class="inline-block self-start bg-accent-yellow text-black font-black px-4 py-1 border-2 border-black rounded transform -rotate-2 mb-2">
                        FULL-STACK SOFTWARE HERO
                    </div>
                    <h1 class="text-6xl md:text-8xl font-black leading-[0.9] tracking-tighter uppercase italic drop-shadow-[4px_4px_0px_rgba(212,17,17,1)]">
                        I BUILD STUFF <br/> <span class="text-primary">THAT WORKS!</span>
                    </h1>
                    <p class="text-xl md:text-2xl font-medium max-w-lg leading-relaxed dark:text-slate-300">
                        Building powerful full-stack solutions with clean code, scalable systems, and a touch of creative energy.
                    </p>
                    <div class="flex flex-wrap gap-4 mt-4">
                        <a class="bg-primary text-white text-xl font-black border-4 border-black px-8 py-4 rounded-xl shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all uppercase tracking-tight" href="#projects">
                            See Projects
                        </a>
                        <button class="bg-white text-black text-xl font-black border-4 border-black px-8 py-4 rounded-xl shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all uppercase tracking-tight">
                            Let's Chat
                        </button>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 relative">
                    <!-- <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary rounded-full border-4 border-black flex items-center justify-center animate-bounce z-10 hidden md:flex">
                        <span class="text-white font-black text-2xl uppercase italic">ZAP!</span>
                    </div> -->
                    <!-- Speech Bubble -->
                    <div class="absolute -top-6 -right-4 md:-right-12 bg-white border-4 border-black p-4 rounded-2xl shadow-comic max-w-[200px] transform rotate-3 z-10">
                        <p class="text-black font-black italic text-sm leading-tight text-center">
                            Stay tuned for more updates on my social channels!
                        </p>
                        <div class="absolute -bottom-5 left-6 w-0 h-0 border-l-[15px] border-l-transparent border-r-[15px] border-r-transparent border-t-[15px] border-t-black"></div>
                    </div>
                    <div class="border-4 border-black dark:border-white rounded-2xl overflow-hidden shadow-comic-red bg-card-bg transform rotate-2">
                        <img alt="Retro computer workstation with neon lights" class="w-full aspect-square object-cover" data-alt="Retro computer workstation with vibrant neon lighting" :src="$asset('images/misc/cartoon-hero.png')"/>
                    </div>
                </div>
            </section>
            <!-- Superpowers Section -->
            <section class="mb-32" id="superpowers">
                <h2 class="text-4xl font-black italic uppercase mb-12 flex items-center gap-4">
                    <span class="bg-primary text-white p-2 border-2 border-black rounded transform rotate-3">
                    <span class="material-symbols-outlined">bolt</span>
                    </span>
                    MY SUPERPOWERS
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Power 1 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-blue-400 border-4 border-black rounded-xl mb-4 flex items-center justify-center transform -rotate-6 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-black text-4xl font-bold">auto_fix_high</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">Frontend Magic</h3>
                        <p class="font-medium dark:text-slate-400">Vue, Nuxt & UI/UX craftsmanship combined — designing bold, intuitive interfaces that don’t just look good… they feel right.</p>
                    </div>
                    <!-- Power 2 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-green-400 border-4 border-black rounded-xl mb-4 flex items-center justify-center transform rotate-6 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-black text-4xl font-bold">database</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">Backend Mastery</h3>
                        <p class="font-medium dark:text-slate-400">Precision-engineered systems with PHP (Laravel) & C# (.NET) — clean architecture, secure logic, scalable foundations.</p>
                    </div>
                    <!-- Power 3 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-purple-400 border-4 border-black rounded-xl mb-4 flex items-center justify-center transform -rotate-3 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-black text-4xl font-bold">cloud</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">Infrastructure & Cloud Commander</h3>
                        <p class="font-medium dark:text-slate-400">Server management, Docker orchestration, AWS deployment, and production environments built for uptime, performance, and control.</p>
                    </div>
                    <!-- Power 4 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-primary border-4 border-black rounded-xl mb-4 flex items-center justify-center transform rotate-3 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-white text-4xl font-bold">vpn_lock_2</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">Network & Systems Engineer</h3>
                        <p class="font-medium dark:text-slate-400">LAN architecture, server-to-server communication, infrastructure planning, and resilient internal system design.</p>
                    </div>
                    <!-- Power 5 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-sky-400 border-4 border-black rounded-xl mb-4 flex items-center justify-center transform -rotate-6 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-black text-4xl font-bold">api</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">API & Integration Specialist</h3>
                        <p class="font-medium dark:text-slate-400">Seamless 3rd-party integrations, RESTful APIs, payment gateways, authentication systems — making platforms talk flawlessly.</p>
                    </div>
                    <!-- Power 6 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-slate-400 border-4 border-black rounded-xl mb-4 flex items-center justify-center transform rotate-6 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-black text-4xl font-bold">desktop_windows</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">Desktop & Enterprise Application Developer</h3>
                        <p class="font-medium dark:text-slate-400">Robust .NET desktop applications and enterprise tools built for stability, business workflows, and long-term use.</p>
                    </div>
                    <!-- Power 7 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-rose-400 border-4 border-black rounded-xl mb-4 flex items-center justify-center transform -rotate-3 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-black text-4xl font-bold">stadia_controller</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">Interactive & Game Systems Developer</h3>
                        <p class="font-medium dark:text-slate-400">Unity-powered experiences, logic-driven gameplay mechanics, and immersive digital interaction design.</p>
                    </div>
                    <!-- Power 8 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-violet-400 border-4 border-black rounded-xl mb-4 flex items-center justify-center transform rotate-3 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-white text-4xl font-bold">headset_mic</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">IT Operations & Support Strategist</h3>
                        <p class="font-medium dark:text-slate-400">Hardware troubleshooting, deployment management, system diagnostics, and user support with precision and patience.</p>
                    </div>
                    <!-- Power 9 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black p-6 rounded-2xl shadow-comic transition-transform hover:-translate-y-2 group">
                        <div class="w-16 h-16 bg-amber-400 border-4 border-black rounded-xl mb-4 flex items-center justify-center transform rotate-3 group-hover:rotate-0 transition-transform">
                            <span class="material-symbols-outlined text-white text-4xl font-bold">volunteer_activism</span>
                        </div>
                        <h3 class="text-2xl font-black italic mb-2">Collaborative Team Catalyst</h3>
                        <p class="font-medium dark:text-slate-400">A dependable team player who mentors, communicates clearly, and elevates team performance through structured execution.</p>
                    </div>
                </div>
            </section>
            <!-- Comic Panels (Projects) -->
            <section class="mb-32" id="projects">
                <h2 class="text-4xl font-black italic uppercase mb-12 flex items-center gap-4">
                    <span class="bg-accent-yellow text-black p-2 border-2 border-black rounded transform -rotate-3">
                    <span class="material-symbols-outlined">menu_book</span>
                    </span>
                    COMIC PANELS (PROJECTS)
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    <!-- Project 1 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black rounded-2xl overflow-hidden shadow-comic flex flex-col group">
                        <div class="relative overflow-hidden border-b-4 border-black">
                            <img alt="Futuristic web interface dashboard" class="w-full h-64 object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="Futuristic web dashboard with neon charts" :src="$asset('images/projects/cvsu-ils-landing.png')"/>
                            <div class="absolute top-4 right-4 bg-primary text-white font-black px-4 py-1 border-2 border-black rounded shadow-comic uppercase text-sm">
                                LIVE NOW!
                            </div>
                        </div>
                        <div class="p-8 comic-panel">
                            <h3 class="text-3xl font-black italic mb-4">CvSU ILS — Landing</h3>
                            <p class="text-lg font-medium mb-6 dark:text-slate-300">A centralized digital gateway for the Cavite State University Integrated Library System, designed to provide seamless access to library resources, intelligent search tools, and user-focused services that enhance research, learning, and knowledge discovery.</p>
                            <div class="flex gap-3 flex-wrap">
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">PHP</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Boostrap</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">JQuery</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">MySQL</span>
                            </div>
                        </div>
                    </div>
                    <!-- Project 2 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black rounded-2xl overflow-hidden shadow-comic flex flex-col group">
                        <div class="relative overflow-hidden border-b-4 border-black">
                            <img alt="Abstract colorful code snippets" class="w-full h-64 object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="Abstract colorful patterns representing complex code" :src="$asset('images/projects/tuklas.png')"/>
                            <div class="absolute top-4 right-4 bg-accent-yellow text-black font-black px-4 py-1 border-2 border-black rounded shadow-comic uppercase text-sm">
                                COMMUNITY PROJECT
                            </div>
                        </div>
                        <div class="p-8 comic-panel">
                            <h3 class="text-3xl font-black italic mb-4">TUKLAS: Ang panimulang bahagi</h3>
                            <p class="text-lg font-medium mb-6 dark:text-slate-300">Tuklas: ang panimulang bahagi — an exclusive platform for students overcome the hardest part of research—starting.</p>
                            <div class="flex gap-3 flex-wrap">
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Laravel</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Vue.js</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Inertia.js</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Tailwind</span>
                            </div>
                        </div>
                    </div>
                    <!-- Project 3 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black rounded-2xl overflow-hidden shadow-comic flex flex-col group">
                        <div class="relative overflow-hidden border-b-4 border-black">
                            <img alt="Abstract colorful code snippets" class="w-full h-64 object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="Abstract colorful patterns representing complex code" :src="$asset('images/projects/binary-wars.png')"/>
                            <div class="absolute top-4 right-4 bg-accent-yellow text-black font-black px-4 py-1 border-2 border-black rounded shadow-comic uppercase text-sm">
                                THESIS PROJECT
                            </div>
                        </div>
                        <div class="p-8 comic-panel">
                            <h3 class="text-3xl font-black italic mb-4">BINARY WARS</h3>
                            <p class="text-lg font-medium mb-6 dark:text-slate-300">A fast-paced multiplayer mathematical game that challenges players to convert binary to decimal in real time. Binary Wars promotes competitive learning, sharpens computational thinking, and transforms number system mastery into an exciting head-to-head battle of speed and accuracy.</p>
                            <div class="flex gap-3 flex-wrap">
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Unity</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">C#</span>
                            </div>
                        </div>
                    </div>
                    <!-- Project 4 -->
                    <div class="bg-white dark:bg-card-bg border-4 border-black rounded-2xl overflow-hidden shadow-comic flex flex-col group">
                        <div class="relative overflow-hidden border-b-4 border-black">
                            <img alt="Abstract colorful code snippets" class="w-full h-64 object-cover object-top grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="Abstract colorful patterns representing complex code" :src="$asset('images/projects/tnts-aspire.png')"/>
                            <div class="absolute top-4 right-4 bg-accent-yellow text-black font-black px-4 py-1 border-2 border-black rounded shadow-comic uppercase text-sm">
                                COMMUNITY PROJECT
                            </div>
                        </div>
                        <div class="p-8 comic-panel">
                            <h3 class="text-3xl font-black italic mb-4">TNTS — ASPIRE</h3>
                            <p class="text-lg font-medium mb-6 dark:text-slate-300">An integrated Academic Student Portal, Information, Records, and Enrollment System that streamlines student services into one unified platform. ASPIRE empowers institutions with efficient enrollment workflows, real-time academic records management, and a modern digital experience for students and administrators alike.</p>
                            <div class="flex gap-3 flex-wrap">
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Laravel</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Vue.js</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Inertia.js</span>
                                <span class="bg-slate-200 dark:bg-slate-800 border-2 border-black px-3 py-1 font-bold text-xs uppercase">Tailwind</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Metrics Section -->
            <section class="mb-32 bg-primary dark:bg-primary/20 border-4 border-black rounded-3xl p-12 relative overflow-hidden" id="stats">
                <div class="absolute top-0 right-0 w-64 h-64 bg-black/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
                <h2 class="text-4xl font-black italic uppercase mb-16 text-center text-white dark:text-white drop-shadow-[2px_2px_0px_#000]">
                    INTEL BY THE NUMBERS
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="flex flex-col items-center gap-4 transform rotate-2">
                        <div class="w-24 h-24 bg-white border-4 border-black rounded-full flex items-center justify-center shadow-comic">
                            <span class="text-3xl font-black text-black italic">60+</span>
                        </div>
                        <p class="font-black text-white uppercase italic text-center text-sm">Projects Shipped</p>
                    </div>
                    <div class="flex flex-col items-center gap-4 transform -rotate-3">
                        <div class="w-24 h-24 bg-accent-yellow border-4 border-black rounded-full flex items-center justify-center shadow-comic">
                            <span class="text-3xl font-black text-black italic">1K+</span>
                        </div>
                        <p class="font-black text-white uppercase italic text-center text-sm">Commits Pushed</p>
                    </div>
                    <div class="flex flex-col items-center gap-4 transform rotate-6">
                        <div class="w-24 h-24 bg-white border-4 border-black rounded-full flex items-center justify-center shadow-comic">
                            <span class="text-3xl font-black text-black italic">∞</span>
                        </div>
                        <p class="font-black text-white uppercase italic text-center text-sm">Caffeine Overdose</p>
                    </div>
                    <div class="flex flex-col items-center gap-4 transform -rotate-1">
                        <div class="w-24 h-24 bg-accent-yellow border-4 border-black rounded-full flex items-center justify-center shadow-comic">
                            <span class="text-3xl font-black text-black italic">1M+</span>
                        </div>
                        <p class="font-black text-white uppercase italic text-center text-sm">Bugs Squashed</p>
                    </div>
                </div>
            </section>
            <!-- Use Cases Section -->
            <section class="mb-32 max-w-7xl mx-auto px-4 md:px-0" id="use-cases">
                <h2 class="text-4xl font-black italic uppercase mb-12 flex items-center gap-4">
                    <span class="bg-accent-yellow text-black p-2 border-2 border-black rounded transform -rotate-3">
                        <span class="material-symbols-outlined">menu_book</span>
                    </span>
                    COMICS OF EXPERIENCE
                </h2>
                <div class="relative flex flex-col lg:flex-row items-center lg:items-start gap-10">
                    <div class="relative w-full max-w-md">
                        <!-- Portrait Placeholder -->
                        <div class="border-4 border-black dark:border-white rounded-3xl overflow-hidden shadow-comic-red bg-card-bg transform -rotate-3">
                            <img alt="User Portrait" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all" :src="$asset('images/comics/1.png')"/>
                        </div>
                    </div>
                    <div class="relative w-full max-w-md">
                        <div class="border-4 border-black dark:border-white rounded-3xl overflow-hidden shadow-comic-red bg-card-bg transform rotate-3">
                            <img alt="User Portrait" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all" :src="$asset('images/comics/2.png')"/>
                        </div>
                    </div>
                    <div class="relative w-full max-w-md">
                        <div class="border-4 border-black dark:border-white rounded-3xl overflow-hidden shadow-comic-red bg-card-bg transform -rotate-3">
                            <img alt="User Portrait" class="w-full aspect-[3/4] object-cover grayscale hover:grayscale-0 transition-all" :src="$asset('images/comics/3.png')"/>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Tech Stack Section -->
            <section class="mb-20" id="skills">
                <div class="flex items-center justify-center">
                    <SkillReactionIcons
                        :skills="skills"
                        :min-speed="25"
                        :max-speed="65"
                        :bond-distance="120"
                        :iterations="3"
                        :friction="0.9996"
                        :restitution="1"
                        :color-hold-seconds="3"
                        :fade-seconds="0.5"
                        :base-score-per-second="10"
                        :streak-every-seconds="5"
                        />
                </div>
            </section>
            <!-- Contact Section -->
            <section class="mb-20" id="contact">
                <div class="flex flex-col lg:flex-row gap-12 bg-white dark:bg-card-bg border-4 border-black rounded-3xl overflow-hidden shadow-comic">
                    <div class="w-full lg:w-1/2 p-12 flex flex-col justify-center bg-accent-yellow dark:bg-primary border-b-4 lg:border-b-0 lg:border-r-4 border-black">
                        <h2 class="text-5xl font-black italic uppercase leading-none mb-6 text-black dark:text-white">SEND A <br/> SIGNAL!</h2>
                        <p class="text-xl font-bold mb-8 text-black/80 dark:text-white/80">Need a superhero for your next digital venture? Drop a line and let's save the world (or at least your production server).</p>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 bg-white border-3 border-black p-3 rounded-xl transform -rotate-1">
                                <span class="material-symbols-outlined text-primary font-bold">mail</span>
                                <span class="font-black italic text-black truncate">johnvincent.bonza@gmail.com</span>
                            </div>
                            <div class="flex items-center gap-4 bg-white border-3 border-black p-3 rounded-xl transform rotate-1">
                                <span class="material-symbols-outlined text-primary font-bold">location_on</span>
                                <span class="font-black italic text-black">Manila, PH</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 p-12">
                        <form class="flex flex-col gap-6">
                            <div class="flex flex-col gap-2">
                                <label class="font-black uppercase italic text-sm">Your Alias</label>
                                <input class="bg-slate-100 dark:bg-slate-800 border-4 border-black rounded-xl p-4 font-bold focus:ring-0 focus:border-primary transition-colors" placeholder="Mr. Bean" type="text"/>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="font-black uppercase italic text-sm">Communication Frequency</label>
                                <input class="bg-slate-100 dark:bg-slate-800 border-4 border-black rounded-xl p-4 font-bold focus:ring-0 focus:border-primary transition-colors" placeholder="name@domain.com" type="email"/>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="font-black uppercase italic text-sm">The Mission</label>
                                <textarea class="bg-slate-100 dark:bg-slate-800 border-4 border-black rounded-xl p-4 font-bold focus:ring-0 focus:border-primary transition-colors" placeholder="Tell me about your project..." rows="4"></textarea>
                            </div>
                            <button class="bg-primary text-white text-2xl font-black italic border-4 border-black p-4 rounded-xl shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all uppercase mt-4" type="submit">
                                SEND IT!
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- Social Links Section -->
            <section class="mb-20" id="social">
                <!-- Social Links -->
                <div class="mt-12 w-full flex justify-center items-center gap-6">
                    <a class="bg-white border-4 border-black p-4 rounded-xl shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all transform -rotate-3 hover:rotate-0" href="#">
                        <img :src="$asset('images/social-icons/pulsar/icons8-facebook-48.png')">
                    </a>
                    <a class="bg-primary border-4 border-black p-4 rounded-xl shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all transform rotate-2 hover:rotate-0" href="#">
                        <img :src="$asset('images/social-icons/pulsar/icons8-github-48.png')">
                    </a>
                    <a class="bg-accent-yellow border-4 border-black p-4 rounded-xl shadow-comic hover:shadow-comic-hover hover:translate-x-[4px] hover:translate-y-[4px] transition-all transform -rotate-1 hover:rotate-0" href="#">
                        <img :src="$asset('images/social-icons/pulsar/icons8-youtube-48.png')">
                    </a>
                </div>
            </section>
        </main>
        <footer class="bg-black py-12 px-4 text-center">
            <div class="max-w-7xl mx-auto flex flex-col items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="bg-primary p-2 border-2 border-white rounded transform rotate-12">
                        <span class="material-symbols-outlined text-white font-bold">terminal</span>
                    </div>
                    <h2 class="text-white text-2xl font-black italic tracking-tighter">DEV_JAYVEE_INFINITY</h2>
                </div>
                <p class="text-slate-500 font-bold uppercase text-xs tracking-widest">Designed with high-octane energy &copy; 2026</p>
                <div class="flex gap-6">
                    <a class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary transition-colors border-2 border-white/10" href="#">
                        <span class="material-symbols-outlined text-white">share</span>
                    </a>
                    <a class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary transition-colors border-2 border-white/10" href="#">
                        <span class="material-symbols-outlined text-white">code</span>
                    </a>
                    <a class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-primary transition-colors border-2 border-white/10" href="#">
                        <span class="material-symbols-outlined text-white">star</span>
                    </a>
                </div>
            </div>
        </footer>
    </div>
</template>