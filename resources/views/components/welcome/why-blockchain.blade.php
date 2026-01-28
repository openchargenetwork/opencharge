<section id="why-blockchain" class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true" class="text-center mb-12 lg:mb-16">
            <h2 :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-3xl md:text-4xl font-bold mb-4 transition-all duration-700">
                Opencharge USDC Router.
            </h2>
            <p :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto transition-all duration-700 delay-100">
                Trustless verification. Stable value. Permissionless access.
            </p> 
            <p :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto transition-all duration-700 delay-100">
                Powered by Opencharge Protocol.
            </p>
        </div>

        <!-- Features Grid -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true"
            class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <!-- Feature 1: On-chain Settlement -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 hover:shadow-lg">
                <div
                    class="size-12 rounded-xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">On-Chain Settlement</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Merchant apps verify payments directly on the
                    blockchain. No need to trust the payment app's word.</p>
            </div>

            <!-- Feature 2: Stablecoins -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 delay-100 hover:shadow-lg">
                <div class="size-12 rounded-xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">USDT/USDC Settlement</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Stable value — no crypto volatility for merchants.
                    Off-ramp to local currency when ready.</p>
            </div>

            <!-- Feature 3: Public Ledger -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 delay-200 hover:shadow-lg">
                <div class="size-12 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Public Ledger</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Any app can verify payments without privileged API
                    access. Transparency for all participants.</p>
            </div>

            <!-- Feature 4: Smart Contract Splits -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 delay-300 hover:shadow-lg">
                <div
                    class="size-12 rounded-xl bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-orange-600 dark:text-orange-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Automatic Splits</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Smart contracts handle revenue sharing between
                    platforms and merchants automatically.</p>
            </div>

            <!-- Feature 5: NFT Ownership -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 delay-400 hover:shadow-lg">
                <div class="size-12 rounded-xl bg-pink-100 dark:bg-pink-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-pink-600 dark:text-pink-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Honors OCID for devices</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Portable device identity. Transfer or sell devices /
                    Machines without having to update APIs.</p>
            </div>

            <!-- Feature 6: Permissionless -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 transition-all duration-500 delay-500 hover:shadow-lg">
                <div class="size-12 rounded-xl bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-cyan-600 dark:text-cyan-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Permissionless Router</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Anyone can implement as a merchant or payment app. No
                    gatekeepers, no volume requirements.</p>
            </div>
        </div>

        <!-- Trust & Security -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true"
            :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="p-8 bg-zinc-100 dark:bg-zinc-800/50 rounded-2xl transition-all duration-700">
            <h3 class="font-semibold text-xl mb-6 text-center">Trust & Security Mechanisms</h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="size-10 rounded-full bg-blue-500/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="size-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <p class="font-medium text-sm">Staking</p>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Slashable for bad behavior</p>
                </div>
                <div class="text-center">
                    <div class="size-10 rounded-full bg-yellow-500/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="size-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <p class="font-medium text-sm">Reputation</p>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">On-chain history builds trust</p>
                </div>
                <div class="text-center">
                    <div class="size-10 rounded-full bg-green-500/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="size-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <p class="font-medium text-sm">Certification</p>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Optional verification layer</p>
                </div>
                <div class="text-center">
                    <div class="size-10 rounded-full bg-purple-500/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="size-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <p class="font-medium text-sm">DAO Governance</p>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Community-driven protocol</p>
                </div>
            </div>
        </div>
    </div>
</section>
