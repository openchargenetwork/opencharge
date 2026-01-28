<section id="solution" class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true" class="text-center mb-12 lg:mb-16">
            <h2 :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-3xl md:text-4xl font-bold mb-4 transition-all duration-700">
                The Solution
            </h2>
            <p :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto transition-all duration-700 delay-100">
                OpenCharge Network: An open protocol for payment interoperability.
            </p>
        </div>

        <!-- Hub and Spoke Visual -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true" class="relative mb-16">
            <!-- Central Hub -->
            <div class="flex justify-center mb-8">
                <div :class="visible ? 'opacity-100 scale-100' : 'opacity-0 scale-75'"
                    class="relative transition-all duration-700">
                    <div
                        class="size-32 md:size-40 rounded-3xl bg-linear-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-2xl animate-pulse-glow">
                        <div class="text-center text-white">
                            <svg class="size-12 md:size-16 mx-auto mb-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span class="text-sm md:text-base font-semibold">OpenCharge</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Spoke Items -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Spoke 1: Single API -->
                <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="text-center p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 hover:shadow-lg hover:border-blue-200 dark:hover:border-blue-800">
                    <div
                        class="size-14 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mx-auto mb-4">
                        <svg class="size-7 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Single Integration</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">One protocol routes dozens of payment providers
                        integrations.</p>
                </div>

                <!-- Spoke 2: Any Wallet -->
                <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="text-center p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 delay-100 hover:shadow-lg hover:border-green-200 dark:hover:border-green-800">
                    <div
                        class="size-14 rounded-xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center mx-auto mb-4">
                        <svg class="size-7 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Any Wallet Works</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Users pay with their preferred app. No more "we
                        don't accept that."</p>
                </div>

                <!-- Spoke 3: Trustless -->
                <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="text-center p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 delay-200 hover:shadow-lg hover:border-purple-200 dark:hover:border-purple-800">
                    <div
                        class="size-14 rounded-xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mx-auto mb-4">
                        <svg class="size-7 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Verifiable Settlement</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Payments can be verified off-chain, regardless of
                        the payment app used.</p>
                </div>

                <!-- Spoke 4: DAO Governed -->
                <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="text-center p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 delay-300 hover:shadow-lg hover:border-cyan-200 dark:hover:border-cyan-800">
                    <div
                        class="size-14 rounded-xl bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mx-auto mb-4">
                        <svg class="size-7 text-cyan-600 dark:text-cyan-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">DAO Governed</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Protocol upgrades decided by stakeholders, not a
                        single company.</p>
                </div>
            </div>
        </div>

        <!-- Before/After Comparison -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true"
            class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Before -->
            <div :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-8'"
                class="p-6 bg-red-50 dark:bg-red-900/10 rounded-2xl border border-red-200 dark:border-red-800/30 transition-all duration-700">
                <div class="flex items-center gap-3 mb-4">
                    <div class="size-10 rounded-full bg-red-100 dark:bg-red-900/50 flex items-center justify-center">
                        <svg class="size-5 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-red-900 dark:text-red-100">Today</h3>
                </div>
                <ul class="space-y-3 text-sm text-red-800 dark:text-red-200">
                    <li class="flex items-start gap-2">
                        <span class="mt-1.5 size-1.5 rounded-full bg-red-400 shrink-0"></span>
                        <span>Integrate with all 5-10 payment APIs separately</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1.5 size-1.5 rounded-full bg-red-400 shrink-0"></span>
                        <span>Negotiate with each provider individually</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1.5 size-1.5 rounded-full bg-red-400 shrink-0"></span>
                        <span>Users rejected if their wallet isn't supported</span>
                    </li>
                </ul>
            </div>

            <!-- After -->
            <div :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-8'"
                class="p-6 bg-green-50 dark:bg-green-900/10 rounded-2xl border border-green-200 dark:border-green-800/30 transition-all duration-700 delay-200">
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="size-10 rounded-full bg-green-100 dark:bg-green-900/50 flex items-center justify-center">
                        <svg class="size-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg text-green-900 dark:text-green-100">With OpenCharge</h3>
                </div>
                <ul class="space-y-3 text-sm text-green-800 dark:text-green-200">
                    <li class="flex items-start gap-2">
                        <span class="mt-1.5 size-1.5 rounded-full bg-green-400 shrink-0"></span>
                        <span>One integration accepts all compliant apps</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1.5 size-1.5 rounded-full bg-green-400 shrink-0"></span>
                        <span>Join the network permissionlessly</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1.5 size-1.5 rounded-full bg-green-400 shrink-0"></span>
                        <span>Any OpenCharge compliant app works everywhere</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
