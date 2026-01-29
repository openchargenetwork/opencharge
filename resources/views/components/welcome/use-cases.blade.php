<section id="use-cases" class="py-16 lg:py-24 bg-linear-to-b from-white to-50% to-zinc-50 dark:from-zinc-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true" class="mb-12 lg:mb-16">
            <h2 :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-3xl md:text-4xl font-bold mb-4 transition-all duration-700">
                Edge Use Cases are baked in
            </h2>
            <p :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl  transition-all duration-700 delay-100">
                Anywhere a merchant needs to accept auto-payments from diverse sources.
            </p>
             <p :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                class="text-lg text-amber-600 dark:text-zinc-400 max-w-2xl  transition-all duration-700 delay-100">
                Why go to the extreme?
            </p>
            <div class="text-zinc-600 max-w-2xl dark:text-zinc-400">
                <span class="font-semibold text-zinc-900 dark:text-zinc-100">Automated systems are the hardest hit</span> 
                <ul>
                    <li class="ml-4 list-disc"> — they can't fall back on cash or manual workarounds.</li>
                    <li class="ml-4 list-disc"> — Integration cost is highest relative to revenue</li>
                    <li class="ml-4 list-disc"> — Clear ROI: "plug in and start earning" vs. "hire a dev team"</li>
                    <li class="ml-4 list-disc"> — Hardware manufacturers are motivated partners</li>
                </ul>
                    
            </div>
        </div>

        <!-- Use Cases Grid -->
        <div x-data="{ visible: false }" x-intersect:enter.half="visible = true"
            class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- EV Charging -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="group p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 hover:shadow-xl hover:-translate-y-2 hover:border-blue-300 dark:hover:border-blue-700">
                <div
                    class="size-14 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl">⚡</span>
                </div>
                <h3 class="font-semibold text-lg mb-2">EV Charging</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Charging stations that accept any payment app
                    without custom integrations.</p>
            </div>

            <!-- Power Bank Rentals -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="group p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-75 hover:shadow-xl hover:-translate-y-2 hover:border-green-300 dark:hover:border-green-700">
                <div
                    class="size-14 rounded-xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🔋</span>
                </div>
                <h3 class="font-semibold text-lg mb-2">Power Bank Rentals</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Rent and return portable chargers at any kiosk, from
                    any device manufacturer.</p>
            </div>

            <!-- Vending Machines -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="group p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-150 hover:shadow-xl hover:-translate-y-2 hover:border-orange-300 dark:hover:border-orange-700">
                <div
                    class="size-14 rounded-xl bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🥤</span>
                </div>
                <h3 class="font-semibold text-lg mb-2">Vending Machines</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Snacks, drinks, or products dispensed instantly with
                    universal payment.</p>
            </div>

            <!-- Parking -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="group p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-225 hover:shadow-xl hover:-translate-y-2 hover:border-purple-300 dark:hover:border-purple-700">
                <div
                    class="size-14 rounded-xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🅿️</span>
                </div>
                <h3 class="font-semibold text-lg mb-2">Parking</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Pay for parking with any wallet. No coins, no
                    proprietary apps needed.</p>
            </div>

            <!-- Physical Retail -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="group p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-300 hover:shadow-xl hover:-translate-y-2 hover:border-pink-300 dark:hover:border-pink-700">
                <div
                    class="size-14 rounded-xl bg-pink-100 dark:bg-pink-900/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🏪</span>
                </div>
                <h3 class="font-semibold text-lg mb-2">Physical Retail</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">POS terminals and QR payments at shops, restaurants,
                    and markets.</p>
            </div>

            <!-- E-commerce -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="group p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-375 hover:shadow-xl hover:-translate-y-2 hover:border-cyan-300 dark:hover:border-cyan-700">
                <div
                    class="size-14 rounded-xl bg-cyan-100 dark:bg-cyan-900/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🌐</span>
                </div>
                <h3 class="font-semibold text-lg mb-2">E-commerce</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Website checkout and subscription services accepting
                    any wallet globally.</p>
            </div>

            <!-- Laundry -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="group p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-450 hover:shadow-xl hover:-translate-y-2 hover:border-indigo-300 dark:hover:border-indigo-700">
                <div
                    class="size-14 rounded-xl bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🧺</span>
                </div>
                <h3 class="font-semibold text-lg mb-2">Laundry Machines</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Self-service laundromats with cashless, universal
                    payment options.</p>
            </div>

            <!-- WiFi/Connectivity -->
            <div :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="group p-6 bg-white dark:bg-zinc-800 rounded-xl  transition-all duration-500 delay-525 hover:shadow-xl hover:-translate-y-2 hover:border-teal-300 dark:hover:border-teal-700">
                <div
                    class="size-14 rounded-xl bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl">📶</span>
                </div>
                <h3 class="font-semibold text-lg mb-2">WiFi Hotspots</h3>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Pay-per-use internet access at hotels, cafes, and
                    public spaces.</p>
            </div>
        </div>
        
    </div>
</section>
