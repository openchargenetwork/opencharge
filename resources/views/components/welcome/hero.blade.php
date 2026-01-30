<section id="hero" class="relative pt-24 pb-20 lg:pt-32 lg:pb-32 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-grid-pattern"></div>

    <!-- Floating Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
        <!-- Floating circles -->
        <div
            class="absolute top-20 left-[10%] size-64 rounded-full bg-blue-500/10 dark:bg-blue-400/10 blur-3xl animate-float">
        </div>
        <div
            class="absolute top-40 right-[15%] size-48 rounded-full bg-purple-500/10 dark:bg-purple-400/10 blur-3xl animate-float-delayed">
        </div>
        <div
            class="absolute bottom-20 left-[20%] size-56 rounded-full bg-cyan-500/10 dark:bg-cyan-400/10 blur-3xl animate-float">
        </div>

        <!-- Floating geometric shapes -->
        <div class="hidden lg:block absolute top-32 left-[8%] animate-float">
            <div
                class="size-16 rounded-2xl bg-linear-to-br from-blue-500/20 to-purple-500/20 dark:from-blue-400/20 dark:to-purple-400/20 backdrop-blur-sm border border-white/20 dark:border-white/10 rotate-12">
            </div>
        </div>
        <div class="hidden lg:block absolute top-48 right-[12%] animate-float-delayed">
            <div
                class="size-12 rounded-xl bg-linear-to-br from-purple-500/20 to-pink-500/20 dark:from-purple-400/20 dark:to-pink-400/20 backdrop-blur-sm border border-white/20 dark:border-white/10 -rotate-12">
            </div>
        </div>
        <div class="hidden lg:block absolute bottom-32 right-[18%] animate-float">
            <div
                class="size-20 rounded-2xl bg-linear-to-br from-cyan-500/20 to-blue-500/20 dark:from-cyan-400/20 dark:to-blue-400/20 backdrop-blur-sm border border-white/20 dark:border-white/10 rotate-6">
            </div>
        </div>
        <div class="hidden lg:block absolute bottom-40 left-[15%] animate-float-delayed">
            <div
                class="size-14 rounded-full bg-linear-to-br from-green-500/20 to-emerald-500/20 dark:from-green-400/20 dark:to-emerald-400/20 backdrop-blur-sm border border-white/20 dark:border-white/10">
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Badge -->
            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-medium mb-6">
                <span class="relative flex size-2">
                    <span
                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-500 opacity-75"></span>
                    <span class="relative inline-flex size-2 rounded-full bg-blue-600"></span>
                </span>
                Open Payments Protocol
            </div>

            <!-- Headline -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                <span class="text-gradient">One Protocol.</span> Any Wallet.<br />Verifiable Settlement.
            </h1>

            <!-- Subheadline -->
            <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400 mb-8 max-w-2xl mx-auto leading-relaxed">
               Its like HTTP for the web, but for payments. It doesn’t move money; it standardizes how payment systems talk about moving money.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <flux:button variant="primary" href="{{ route('register') }}" class="text-base px-8 py-3">
                   <x-phosphor-github-logo class=" -ml-1 size-4" /> Build on OpenCharge
                </flux:button>
                <flux:button variant="ghost" href="#how-it-works" class="text-base px-8 py-3">
                    Documentation
                </flux:button>
            </div>

            <!-- Hero Visual: Simplified Payment Flow -->
            <div class="relative max-w-3xl mx-auto">
                <div class="flex items-center justify-center gap-4 md:gap-8 flex-wrap md:flex-nowrap">
                    <!-- Payment Apps -->
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex -space-x-3">
                            <div
                                class="size-12 rounded-full bg-yellow-100 dark:bg-yellow-900/50 border-2 border-white dark:border-zinc-800 flex items-center justify-center shadow-lg">
                                <span class="text-lg">💳</span>
                            </div>
                            <div
                                class="size-12 rounded-full bg-green-100 dark:bg-green-900/50 border-2 border-white dark:border-zinc-800 flex items-center justify-center shadow-lg">
                                <span class="text-lg">📱</span>
                            </div>
                            <div
                                class="size-12 rounded-full bg-blue-100 dark:bg-blue-900/50 border-2 border-white dark:border-zinc-800 flex items-center justify-center shadow-lg">
                                <span class="text-lg">💰</span>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400 font-medium">Any Payment App</span>
                    </div>

                    <!-- Arrow -->
                    <div class="hidden md:flex items-center">
                        <svg class="size-8 text-zinc-300 dark:text-zinc-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>

                    <!-- OpenCharge Hub -->
                    <div class="flex flex-col items-center gap-2">
                        <div
                            class="size-16 rounded-2xl bg-linear-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-xl animate-pulse-glow">
                            <svg class="size-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400 font-medium">OpenCharge</span>
                    </div>

                    <!-- Arrow -->
                    <div class="hidden md:flex items-center">
                        <svg class="size-8 text-zinc-300 dark:text-zinc-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>

                    <!-- Merchants -->
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex -space-x-3">
                            <div
                                class="size-12 rounded-full bg-purple-100 dark:bg-purple-900/50 border-2 border-white dark:border-zinc-800 flex items-center justify-center shadow-lg">
                                <span class="text-lg">⚡</span>
                            </div>
                            <div
                                class="size-12 rounded-full bg-orange-100 dark:bg-orange-900/50 border-2 border-white dark:border-zinc-800 flex items-center justify-center shadow-lg">
                                <span class="text-lg">🏪</span>
                            </div>
                            <div
                                class="size-12 rounded-full bg-pink-100 dark:bg-pink-900/50 border-2 border-white dark:border-zinc-800 flex items-center justify-center shadow-lg">
                                <span class="text-lg">🌐</span>
                            </div>
                        </div>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400 font-medium">Any Merchant</span>
                    </div>
                </div>

                <!-- Trust Badge -->
                <div class="mt-8 flex items-center justify-center gap-6 text-sm text-zinc-500 dark:text-zinc-400">
                    <div class="flex items-center gap-2">
                        <svg class="size-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span>Verifiable Settlement</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="size-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Cross-Border Ready</span>
                    </div>
                    <div class="hidden sm:flex items-center gap-2">
                        <svg class="size-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span>No Vendor Lock-in</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
