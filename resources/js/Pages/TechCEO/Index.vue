<script setup>
    import TechCEOLayout from '@/Shared/Layouts/TechCEO.vue';
    
    defineOptions({
        layout: TechCEOLayout
    });
</script>

<template>
    <main class="relative">
        <!-- Hero Section -->
        <section class="relative overflow-hidden px-6 pt-24 pb-20 md:pt-32 md:pb-32 grid-pattern">
        <!-- Background Blurs -->
        <div class="absolute top-0 right-0 h-[400px] w-[400px] rounded-full bg-primary blur-blob"></div>
        <div class="absolute bottom-0 left-0 h-[300px] w-[300px] rounded-full bg-blue-300 blur-blob"></div>
        <div class="mx-auto max-w-5xl text-center">
        <div class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-primary/5 px-3 py-1 mb-8">
        <span class="relative flex h-2 w-2">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
        </span>
        <span class="text-xs font-bold uppercase tracking-widest text-primary">Available for Strategic Advisory</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-[900] tracking-tighter text-[#0e121b] leading-[1.1] mb-8">
            I Build Scalable <span class="text-primary">Digital Infrastructure</span> for Growing Organizations.
        </h1>
        <p class="mx-auto max-w-2xl text-lg md:text-xl font-medium text-gray-500 mb-10 leading-relaxed">
            Full Stack Engineer • Systems Architect • SaaS Builder
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <button class="w-full sm:w-auto min-w-[200px] rounded-sm bg-primary px-8 py-4 text-base font-bold text-white shadow-lg hover:translate-y-[-2px] transition-all">
            View Platforms
        </button>
        <button class="w-full sm:w-auto min-w-[200px] rounded-sm bg-white border border-[#e5e7eb] px-8 py-4 text-base font-bold text-[#0e121b] hover:bg-gray-50 transition-all">
            Let’s Build Something
        </button>
        </div>
        </div>
        </section>
        <!-- Vision Section -->
        <section class="border-y border-[#e5e7eb] bg-white py-20 px-6" id="vision">
        <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-4">
        <span class="text-sm font-bold uppercase tracking-widest text-primary mb-4 block">Vision &amp; Philosophy</span>
        <h2 class="text-4xl font-black tracking-tight text-[#0e121b]">Why I Build</h2>
        </div>
        <div class="lg:col-span-8">
        <p class="text-xl md:text-2xl font-light leading-relaxed text-gray-700">
                                    "A founder's statement on solving operational bottlenecks through engineered precision and systems thinking. We don't just write code; we architect the backbone of modern enterprise efficiency. My mission is to translate complex business requirements into resilient, self-healing digital ecosystems that drive compounding growth."
                                </p>
        </div>
        </div>
        </div>
        </section>
        <!-- Impact Metrics -->
        <section class="bg-white px-6 pb-20">
        <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4"><!-- Systems Built -->
        <div class="border border-gray-100 p-8 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
        <p class="text-5xl font-black text-[#1D4ED8] mb-4">10+</p>
        <div class="w-full bg-gray-100 h-1.5 rounded-full mb-4 overflow-hidden">
        <div class="bg-[#1D4ED8] h-full" style="width: 85%"></div>
        </div>
        <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Enterprise Systems Built</p>
        </div>
        <!-- Users Served -->
        <div class="border border-gray-100 p-8 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
        <p class="text-5xl font-black text-[#1D4ED8] mb-4">100K+</p>
        <div class="w-full bg-gray-100 h-1.5 rounded-full mb-4 overflow-hidden">
        <div class="bg-[#1D4ED8] h-full" style="width: 70%"></div>
        </div>
        <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Active Users Served</p>
        </div>
        <!-- Branch Deployments -->
        <div class="border border-gray-100 p-8 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
        <p class="text-5xl font-black text-[#1D4ED8] mb-4">800+</p>
        <div class="w-full bg-gray-100 h-1.5 rounded-full mb-4 overflow-hidden">
        <div class="bg-[#1D4ED8] h-full" style="width: 90%"></div>
        </div>
        <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Branch Deployments</p>
        </div>
        <!-- Transactions Processed -->
        <div class="border border-gray-100 p-8 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
        <p class="text-5xl font-black text-[#1D4ED8] mb-4">M+</p>
        <div class="w-full bg-gray-100 h-1.5 rounded-full mb-4 overflow-hidden">
        <div class="bg-[#1D4ED8] h-full" style="width: 95%"></div>
        </div>
        <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400">Transactions Processed</p>
        </div></div>
        </div>
        </section>
        <!-- Platforms Section -->
        <section class="py-24 px-6 bg-background-light" id="platforms">
        <div class="mx-auto max-w-7xl">
        <div class="mb-16 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
        <span class="text-sm font-bold uppercase tracking-widest text-primary mb-4 block">Selected Works</span>
        <h2 class="text-4xl font-black tracking-tight text-[#0e121b]">Strategic Platforms</h2>
        </div>
        <p class="max-w-md text-gray-500 font-medium">Core infrastructure projects designed to handle extreme scale and operational complexity.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Platform Card 1 -->
        <div class="group flex flex-col bg-white border border-[#e5e7eb] rounded-sm overflow-hidden hover:border-primary/50 transition-all duration-300">
        <div class="aspect-video bg-gray-100 bg-cover bg-center" data-alt="Screenshot of an ERP modernization dashboard" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuATqzC5qZMqgzFGCCV_SSTjQdkzQ9ujcA6kEHjIdFy80w1mJV_7PS5wTJt9Ez9WB0utVZrLLq5dVHl6dcDMgkNm5LbnG7VGMGdeaWtsBjITpI7VZTFfDxGQ1rVXQVeDxbqsWWyGNBdm7FVabC8rmBq8NH9WKbk9gpIWInrPII_hlXwVhsob67QFOO-srlKJ0UmCrVR52PpTtoQYJfgzoSQVUy8qYnOW6bgdfqEHMimO57BI6j6g2evA8m3l6yAIoqLc9Pj_2s0stNH0')"></div>
        <div class="p-8 flex flex-col flex-1">
        <div class="flex gap-2 mb-4">
        <span class="px-2 py-0.5 bg-gray-100 text-[10px] font-bold uppercase tracking-tighter text-gray-500 rounded-sm">Enterprise</span>
        <span class="px-2 py-0.5 bg-primary/10 text-[10px] font-bold uppercase tracking-tighter text-primary rounded-sm">Active</span>
        </div>
        <h3 class="text-xl font-bold text-[#0e121b] mb-4">ERP Modernization</h3>
        <p class="text-sm text-gray-500 mb-4 leading-relaxed">Automated financial reconciliation with 99.9% accuracy, modular microservices architecture, and legacy database migration.</p><div class="space-y-4 text-sm text-gray-600 mb-8">
        <div class="flex justify-between border-b border-gray-50 pb-2">
        <span class="font-semibold text-gray-400">Impact</span>
        <span>40% Efficiency Gain</span>
        </div>
        <div class="flex justify-between border-b border-gray-50 pb-2">
        <span class="font-semibold text-gray-400">Architecture</span>
        <span>Micro-services</span>
        </div>
        <div class="flex justify-between">
        <span class="font-semibold text-gray-400">Tech</span>
        <span class="font-mono text-[11px]">Go, Redis, Kubernetes</span>
        </div>
        </div>
        <button class="mt-auto flex items-center gap-2 text-sm font-bold text-primary hover:gap-3 transition-all">
                                        Explore Architecture <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </button>
        </div>
        </div>
        <!-- Platform Card 2 -->
        <div class="group flex flex-col bg-white border border-[#e5e7eb] rounded-sm overflow-hidden hover:border-primary/50 transition-all duration-300">
        <div class="aspect-video bg-gray-100 bg-cover bg-center" data-alt="University digital library interface design" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC6_FHGKN1Uj5ZmOQY4w8nkA6XMtsyqhsCqkWToe4o3GYLEesMiYvIXgJ2adxxbW82ublf24OPlOQ-mhI6dVA-gVVAgxS8eNlbDRcdqNYMT9XodoCUJfbKPaj_ss232F_enEt8HqG0Lnq05tKXNw77v4m-JJ9CcfqKzc-uOlj5o2w8aT8k-bi9ZByQlKF87o9bdX8yqBJXXRyluu11RIKjUKmYaZN97RHomjlFuhkBuJo1XlC6W0KCNxA1EQUyoDX688c-ZTsRfdxw-')"></div>
        <div class="p-8 flex flex-col flex-1">
        <div class="flex gap-2 mb-4">
        <span class="px-2 py-0.5 bg-gray-100 text-[10px] font-bold uppercase tracking-tighter text-gray-500 rounded-sm">EduTech</span>
        <span class="px-2 py-0.5 bg-primary/10 text-[10px] font-bold uppercase tracking-tighter text-primary rounded-sm">Live</span>
        </div>
        <h3 class="text-xl font-bold text-[#0e121b] mb-4">Digital University Library</h3>
        <p class="text-sm text-gray-500 mb-4 leading-relaxed">Distributed search indexing with Elasticsearch, real-time availability tracking for 500k+ assets, and multi-campus synchronization.</p><div class="space-y-4 text-sm text-gray-600 mb-8">
        <div class="flex justify-between border-b border-gray-50 pb-2">
        <span class="font-semibold text-gray-400">Impact</span>
        <span>2M+ Digital Assets</span>
        </div>
        <div class="flex justify-between border-b border-gray-50 pb-2">
        <span class="font-semibold text-gray-400">Architecture</span>
        <span>Distributed Search</span>
        </div>
        <div class="flex justify-between">
        <span class="font-semibold text-gray-400">Tech</span>
        <span class="font-mono text-[11px]">ElasticSearch, Node.js</span>
        </div>
        </div>
        <button class="mt-auto flex items-center gap-2 text-sm font-bold text-primary hover:gap-3 transition-all">
                                        Explore Architecture <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </button>
        </div>
        </div>
        <!-- Platform Card 3 -->
        <div class="group flex flex-col bg-white border border-[#e5e7eb] rounded-sm overflow-hidden hover:border-primary/50 transition-all duration-300">
        <div class="aspect-video bg-gray-100 bg-cover bg-center" data-alt="Multi-tenant SaaS administrative dashboard" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBR1CdxiQ-lyTdzBCQBmWCURLblp9nNXEd0jFIcgIYw9aF17ZnjR2d6G3YJYGlaTzip5wd1QGCSlrSUmY60fMTwz9AoOHPawcoGjoZUH6fL9FAlqtk_LatAmnKSm2EjAoXK2QtGOhisbOvPEU4Cw7e_V5VFYwURZ3rgXNP7bp7vV2vpBf4l50ghZPJiaUuLcPyuG0FI3bxoUwRAOJRXwwnzfkLfqwhZqivnDWMw8gpztipyJ7ibMNyPHoSw71aSz1F0Nze_T_nJjc1y')"></div>
        <div class="p-8 flex flex-col flex-1">
        <div class="flex gap-2 mb-4">
        <span class="px-2 py-0.5 bg-gray-100 text-[10px] font-bold uppercase tracking-tighter text-gray-500 rounded-sm">FinTech</span>
        <span class="px-2 py-0.5 bg-primary/10 text-[10px] font-bold uppercase tracking-tighter text-primary rounded-sm">Scaling</span>
        </div>
        <h3 class="text-xl font-bold text-[#0e121b] mb-4">Multi-tenant B2B SaaS</h3>
        <p class="text-sm text-gray-500 mb-4 leading-relaxed">Isolated tenant data schemas, high-availability AWS infrastructure, and custom RBAC for enterprise compliance.</p><div class="space-y-4 text-sm text-gray-600 mb-8">
        <div class="flex justify-between border-b border-gray-50 pb-2">
        <span class="font-semibold text-gray-400">Impact</span>
        <span>ISO-27001 Compliant</span>
        </div>
        <div class="flex justify-between border-b border-gray-50 pb-2">
        <span class="font-semibold text-gray-400">Architecture</span>
        <span>Tenant Isolation</span>
        </div>
        <div class="flex justify-between">
        <span class="font-semibold text-gray-400">Tech</span>
        <span class="font-mono text-[11px]">PostgreSQL, AWS Lambda</span>
        </div>
        </div>
        <button class="mt-auto flex items-center gap-2 text-sm font-bold text-primary hover:gap-3 transition-all">
                                        Explore Architecture <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </button>
        </div>
        </div>
        </div>
        </div>
        </section><section class="py-24 px-6 bg-white border-b border-[#e5e7eb]" id="technical-expertise">
        <div class="mx-auto max-w-7xl">
        <div class="mb-16">
        <span class="text-sm font-bold uppercase tracking-widest text-primary mb-4 block">Knowledge &amp; Depth</span>
        <h2 class="text-4xl font-black tracking-tight text-[#0e121b] mb-4">Technical Expertise</h2>
        <p class="max-w-2xl text-gray-500 font-medium">Architecting full-stack solutions with a deep focus on performance, security, and developer experience across the entire lifecycle.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Server & Infrastructure -->
        <div class="p-8 border border-gray-100 rounded-sm bg-background-light/30 hover:border-primary/30 transition-all">
        <div class="size-12 bg-primary/5 rounded-sm flex items-center justify-center mb-6 text-primary">
        <span class="material-symbols-outlined">dns</span>
        </div>
        <h4 class="text-lg font-bold text-[#0e121b] mb-4">Server &amp; Infrastructure</h4>
        <ul class="space-y-2">
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Linux (Ubuntu/Debian)</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> NGINX &amp; Load Balancing</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Containerization (Docker)</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Kubernetes Orchestration</li>
        </ul>
        </div>
        <!-- Backend Engineering -->
        <div class="p-8 border border-gray-100 rounded-sm bg-background-light/30 hover:border-primary/30 transition-all">
        <div class="size-12 bg-primary/5 rounded-sm flex items-center justify-center mb-6 text-primary">
        <span class="material-symbols-outlined">settings_ethernet</span>
        </div>
        <h4 class="text-lg font-bold text-[#0e121b] mb-4">Backend Engineering</h4>
        <ul class="space-y-2">
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Node.js &amp; TypeScript</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Python (Django/FastAPI)</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> PostgreSQL &amp; DB Design</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Redis &amp; Caching layers</li>
        </ul>
        </div>
        <!-- Frontend Architecture -->
        <div class="p-8 border border-gray-100 rounded-sm bg-background-light/30 hover:border-primary/30 transition-all">
        <div class="size-12 bg-primary/5 rounded-sm flex items-center justify-center mb-6 text-primary">
        <span class="material-symbols-outlined">web</span>
        </div>
        <h4 class="text-lg font-bold text-[#0e121b] mb-4">Frontend Architecture</h4>
        <ul class="space-y-2">
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> React Ecosystem</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Next.js SSR &amp; SSG</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Tailwind CSS Design</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Micro-frontends</li>
        </ul>
        </div>
        <!-- Cloud Systems -->
        <div class="p-8 border border-gray-100 rounded-sm bg-background-light/30 hover:border-primary/30 transition-all">
        <div class="size-12 bg-primary/5 rounded-sm flex items-center justify-center mb-6 text-primary">
        <span class="material-symbols-outlined">cloud</span>
        </div>
        <h4 class="text-lg font-bold text-[#0e121b] mb-4">Cloud Systems</h4>
        <ul class="space-y-2">
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> AWS (EC2, S3, RDS)</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> GCP Cloud Functions</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Cloudflare Edge Services</li>
        <li class="flex items-center gap-2 text-sm text-gray-600"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Terraform (IaC)</li>
        </ul>
        </div>
        </div>
        </div>
        </section>
        <!-- Engineering Leadership -->
        <section class="py-24 px-6 bg-white" id="engineering">
        <div class="mx-auto max-w-7xl">
        <div class="text-center mb-16">
        <span class="text-sm font-bold uppercase tracking-widest text-primary mb-4 block">Core Competencies</span>
        <h2 class="text-4xl font-black tracking-tight text-[#0e121b]">Engineering Leadership</h2>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-px bg-[#e5e7eb] border border-[#e5e7eb]">
        <div class="bg-white p-10 flex flex-col items-center text-center">
        <span class="material-symbols-outlined text-4xl text-primary mb-6">cloud_sync</span>
        <h4 class="font-bold text-[#0e121b] mb-2">Cloud Infrastructure</h4>
        <p class="text-xs text-gray-500 leading-relaxed">AWS, GCP, &amp; Hybrid Cloud management at scale.</p>
        </div>
        <div class="bg-white p-10 flex flex-col items-center text-center">
        <span class="material-symbols-outlined text-4xl text-primary mb-6">developer_board</span>
        <h4 class="font-bold text-[#0e121b] mb-2">SaaS Architecture</h4>
        <p class="text-xs text-gray-500 leading-relaxed">Multi-tenant design and horizontally scalable systems.</p>
        </div>
        <div class="bg-white p-10 flex flex-col items-center text-center">
        <span class="material-symbols-outlined text-4xl text-primary mb-6">api</span>
        <h4 class="font-bold text-[#0e121b] mb-2">API Integrations</h4>
        <p class="text-xs text-gray-500 leading-relaxed">Robust middleware and third-party orchestration.</p>
        </div>
        <div class="bg-white p-10 flex flex-col items-center text-center">
        <span class="material-symbols-outlined text-4xl text-primary mb-6">terminal</span>
        <h4 class="font-bold text-[#0e121b] mb-2">DevOps &amp; CI/CD</h4>
        <p class="text-xs text-gray-500 leading-relaxed">Docker, Kubernetes, and automated deployment pipelines.</p>
        </div>
        </div>
        </div>
        </section>
        <!-- Future Products -->
        <section class="py-24 px-6 bg-background-light" id="future">
        <div class="mx-auto max-w-7xl">
        <div class="mb-12">
        <h2 class="text-3xl font-black tracking-tight text-[#0e121b] mb-2">Products in Development</h2>
        <p class="text-gray-500 font-medium">Currently architecting the next generation of operational tools.</p>
        </div>
        <div class="space-y-4">
        <div class="bg-white p-6 border border-[#e5e7eb] rounded-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex items-center gap-4">
        <div class="size-12 bg-primary/5 rounded-sm flex items-center justify-center">
        <span class="material-symbols-outlined text-primary">analytics</span>
        </div>
        <div>
        <h4 class="font-bold text-[#0e121b]">Neural Ops Dashboard</h4>
        <p class="text-xs text-gray-500">Predictive infrastructure maintenance platform</p>
        </div>
        </div>
        <div class="flex flex-col gap-1 w-full md:w-48">
        <div class="flex justify-between text-[10px] font-bold uppercase tracking-widest mb-1">
        <span>Alpha Phase</span>
        <span>65%</span>
        </div>
        <div class="w-full bg-gray-100 h-1 rounded-full overflow-hidden">
        <div class="bg-primary h-full" style="width: 65%"></div>
        </div>
        </div>
        </div>
        <div class="bg-white p-6 border border-[#e5e7eb] rounded-sm flex flex-col md:flex-row md:items-center justify-between gap-6 opacity-60">
        <div class="flex items-center gap-4">
        <div class="size-12 bg-primary/5 rounded-sm flex items-center justify-center">
        <span class="material-symbols-outlined text-primary">security</span>
        </div>
        <div>
        <h4 class="font-bold text-[#0e121b]">Shield Protocol V2</h4>
        <p class="text-xs text-gray-500">Autonomous edge security for multi-cloud deployments</p>
        </div>
        </div>
        <div class="flex flex-col gap-1 w-full md:w-48">
        <div class="flex justify-between text-[10px] font-bold uppercase tracking-widest mb-1">
        <span>Ideation</span>
        <span>20%</span>
        </div>
        <div class="w-full bg-gray-100 h-1 rounded-full overflow-hidden">
        <div class="bg-primary h-full" style="width: 20%"></div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
        <!-- Founder Quote -->
        <section class="py-24 px-6 bg-white overflow-hidden relative">
        <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-16">
        <div class="relative">
        <div class="absolute -top-10 -left-10 text-[160px] font-black text-gray-50 opacity-10 leading-none select-none">"</div>
        <h2 class="text-4xl font-black text-[#0e121b] leading-tight mb-8">
                                    "Infrastructure is not just about servers; it's about the <span class="text-primary">velocity of business</span>."
                                </h2>
        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                    I partner with founders and CTOs to audit, refine, and rebuild their technical foundations. My goal is to remove technical debt as a barrier and transform it into a competitive advantage.
                                </p>
        <div class="flex items-center gap-4">
        <div class="h-px w-12 bg-primary"></div>
        <span class="text-sm font-bold uppercase tracking-[0.2em] text-[#0e121b]">Lead Systems Architect</span>
        </div>
        </div>
        <div class="relative">
        <div class="aspect-[4/5] bg-gray-200 rounded-sm overflow-hidden bg-cover bg-center shadow-2xl" data-alt="A professional full-body portrait of a technology leader in a modern office environment" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBE2gXtK7X7Xv1zhX5HjprSxjKrm1zK6YspuP_ExTka18qZx06U3bJicNlOd0ESQCYHd7hAs1F9K4FXcw3txpNAK9B3fE8TamomxeO6oM1tRW0RPLv4Jdtj2PKY6Lq36bOL6n9zJlcf_3Fy7cRPGU1NEq3Ol8DRIdnP9BIJ_J8xHTcspa-bmyQMX_0NY-voXFe-3Dwh_NT3JOmPFvPT5hBPEvhcE3rHCbsLr7i5wZNAd-rhYKWk1IIRoPKUYCqFC4hy0wYRRWkvr1jk')"></div>
        <div class="absolute -bottom-6 -right-6 p-8 bg-primary text-white rounded-sm hidden lg:block">
        <p class="font-mono text-sm leading-tight">01001111 01010000 01010011</p>
        <p class="font-mono text-xs opacity-60">System Ready</p>
        </div>
        </div>
        </div>
        </div>
        </section>
        <!-- Final CTA -->
        <section class="py-24 px-6 bg-primary relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full grid-pattern opacity-10 invert"></div>
        <div class="mx-auto max-w-4xl text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-black text-white mb-8 tracking-tight">Let’s Build Systems That Scale.</h2>
        <p class="text-white/80 text-lg mb-12 max-w-2xl mx-auto">
                            Whether you're overcoming performance bottlenecks or architecting from scratch, let's design your infrastructure for long-term success.
                        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <button class="w-full sm:w-auto min-w-[220px] rounded-sm bg-white px-8 py-5 text-base font-black text-primary hover:bg-gray-50 transition-all flex items-center justify-center gap-3">
                                Book a Consultation <span class="material-symbols-outlined">calendar_month</span>
        </button>
        <button class="w-full sm:w-auto min-w-[220px] rounded-sm bg-primary border border-white/30 px-8 py-5 text-base font-black text-white hover:bg-white/10 transition-all">
                                Technical Audit
                            </button>
        </div>
        </div>
        </section>
        <!-- Footer -->
        <footer class="bg-background-dark py-12 px-6">
        <div class="mx-auto max-w-7xl flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="flex items-center gap-2">
        <div class="bg-primary/20 p-1 rounded-sm text-primary">
        <span class="material-symbols-outlined text-xl">architecture</span>
        </div>
        <h2 class="text-lg font-extrabold tracking-tight text-white">Founder &amp; Architect</h2>
        </div>
        <div class="text-gray-500 text-xs font-medium tracking-wider">
                            © 2024 INFRASTRUCTURE ARCHITECT. ALL RIGHTS RESERVED.
                        </div>
        <div class="flex gap-6">
        <a class="text-gray-400 hover:text-white transition-colors" href="#"><span class="material-symbols-outlined text-xl">terminal</span></a>
        <a class="text-gray-400 hover:text-white transition-colors" href="#"><span class="material-symbols-outlined text-xl">database</span></a>
        <a class="text-gray-400 hover:text-white transition-colors" href="#"><span class="material-symbols-outlined text-xl">lan</span></a>
        </div>
        </div>
        </footer>
    </main>
</template>