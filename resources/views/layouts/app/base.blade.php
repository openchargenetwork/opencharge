<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    @include('partials.head')
    <title>OpenCharge Network - Open Payment Protocol</title>
</head>
<body class="min-h-screen bg-zinc-100 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

    <!-- Sticky Navigation -->
    <nav
        x-data="{ mobileMenuOpen: false, scrolled: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
        :class="scrolled ? 'bg-white/90 dark:bg-zinc-950/90 shadow-sm border-zinc-200 dark:border-zinc-800' : 'bg-transparent border-transparent'"
        class="fixed top-0 inset-x-0 z-50 backdrop-blur-md border-b transition-all duration-300"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="size-8 rounded-lg bg-linear-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <svg class="size-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="font-semibold text-lg group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">OpenCharge</span>
                </a>

                <!-- Desktop Nav Links -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="/#problem" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">Problem</a>
                    <a href="/#how-it-works" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">How It Works</a>
                    <a href="/#use-cases" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">Use Cases</a>
                    <a href="{{ route('ecosystem.index') }}" class="px-3 py-2 text-sm font-medium @if(request()->routeIs('ecosystem.*')) text-blue-600 dark:text-blue-400 hover:text-blue-900 @else text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 @endif
                     dark:hover:text-blue-100 transition-colors">Eco system</a>
                    <a rel="no-follow"  target="_blank" href="https://docs.opencharge.network" class="px-3 py-2 text-sm text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-100 transition-colors font-semibold">Documentation</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                             <x-desktop-user-menu />
                        @else
                            <flux:button variant="ghost" href="{{ route('login') }}" class="hidden sm:inline-flex">Log in</flux:button>
                            @if (Route::has('register'))
                                <flux:button variant="primary" href="{{ route('register') }}">Get Started</flux:button>
                            @endif
                        @endauth
                    @endif

                    <!-- Mobile Menu Button -->
                    <button
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="md:hidden p-2 text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100"
                    >
                        <svg x-show="!mobileMenuOpen" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div
                x-show="mobileMenuOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                x-cloak
                class="md:hidden pb-4 border-t border-zinc-200 dark:border-zinc-800"
            >
                <div class="flex flex-col gap-1 pt-4">
                    <a href="#problem" @click="mobileMenuOpen = false" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">Problem</a>
                    <a href="#solution" @click="mobileMenuOpen = false" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">Solution</a>
                    <a href="#how-it-works" @click="mobileMenuOpen = false" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">How It Works</a>
                    <a href="#use-cases" @click="mobileMenuOpen = false" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">Use Cases</a>
                    <a href="#cross-border" @click="mobileMenuOpen = false" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg">Cross-Border</a>
                    @guest
                        <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium text-zinc-600 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-lg sm:hidden">Log in</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t border-zinc-200 dark:border-zinc-800 py-12 bg-white dark:bg-zinc-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="size-8 rounded-lg bg-linear-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <svg class="size-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="font-semibold">OpenCharge Network</span>
                </div>
                <div class="flex items-center gap-6 text-sm text-zinc-600 dark:text-zinc-400">
                    <a href="https://docs.opencharge.network" class="hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">Documentation</a>
                    <a href="https://github.com/openchargenetwork" class="hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">GitHub</a>
                    <a href="https://discord.gg/opencharge" class="hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors">Discord</a>
                </div>
                <p class="text-sm text-zinc-500">
                    &copy; {{ date('Y') }} OpenCharge Network. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    @fluxScripts
</body>
</html>
