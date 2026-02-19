<script setup>
    import EngineerLayout from '@/Shared/Layouts/Engineer.vue';
    
    defineOptions({
        layout: EngineerLayout
    });
</script>

<template>
    <main>
        <!-- Section 01: Hero Slider -->
        <section class="relative h-[calc(100vh-64px)] w-full overflow-hidden border-b border-border-muted">
        <div class="absolute inset-0 flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-background-dark via-transparent to-transparent z-10"></div>
            <!-- Blueprint Background Simulation -->
            <div class="absolute inset-0 opacity-20 pointer-events-none" data-alt="Technical engineering blueprint background with lines and diagrams" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCcSQYbHic6WNr3eZWpL1KVc5Z5rIkR42sAvwI_aWyXQxQXQmOFzYDQ9eBZqZi9zxwhc-dgwTX96YHvrBB_aXapwCGHzceHhoun1iEnvTE_rPGtURTP0-w5ap7QRCVJfC7qRDIKFjymc479LkZebkT4DiDicbgLLJssXcLfh-5Ok5lh6jzllfslWNJg9E6ox3D79RQiddsllOGQVSqgXa6XGOKvhVp-XUJuQMpNLl8Kw8MlWuARfYoVbS6XQ8FR3EbrjGc7_YUKvHST'); background-size: cover; background-position: center;"></div>
            <div class="max-w-7xl mx-auto px-6 w-full relative z-20">
                <div class="flex flex-col gap-4 max-w-4xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary/20 border border-primary/40 rounded-full w-fit">
                        <span class="text-[10px] font-bold text-primary tracking-[0.2em] uppercase">Status: Production Ready</span>
                    </div>
                    <h1 class="text-6xl md:text-8xl font-bold leading-[0.9] tracking-tighter uppercase italic">
                        System <span class="text-primary">Architecture</span> &amp; Scalable Solutions
                    </h1>
                    <p class="text-text-muted text-lg md:text-xl max-w-2xl mt-4 font-light leading-relaxed">
                        Engineering high-performance distributed systems with a focus on reliability, security, and enterprise-grade scalability.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <button class="group flex items-center gap-3 px-8 py-4 bg-primary text-white rounded-lg font-bold uppercase tracking-widest hover:gap-5 transition-all">
                            Initialize_Project
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                        <button class="px-8 py-4 bg-white/5 border border-white/10 rounded-lg font-bold uppercase tracking-widest hover:bg-white/10 transition-all">
                            View_Modules
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Side Metadata -->
        <div class="absolute right-10 bottom-10 hidden xl:flex flex-col gap-4 text-right border-r-2 border-primary pr-6">
            <div>
                <p class="text-[10px] text-text-muted uppercase tracking-[0.3em]">Coordinate_X</p>
                <p class="text-xl font-mono">40.7128° N</p>
            </div>
            <div>
                <p class="text-[10px] text-text-muted uppercase tracking-[0.3em]">Coordinate_Y</p>
                <p class="text-xl font-mono">74.0060° W</p>
            </div>
            <div>
                <p class="text-[10px] text-text-muted uppercase tracking-[0.3em]">Environment</p>
                <p class="text-xl font-mono">K8S_PROD</p>
            </div>
        </div>
        </section>
        <!-- Section 02: Project Repository -->
        <section class="py-24 max-w-7xl mx-auto px-6" id="repository">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div>
                    <h2 class="text-4xl font-bold uppercase tracking-tighter italic flex items-center gap-4">
                    <span class="text-primary text-xl font-mono not-italic">[01]</span>
                        Module_Repository
                    </h2>
                    <div class="h-1 w-24 bg-primary mt-2"></div>
                </div>
                <p class="text-text-muted max-w-md text-sm uppercase tracking-wider leading-relaxed">
                    A curated collection of microservices, enterprise engines, and data pipelines built for high throughput.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project Card 1 -->
                <div class="group relative flex flex-col bg-background-dark border border-border-muted rounded-xl overflow-hidden hover:border-primary transition-colors duration-500">
                    <div class="absolute top-0 right-0 p-4 z-10">
                        <span class="text-[10px] font-mono bg-background-dark/80 px-2 py-1 border border-border-muted rounded text-primary">v2.4.0</span>
                    </div>
                    <div class="w-full aspect-video bg-cover bg-center group-hover:scale-105 transition-transform duration-700" data-alt="Server rack infrastructure with glowing blue lights" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB4OujQaYDCGoPOvsU1oynYDPWBw2ihkZTgKP7eaZkyfZ1K7vD4lRtUoeLveSr2fv2jAAXj_lr7XFc5AviX2uc1EKzHvu0MkF209f8VDs6AP8Ybm99ykytvvahC7o65zcRQt-Z2NIMdrXBh-tEKB376GJqSHMRtEtWgckJ0NxuQXQBUPaqtTTJkAiOC_tGUZiQKrH68SWwF_S9K6mgFQVFqtAUjWF91dUZPq4_cQFPcjvi2w0MH3H9d30XrlOH84KiVLp_DBS7VJcXZ')"></div>
                    <div class="p-6 flex flex-col gap-4">
                        <div>
                            <p class="text-[10px] text-primary font-bold uppercase tracking-[0.2em] mb-1">E-Commerce_Engine</p>
                            <h3 class="text-xl font-bold uppercase tracking-tight">Project_Alpha</h3>
                        </div>
                        <p class="text-text-muted text-sm line-clamp-2">High-performance transaction processing engine designed to handle 50k+ requests per second.</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">Node.js</span>
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">AWS</span>
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">K8s</span>
                        </div>
                    </div>
                </div>
                <!-- Project Card 2 -->
                <div class="group relative flex flex-col bg-background-dark border border-border-muted rounded-xl overflow-hidden hover:border-primary transition-colors duration-500">
                    <div class="absolute top-0 right-0 p-4 z-10">
                        <span class="text-[10px] font-mono bg-background-dark/80 px-2 py-1 border border-border-muted rounded text-primary">v1.1.2</span>
                    </div>
                    <div class="w-full aspect-video bg-cover bg-center group-hover:scale-105 transition-transform duration-700" data-alt="Digital analytics dashboard with complex data visualizations" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBTcx6slNP3dygFSidZ2c4AWcRxEAQ0GrqVKBLHhE-9smFkR0io-TT4PVM58ekcocMW807rX8pLT0OYt5M2MtAo3tWX3OeWHqFKQVrRYTFBtGGcwecgh2MImmiEOnsaucPaNenoIpvItpyWixht54BFTvOaCwAOdANYVbmVconnDpdGd-KNQtpixIfyJ81Y8VHBtcLjGadZdWngyTy0jUyvffxp93pPejtAJdrYZvpqq9CLsYZV_qeB9mjzSZYUvdNhIo1VN3SxpKO_')"></div>
                    <div class="p-6 flex flex-col gap-4">
                        <div>
                            <p class="text-[10px] text-primary font-bold uppercase tracking-[0.2em] mb-1">Real-Time_Analytics</p>
                            <h3 class="text-xl font-bold uppercase tracking-tight">Project_Beta</h3>
                        </div>
                        <p class="text-text-muted text-sm line-clamp-2">Event-driven data processing pipeline for low-latency behavioral analytics and alerting.</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">Python</span>
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">gRPC</span>
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">Redis</span>
                        </div>
                    </div>
                </div>
                <!-- Project Card 3 -->
                <div class="group relative flex flex-col bg-background-dark border border-border-muted rounded-xl overflow-hidden hover:border-primary transition-colors duration-500">
                    <div class="absolute top-0 right-0 p-4 z-10">
                        <span class="text-[10px] font-mono bg-background-dark/80 px-2 py-1 border border-border-muted rounded text-primary">v3.0.1</span>
                    </div>
                    <div class="w-full aspect-video bg-cover bg-center group-hover:scale-105 transition-transform duration-700" data-alt="Security lock icon overlaid on abstract digital grid" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCLoUP-8TkXUstnnXoCgLVQjt5EVmkDQZWCTrxdRbrnVzXsCPE9mZ2ytzof6FYt-dy6kxp60anlgI7NwaRqXkxmyASAcek_sdan2QM8Cwz40dZAoAGCsSnSKV2rMHlKm_rw300Kkt38xGX0Eathq97YbN6uj87Ive6lEwSkquGkR_4f7bbLBOpwrrTs9VT2aeviV7pG8nvfsO3yesAUfrvClXEV-7Oapfh6xWN0LZZ67fsErBdsdtDHfLcReR98OZFpfoaR9hmCPzmu')"></div>
                    <div class="p-6 flex flex-col gap-4">
                        <div>
                            <p class="text-[10px] text-primary font-bold uppercase tracking-[0.2em] mb-1">IAM_Service</p>
                            <h3 class="text-xl font-bold uppercase tracking-tight">Project_Gamma</h3>
                        </div>
                        <p class="text-text-muted text-sm line-clamp-2">Distributed identity and access management system with OAuth2 and multi-region sync.</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">Go</span>
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">PostgreSQL</span>
                            <span class="px-2 py-1 bg-primary/10 border border-primary/20 rounded text-[10px] font-mono text-primary uppercase">Docker</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section 03: Capability Matrix -->
        <section class="py-24 bg-primary/5 border-y border-border-muted" id="matrix">
        <div class="max-w-7xl mx-auto px-6">
        <div class="mb-16">
        <h2 class="text-4xl font-bold uppercase tracking-tighter italic flex items-center gap-4">
        <span class="text-primary text-xl font-mono not-italic">[02]</span>
                                Capability_Matrix
                            </h2>
        <div class="h-1 w-24 bg-primary mt-2"></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div class="space-y-8">
        <div class="p-8 border border-border-muted bg-background-dark/50 rounded-xl relative overflow-hidden group">
        <div class="absolute top-0 left-0 w-1 h-full bg-primary transform -translate-x-full group-hover:translate-x-0 transition-transform"></div>
        <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold uppercase tracking-widest text-primary italic">Backend_Architecture</h3>
        <span class="material-symbols-outlined text-primary">dns</span>
        </div>
        <div class="space-y-6">
        <div>
        <div class="flex justify-between text-xs font-mono uppercase mb-2">
        <span>Microservices Design</span>
        <span>98%</span>
        </div>
        <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden">
        <div class="h-full bg-primary w-[98%]"></div>
        </div>
        </div>
        <div>
        <div class="flex justify-between text-xs font-mono uppercase mb-2">
        <span>API Infrastructure (REST/gRPC)</span>
        <span>95%</span>
        </div>
        <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden">
        <div class="h-full bg-primary w-[95%]"></div>
        </div>
        </div>
        <div>
        <div class="flex justify-between text-xs font-mono uppercase mb-2">
        <span>Database Optimization</span>
        <span>90%</span>
        </div>
        <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden">
        <div class="h-full bg-primary w-[90%]"></div>
        </div>
        </div>
        </div>
        </div>
        <div class="p-8 border border-border-muted bg-background-dark/50 rounded-xl relative overflow-hidden group">
        <div class="absolute top-0 left-0 w-1 h-full bg-primary transform -translate-x-full group-hover:translate-x-0 transition-transform"></div>
        <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold uppercase tracking-widest text-primary italic">DevOps_Operations</h3>
        <span class="material-symbols-outlined text-primary">cloud_done</span>
        </div>
        <div class="space-y-6">
        <div>
        <div class="flex justify-between text-xs font-mono uppercase mb-2">
        <span>Kubernetes Orchestration</span>
        <span>92%</span>
        </div>
        <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden">
        <div class="h-full bg-primary w-[92%]"></div>
        </div>
        </div>
        <div>
        <div class="flex justify-between text-xs font-mono uppercase mb-2">
        <span>CI/CD Pipelines</span>
        <span>96%</span>
        </div>
        <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden">
        <div class="h-full bg-primary w-[96%]"></div>
        </div>
        </div>
        <div>
        <div class="flex justify-between text-xs font-mono uppercase mb-2">
        <span>Infrastructure as Code (Terraform)</span>
        <span>88%</span>
        </div>
        <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden">
        <div class="h-full bg-primary w-[88%]"></div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="flex flex-col justify-center gap-10">
        <div class="border-l-4 border-primary pl-8 py-4">
        <h4 class="text-2xl font-bold uppercase mb-2 italic tracking-tight">Technical Specification</h4>
        <p class="text-text-muted leading-relaxed">
                                        Proficiency is measured through enterprise deployment success rates and system uptime metrics. Every module is documented, tested, and optimized for maximum reliability.
                                    </p>
        </div>
        <div class="grid grid-cols-2 gap-4">
        <div class="p-6 bg-white/5 border border-white/5 rounded-lg text-center">
        <p class="text-4xl font-bold text-primary mb-1">150+</p>
        <p class="text-[10px] text-text-muted uppercase tracking-widest font-bold">Deployments</p>
        </div>
        <div class="p-6 bg-white/5 border border-white/5 rounded-lg text-center">
        <p class="text-4xl font-bold text-primary mb-1">99.9%</p>
        <p class="text-[10px] text-text-muted uppercase tracking-widest font-bold">Uptime Avg</p>
        </div>
        <div class="p-6 bg-white/5 border border-white/5 rounded-lg text-center">
        <p class="text-4xl font-bold text-primary mb-1">5ms</p>
        <p class="text-[10px] text-text-muted uppercase tracking-widest font-bold">P99 Latency</p>
        </div>
        <div class="p-6 bg-white/5 border border-white/5 rounded-lg text-center">
        <p class="text-4xl font-bold text-primary mb-1">12+</p>
        <p class="text-[10px] text-text-muted uppercase tracking-widest font-bold">Core Modules</p>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
        <!-- Section 04: Engineering Offerings -->
        <section class="py-24 max-w-7xl mx-auto px-6" id="offerings">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6 text-right md:text-left">
        <div class="md:order-2">
        <h2 class="text-4xl font-bold uppercase tracking-tighter italic flex items-center justify-end md:justify-start gap-4">
                                Engineering_Offerings
                                <span class="text-primary text-xl font-mono not-italic">[03]</span>
        </h2>
        <div class="h-1 w-24 bg-primary mt-2 ml-auto md:ml-0"></div>
        </div>
        <p class="text-text-muted max-w-md text-sm uppercase tracking-wider leading-relaxed md:order-1">
                            Specialized services focused on structural integrity and system performance.
                        </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border border-border-muted rounded-xl overflow-hidden">
        <div class="p-10 border-b md:border-b-0 md:border-r border-border-muted hover:bg-primary/5 transition-colors group">
        <span class="material-symbols-outlined text-4xl text-primary mb-6">architecture</span>
        <h3 class="text-xl font-bold uppercase mb-4 italic tracking-widest">System Design</h3>
        <p class="text-text-muted text-sm leading-relaxed mb-6">
                                Architecting high-availability systems with focused redundancy, failover strategies, and modular components.
                            </p>
        <ul class="text-[11px] font-mono text-primary space-y-2 uppercase">
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> Load Balancing</li>
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> Data Consistency</li>
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> Scalability Hooks</li>
        </ul>
        </div>
        <div class="p-10 border-b md:border-b-0 md:border-r border-border-muted hover:bg-primary/5 transition-colors group">
        <span class="material-symbols-outlined text-4xl text-primary mb-6">cloud_sync</span>
        <h3 class="text-xl font-bold uppercase mb-4 italic tracking-widest">Cloud Infra</h3>
        <p class="text-text-muted text-sm leading-relaxed mb-6">
                                Provisioning and managing secure, cost-optimized cloud environments using modern IaC methodologies.
                            </p>
        <ul class="text-[11px] font-mono text-primary space-y-2 uppercase">
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> Multi-Cloud Deployment</li>
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> Serverless Architectures</li>
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> Edge Computing</li>
        </ul>
        </div>
        <div class="p-10 hover:bg-primary/5 transition-colors group">
        <span class="material-symbols-outlined text-4xl text-primary mb-6">api</span>
        <h3 class="text-xl font-bold uppercase mb-4 italic tracking-widest">API Architecture</h3>
        <p class="text-text-muted text-sm leading-relaxed mb-6">
                                Designing robust, secure, and developer-friendly API ecosystems that serve as reliable core interfaces.
                            </p>
        <ul class="text-[11px] font-mono text-primary space-y-2 uppercase">
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> RESTful / GraphQL / gRPC</li>
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> Rate Limiting &amp; Auth</li>
        <li class="flex items-center gap-2"><span class="size-1 bg-primary rounded-full"></span> OpenAPI Standards</li>
        </ul>
        </div>
        </div>
        </section>
        <!-- Section 05: Validation Logs (Testimonials) -->
        <section class="py-24 bg-background-dark/50">
        <div class="max-w-7xl mx-auto px-6">
        <div class="mb-16">
        <h2 class="text-4xl font-bold uppercase tracking-tighter italic flex items-center gap-4">
        <span class="text-primary text-xl font-mono not-italic">[04]</span>
                                Validation_Logs
                            </h2>
        <div class="h-1 w-24 bg-primary mt-2"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="p-8 border border-border-muted rounded-xl bg-background-dark relative">
        <span class="material-symbols-outlined absolute top-8 right-8 text-white/10 text-6xl">format_quote</span>
        <div class="flex items-center gap-4 mb-6">
        <div class="size-12 rounded-lg bg-cover bg-center border border-primary/30" data-alt="Portrait of CTO in modern office" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAdVDvdKr1rMn0r5Bn48cf08U3gZ_l6RWPpsIwqwjWdlt0A2X5g7emQB1SzByOPrmAT8_uZWoPiVPaG_MYzrfLEs-E5arDkqmhKPdwRFMgQY-pVC4wgE7P5xwY3O9Gc0UfpyKz1xiyrlW-tsYByqtSpc3E1o1XCZ5gnm193b74NmxYP9qtP3kZkoIpIQXdc8nwGxwr2ZjV_6HTh8UVL3eN4NqD4QyBMDesdNSDUELKralNscXPkpelC0XN-P5v-1SD5ed7F8L2rJtRz')"></div>
        <div>
        <h4 class="font-bold uppercase tracking-tight">Marcus Sterling</h4>
        <p class="text-[10px] text-primary font-mono uppercase">CTO @ TechFlow Systems</p>
        </div>
        </div>
        <p class="text-text-muted italic leading-relaxed">
                                    "The system architecture designed for our platform reduced P99 latency by 45% while handling 3x more traffic than our previous setup. Highly methodical engineering."
                                </p>
        </div>
        <div class="p-8 border border-border-muted rounded-xl bg-background-dark relative">
        <span class="material-symbols-outlined absolute top-8 right-8 text-white/10 text-6xl">format_quote</span>
        <div class="flex items-center gap-4 mb-6">
        <div class="size-12 rounded-lg bg-cover bg-center border border-primary/30" data-alt="Portrait of female product manager" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBsmM75-q-9msOJW_G2UV57ODf7Kl6-7ntL78GwMnr8reJ46-c08pBUHLFFlbsDpnS_ETuNFOm1ye1KB_VY-cwH-IFyHmo_ORNs08UaonVRmZRvkYQyYTOsN9kFz7GZLvyENYN3i9uNSFOGz-IunQXo7UuZdMqYcswgL_8Xs6ThSTJasc7luSXJzElaSIbprG6jBt8L6YERHN7zCNnKjLh3s6Q2K8-ByNYSV0lB_bsaTQf95JorIBrqvJXXc7Y0GRa2r8yEmuoZ2gZX')"></div>
        <div>
        <h4 class="font-bold uppercase tracking-tight">Elena Vance</h4>
        <p class="text-[10px] text-primary font-mono uppercase">VP Engineering @ Quantum Data</p>
        </div>
        </div>
        <p class="text-text-muted italic leading-relaxed">
                                    "A rare talent that understands both the macro infrastructure and the micro-optimizations. The deployment pipelines built for us are flawless and fully automated."
                                </p>
        </div>
        </div>
        </div>
        </section>
        <!-- Section 06: Initiate Handshake (Contact) -->
        <section class="py-24 max-w-7xl mx-auto px-6" id="handshake">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
        <div>
        <h2 class="text-6xl font-bold uppercase tracking-tighter italic mb-8">
                                Initiate <span class="text-primary">Handshake</span>
        </h2>
        <p class="text-text-muted text-lg mb-10 leading-relaxed max-w-md">
                                Ready to build something architecturally sound? Submit your project parameters to start the technical discovery phase.
                            </p>
        <div class="space-y-6">
        <div class="flex items-center gap-6 group">
        <div class="size-12 rounded bg-primary/10 border border-primary/30 flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all">
        <span class="material-symbols-outlined">terminal</span>
        </div>
        <div>
        <p class="text-[10px] text-text-muted uppercase tracking-widest font-bold">Terminal_Access</p>
        <p class="font-mono text-primary">architect@dev-null.io</p>
        </div>
        </div>
        <div class="flex items-center gap-6 group">
        <div class="size-12 rounded bg-primary/10 border border-primary/30 flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all">
        <span class="material-symbols-outlined">hub</span>
        </div>
        <div>
        <p class="text-[10px] text-text-muted uppercase tracking-widest font-bold">Encrypted_Comm</p>
        <p class="font-mono text-primary">+1 (555) 0128-ARCH</p>
        </div>
        </div>
        </div>
        </div>
        <div class="bg-white/5 border border-border-muted p-10 rounded-2xl relative">
        <div class="absolute top-0 right-10 -translate-y-1/2 px-4 py-1 bg-primary text-white text-[10px] font-bold uppercase tracking-widest rounded">
                                Form_ID: 0xFF-24
                            </div>
        <form class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
        <label class="text-[10px] font-bold text-text-muted uppercase tracking-widest font-mono">CLIENT_ID</label>
        <input class="w-full bg-background-dark border border-border-muted rounded-lg px-4 py-3 focus:border-primary focus:ring-0 text-sm font-mono transition-colors" placeholder="Your Name" type="text"/>
        </div>
        <div class="space-y-2">
        <label class="text-[10px] font-bold text-text-muted uppercase tracking-widest font-mono">COMM_CHANNEL</label>
        <input class="w-full bg-background-dark border border-border-muted rounded-lg px-4 py-3 focus:border-primary focus:ring-0 text-sm font-mono transition-colors" placeholder="email@address.com" type="email"/>
        </div>
        </div>
        <div class="space-y-2">
        <label class="text-[10px] font-bold text-text-muted uppercase tracking-widest font-mono">PROJECT_SCOPE</label>
        <select class="w-full bg-background-dark border border-border-muted rounded-lg px-4 py-3 focus:border-primary focus:ring-0 text-sm font-mono transition-colors">
        <option>System Architecture</option>
        <option>Cloud Infrastructure</option>
        <option>API Development</option>
        <option>Full-Stack Project</option>
        </select>
        </div>
        <div class="space-y-2">
        <label class="text-[10px] font-bold text-text-muted uppercase tracking-widest font-mono">SPECIFICATIONS_BUFFER</label>
        <textarea class="w-full bg-background-dark border border-border-muted rounded-lg px-4 py-3 focus:border-primary focus:ring-0 text-sm font-mono transition-colors resize-none" placeholder="Brief project overview..." rows="4"></textarea>
        </div>
        <button class="w-full py-4 bg-primary text-white rounded-lg font-bold uppercase tracking-[0.2em] hover:bg-blue-600 transition-all flex items-center justify-center gap-3" type="submit">
        <span class="material-symbols-outlined text-sm">send</span>
            Transmit_Data
        </button>
        </form>
        </div>
        </div>
        </section>
    </main>
</template>