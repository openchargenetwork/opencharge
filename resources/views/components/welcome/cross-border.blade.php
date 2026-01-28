<section id="cross-border" class="py-16 lg:py-24 bg-zinc-50 dark:bg-zinc-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true" class="text-center mb-12 lg:mb-16">
            <h2 :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-3xl md:text-4xl font-bold mb-4 transition-all duration-700">
                Borderless Payments are included
            </h2>
            <p :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto transition-all duration-700 delay-100">
                See how Joseph from NYC pays Mark in Kampala — via the USDC Router.
            </p>
        </div>

        <!-- Interactive Animation -->
        <div x-data="{
            step: 0,
            maxSteps: 5,
            autoPlay: true,
            interval: null,
            init() {
                this.startAutoPlay();
            },
            startAutoPlay() {
                this.interval = setInterval(() => {
                    if (this.autoPlay) {
                        this.step = (this.step + 1) % (this.maxSteps + 1);
                    }
                }, 2500);
            },
            pauseAutoPlay() {
                this.autoPlay = false;
            },
            resumeAutoPlay() {
                this.autoPlay = true;
            },
            goToStep(s) {
                this.pauseAutoPlay();
                this.step = s;
            },
            nextStep() {
                this.pauseAutoPlay();
                this.step = Math.min(this.step + 1, this.maxSteps);
            },
            prevStep() {
                this.pauseAutoPlay();
                this.step = Math.max(this.step - 1, 0);
            }
        }" @mouseenter="pauseAutoPlay()" @mouseleave="resumeAutoPlay()"
            class="bg-white dark:bg-zinc-800 rounded-2xl border border-zinc-200 dark:border-zinc-700 p-6 lg:p-10 shadow-lg">
            <!-- Step Indicators -->
            <div class="flex justify-center gap-2 mb-8">
                <template x-for="i in maxSteps + 1" :key="i">
                    <button @click="goToStep(i - 1)"
                        :class="step >= i - 1 ? 'bg-blue-500' : 'bg-zinc-300 dark:bg-zinc-600'"
                        class="size-3 rounded-full transition-all duration-300 hover:scale-125"></button>
                </template>
            </div>

            <!-- Animation Stage -->
            <div
                class="relative flex flex-col lg:flex-row items-center justify-between gap-8 lg:gap-4 max-w-4xl mx-auto mb-8">
                <!-- Joseph (USA) -->
                <div :class="step >= 0 ? 'opacity-100 scale-100' : 'opacity-50 scale-95'"
                    class="flex flex-col items-center transition-all duration-500">
                    <div :class="step === 1 ? 'ring-4 ring-blue-500/50 animate-pulse' : ''"
                        class="size-24 rounded-full bg-linear-to-br from-blue-400 to-blue-600 flex items-center justify-center text-4xl shadow-xl transition-all duration-300">
                        👨🏻‍💼
                    </div>
                    <div class="mt-3 text-center">
                        <p class="font-semibold">Joseph</p>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">New York, USA</p>
                        <p class="text-xs text-zinc-400 dark:text-zinc-500 mt-1">VendaPay User</p>
                    </div>
                </div>

                <!-- Flow Arrow & Payment App 1 -->
                <div class="flex flex-col lg:flex-row items-center gap-4">
                    <!-- VendaPay -->
                    <div :class="step >= 2 ? 'opacity-100 scale-100' : 'opacity-30 scale-90'"
                        class="flex flex-col items-center transition-all duration-500">
                        <div :class="step === 2 ? 'ring-4 ring-green-500/50 animate-pulse' : ''"
                            class="size-16 rounded-xl bg-green-500 flex items-center justify-center text-2xl shadow-lg transition-all duration-300">
                            📱
                        </div>
                        <p class="mt-2 text-xs font-medium text-green-600 dark:text-green-400">VendaPay</p>
                        <p class="text-xs text-zinc-400">Apple Pay</p>
                    </div>

                    <!-- Arrow -->
                    <div class="hidden lg:block">
                        <svg :class="step >= 2 ? 'text-green-500' : 'text-zinc-300 dark:text-zinc-600'"
                            class="size-8 transition-colors duration-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>

                <!-- Blockchain Center -->
                <div :class="step >= 3 ? 'opacity-100 scale-100' : 'opacity-30 scale-90'"
                    class="flex flex-col items-center transition-all duration-500">
                    <div :class="step === 3 ? 'animate-pulse-glow' : ''"
                        class="size-20 rounded-2xl bg-linear-to-br from-purple-500 to-blue-600 flex items-center justify-center shadow-xl transition-all duration-300">
                        <svg class="size-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <p class="mt-2 text-xs font-medium text-purple-600 dark:text-purple-400">Blockchain</p>
                    <p x-show="step >= 3" x-transition class="text-xs text-green-500 font-medium">
                        $18 USDC
                    </p>
                </div>

                <!-- Flow Arrow & Payment App 2 -->
                <div class="flex flex-col lg:flex-row items-center gap-4">
                    <!-- Arrow -->
                    <div class="hidden lg:block">
                        <svg :class="step >= 4 ? 'text-orange-500' : 'text-zinc-300 dark:text-zinc-600'"
                            class="size-8 transition-colors duration-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>

                    <!-- QrPay -->
                    <div :class="step >= 4 ? 'opacity-100 scale-100' : 'opacity-30 scale-90'"
                        class="flex flex-col items-center transition-all duration-500">
                        <div :class="step === 4 ? 'ring-4 ring-orange-500/50 animate-pulse' : ''"
                            class="size-16 rounded-xl bg-orange-500 flex items-center justify-center text-2xl shadow-lg transition-all duration-300">
                            📲
                        </div>
                        <p class="mt-2 text-xs font-medium text-orange-600 dark:text-orange-400">QrPay</p>
                        <p class="text-xs text-zinc-400">MTN MoMo</p>
                    </div>
                </div>

                <!-- Mark (Uganda) -->
                <div :class="step >= 5 ? 'opacity-100 scale-100' : 'opacity-50 scale-95'"
                    class="flex flex-col items-center transition-all duration-500">
                    <div :class="step === 5 ? 'ring-4 ring-green-500/50' : ''"
                        class="size-24 rounded-full bg-linear-to-br from-orange-400 to-orange-600 flex items-center justify-center text-4xl shadow-xl transition-all duration-300">
                        👨🏿‍🔧
                    </div>
                    <div class="mt-3 text-center">
                        <p class="font-semibold">Mark</p>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">Kampala, Uganda</p>
                        <p class="text-xs text-zinc-400 dark:text-zinc-500 mt-1">EV Station Owner</p>
                    </div>
                </div>
            </div>

            <!-- Step Description -->
            <div class="text-center h-20 flex items-center justify-center">
                <div x-show="step === 0" x-transition.opacity class="absolute">
                    <p class="text-lg font-medium text-zinc-700 dark:text-zinc-300">Mark creates an OpenCharge payment
                        config</p>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Simple QR code displayed at his EV charging
                        station</p>
                </div>
                <div x-show="step === 1" x-transition.opacity class="absolute">
                    <p class="text-lg font-medium text-zinc-700 dark:text-zinc-300">Joseph scans with VendaPay (US
                        wallet app)</p>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">The app reads the config: "Pay $18 to this
                        address"</p>
                </div>
                <div x-show="step === 2" x-transition.opacity class="absolute">
                    <p class="text-lg font-medium text-zinc-700 dark:text-zinc-300">Joseph confirms via Apple Pay</p>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">VendaPay collects $18 using Joseph's linked card
                    </p>
                </div>
                <div x-show="step === 3" x-transition.opacity class="absolute">
                    <p class="text-lg font-medium text-zinc-700 dark:text-zinc-300">VendaPay settles on-chain</p>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">$18 equivalent in USDC transferred to protocol
                        contract</p>
                </div>
                <div x-show="step === 4" x-transition.opacity class="absolute">
                    <p class="text-lg font-medium text-zinc-700 dark:text-zinc-300">Mark's app sees the on-chain event
                    </p>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">QrPay confirms payment, ready for withdrawal</p>
                </div>
                <div x-show="step === 5" x-transition.opacity class="absolute">
                    <p class="text-lg font-medium text-green-600 dark:text-green-400">Payment Complete!</p>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Mark withdraws to MTN MoMo. No shared bank, app,
                        or country needed.</p>
                </div>
            </div>

            <!-- Controls -->
            <div class="flex justify-center items-center gap-4 mt-6">
                <flux:button @click="prevStep()" variant="ghost" ::disabled="step === 0">
                    <svg class="size-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Previous
                </flux:button>
                <flux:button @click="nextStep()" variant="primary" ::disabled="step === maxSteps">
                    Next
                    <svg class="size-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </flux:button>
            </div>

            <!-- Auto-play indicator -->
            <div class="text-center mt-4">
                <p class="text-xs text-zinc-400 dark:text-zinc-500">
                    <span x-show="autoPlay">Auto-playing</span>
                    <span x-show="!autoPlay">Paused</span>
                    • Hover to pause
                </p>
            </div>
        </div>
    </div>
</section>
