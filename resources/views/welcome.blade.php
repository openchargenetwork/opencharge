<x-layouts::app>
    <!-- Section 1: Hero -->
    <x-welcome.hero />

    <!-- Section 2: Problem -->
    <x-welcome.problem />

    <!-- Section 3: Solution -->
    <x-welcome.solution />

    <!-- Section 4: How It Works -->
    <x-welcome.how-it-works />

    <!-- Section 5: Use Cases -->
    <x-welcome.use-cases />

    <!-- Section 6: Cross-Border (Interactive) -->
    <x-welcome.cross-border />

    <!-- Section 7: Why Blockchain -->
    <x-welcome.why-blockchain />

    <!-- Section 8: CTA -->
    <section id="cta" class="py-16 lg:py-24 bg-linear-to-br from-blue-600 to-purple-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Join the Network?</h2>
            <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                Enable your users to pay or accept payments from any service provider today. One integration, unlimited
                possibilities.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <flux:button href="{{ route('register') }}"
                    class="bg-white text-blue-600 hover:bg-blue-50 text-base px-8 py-3">
                    Join the Network
                </flux:button>
                <flux:button variant="ghost" href="#how-it-works"
                    class="text-white border-white hover:bg-white/10 text-base px-8 py-3">
                    Learn More
                </flux:button>
            </div>
        </div>
    </section>
</x-layouts::app>
