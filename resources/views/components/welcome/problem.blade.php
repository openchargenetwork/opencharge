<section id="problem" class="py-16 lg:py-24 bg-zinc-50 dark:bg-zinc-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header with scroll animation -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true" class="text-center mb-12 lg:mb-16">
            <h2 :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-3xl md:text-4xl font-bold mb-4 transition-all duration-700">
                The Problem
            </h2>
            <p :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto transition-all duration-700 delay-100">
                Payments are fragmented. Every api integration is a new silo.
            </p>
        </div>

        <!-- Problem Cards with staggered scroll animation -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true"
            class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Payment Silos -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:border-red-200 dark:hover:border-red-800">
                <div class="size-12 rounded-lg bg-zinc-100 dark:bg-zinc-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-zinc-600 dark:text-zinc-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Payment Silos</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Each payment provider requires separate integration,
                    approval, and maintenance.</p>
            </div>

            <!-- Card 2: Vendor Lock-in -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-100 hover:shadow-lg hover:-translate-y-1 hover:border-red-200 dark:hover:border-red-800">
                <div class="size-12 rounded-lg bg-zinc-100 dark:bg-zinc-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-zinc-600 dark:text-zinc-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Automated Vendor Hell</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Getting Automated vending machines to work across several jurisdictions is a nightmare
                    .</p>
            </div>

            <!-- Card 3: Border Barriers -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-200 hover:shadow-lg hover:-translate-y-1 hover:border-red-200 dark:hover:border-red-800">
                <div class="size-12 rounded-lg bg-zinc-100 dark:bg-zinc-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-zinc-600 dark:text-zinc-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Border Barriers</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Traders can't pay local vendors. Cross-border
                    settlements are complex and expensive.</p>
            </div>

            <!-- Card 4: Closed Systems -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-300 hover:shadow-lg hover:-translate-y-1 hover:border-red-200 dark:hover:border-red-800">
                <div class="size-12 rounded-lg bg-zinc-100 dark:bg-zinc-900/30 flex items-center justify-center mb-4">
                    <svg class="size-6 text-zinc-600 dark:text-zinc-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                </div>
                <h3 class="font-semibold text-lg mb-2">Closed Systems</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Users are locked out if they use the "wrong" wallet.
                    No interoperability.</p>
            </div>
        </div>
    </div>
</section>
