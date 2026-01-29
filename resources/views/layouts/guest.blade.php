<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <title>{{ $title ?? 'OpenCharge Network' }}</title>
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 antialiased">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50 border-b border-zinc-200 bg-white/90 backdrop-blur-md dark:border-zinc-800 dark:bg-zinc-900/90">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <a href="{{ route('home') }}" class="group flex items-center gap-2">
                        <div class="flex size-8 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500 to-purple-600">
                            <svg class="size-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-lg font-semibold transition-colors group-hover:text-blue-600 dark:group-hover:text-blue-400">OpenCharge</span>
                    </a>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('ecosystem.index') }}" class="text-sm font-medium text-zinc-600 transition-colors hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100 {{ request()->routeIs('ecosystem.*') ? '!text-blue-600 dark:!text-blue-400' : '' }}">
                            Ecosystem
                        </a>

                        @auth
                            <flux:button variant="primary" href="{{ route('dashboard') }}" size="sm">Dashboard</flux:button>
                        @else
                            <flux:button variant="ghost" href="{{ route('login') }}" size="sm">Log in</flux:button>
                            @if (Route::has('register'))
                                <flux:button variant="primary" href="{{ route('register') }}" size="sm">Get Started</flux:button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="border-t border-zinc-200 bg-white py-8 dark:border-zinc-800 dark:bg-zinc-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                    <div class="flex items-center gap-2">
                        <div class="flex size-6 items-center justify-center rounded bg-gradient-to-br from-blue-500 to-purple-600">
                            <svg class="size-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium">OpenCharge Network</span>
                    </div>
                    <p class="text-sm text-zinc-500">&copy; {{ date('Y') }} OpenCharge Network</p>
                </div>
            </div>
        </footer>

        @fluxScripts
    </body>
</html>
