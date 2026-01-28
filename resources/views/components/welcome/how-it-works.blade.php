<section id="how-it-works" class="py-16 lg:py-24 bg-zinc-50 dark:bg-zinc-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true" class="text-center mb-12 lg:mb-16">
            <h2 :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-3xl md:text-4xl font-bold mb-4 transition-all duration-700">
                How It Works
            </h2>
            <p :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto transition-all duration-700 delay-100">
                Simple example. Trustless settlement. Universal acceptance.
            </p>
        </div>

        <!-- Flow Diagram -->
        <div x-data="{ visible: false, activeStep: 0 }"
            x-intersect:enter.half="visible = true; $nextTick(() => { setInterval(() => { activeStep = (activeStep + 1) % 5 }, 2000) })"
            class="relative">
            <!-- Steps Grid -->
            <div class="grid md:grid-cols-4 gap-6 lg:gap-8 relative">
                <!-- Connecting Lines (desktop only) -->
                <div
                    class="hidden md:block absolute top-16 left-[12.5%] right-[12.5%] h-0.5 bg-zinc-200 dark:bg-zinc-700">
                    <div class="h-full bg-linear-to-r from-blue-500 to-purple-500 transition-all duration-1000"
                        :style="'width: ' + (activeStep * 33.33) + '%'"></div>
                </div>

                <!-- Step 1: User Initiates -->
                <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="relative text-center transition-all duration-500">
                    <div :class="activeStep >= 0 ? 'ring-4 ring-blue-500/30 scale-105' : ''"
                        class="size-32 mx-auto mb-4 rounded-2xl bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 flex items-center justify-center transition-all duration-300 shadow-lg">
                        <div class="text-center">
                            <div
                                class="size-14 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mx-auto mb-2">
                                <svg class="size-7 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">1</span>
                        </div>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">User Wants to pay</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Merchant publishes protocol config via nft metadata</p>
                </div>

                <!-- Step 2: App Collects -->
                <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="relative text-center transition-all duration-500 delay-100">
                    <div :class="activeStep >= 1 ? 'ring-4 ring-green-500/30 scale-105' : ''"
                        class="size-32 mx-auto mb-4 rounded-2xl bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 flex items-center justify-center transition-all duration-300 shadow-lg">
                        <div class="text-center">
                            <div
                                class="size-14 rounded-xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center mx-auto mb-2">
                                <svg class="size-7 text-green-600 dark:text-green-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-green-600 dark:text-green-400">2</span>
                        </div>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Users App makes Payment</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Payment app collects via local method (MoMo,
                        card, etc.)</p>
                </div>

                <!-- Step 3: On-chain Settlement -->
                <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="relative text-center transition-all duration-500 delay-200">
                    <div :class="activeStep >= 2 ? 'ring-4 ring-purple-500/30 scale-105' : ''"
                        class="size-32 mx-auto mb-4 rounded-2xl bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 flex items-center justify-center transition-all duration-300 shadow-lg">
                        <div class="text-center">
                            <div
                                class="size-14 rounded-xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mx-auto mb-2">
                                <svg class="size-7 text-purple-600 dark:text-purple-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-purple-600 dark:text-purple-400">3</span>
                        </div>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">On-Chain Settlement</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Users app settles USDT/USDC to the protocol smart
                        contract</p>
                </div>

                <!-- Step 4: Merchant Receives -->
                <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    class="relative text-center transition-all duration-500 delay-300">
                    <div :class="activeStep >= 3 ? 'ring-4 ring-cyan-500/30 scale-105' : ''"
                        class="size-32 mx-auto mb-4 rounded-2xl bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 flex items-center justify-center transition-all duration-300 shadow-lg">
                        <div class="text-center">
                            <div
                                class="size-14 rounded-xl bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mx-auto mb-2">
                                <svg class="size-7 text-cyan-600 dark:text-cyan-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-cyan-600 dark:text-cyan-400">4</span>
                        </div>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Merchant App verifies</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Merchant app verifies the payment on-chain, releases
                        goods/service</p>
                </div>
            </div>

            <!-- Key Principle -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="mt-12 p-6 bg-linear-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-2xl border border-blue-200 dark:border-blue-800/30 max-w-3xl mx-auto transition-all duration-700 delay-500">
                <div class="flex items-start gap-4">
                    <div
                        class="size-12 rounded-xl bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center shrink-0">
                        <svg class="size-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-lg mb-1 text-blue-900 dark:text-blue-100">Key Principle</h4>
                        <p class="text-blue-800 dark:text-blue-200">
                            The protocol decouples "who collects the money" from "who receives the money."
                            The merchant app never trusts the payment app. They trust the blockchain settlement. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
