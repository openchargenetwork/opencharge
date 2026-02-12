<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body x-data="{
    mobileMenuOpen: false,
    appKit: null,
    ethers: null,
    bsc: null,
    sepolia: null,
    async init() {
        const [appKit, ethers, bsc, sepolia] = window.initAppKit('{{ config('evm.projectId', '') }}', '{{ session('theme', 'light') }}');
        this.appKit = appKit;
        this.ethers = ethers;
        window.appKit = appKit;
        this.bsc = bsc;
        this.sepolia = sepolia;
    }
}" class="w-screen overflow-x-hidden">
    <div class="bg-amber-500/90 text-amber-950 text-center text-sm font-semibold py-1.5 px-4">
        This API specification is currently still in <strong>Testnet beta</strong> — endpoints and responses may change without notice.
    </div>
    <header class="bg-background sticky top-0 z-50 transition-colors border-muted-foreground/30">
        <div class="mx-auto w-full max-w-7xl pt-3 pb-3 px-4 sm:px-5 lg:px-6 flex items-center gap-2 md:gap-3 h-18">
            <div class="flex items-center gap-3 shrink-0">
                <a class="text-xl font-bold hover:opacity-80 shrink-0" href="/">
                    <x-app-logo class="h-6.25 w-auto" />
                </a>
            </div>
            <div class="flex flex-1 max-w-140 transition-opacity duration-300 opacity-100">
                <livewire:ocid-search />
            </div>
            <div class="flex items-center ml-auto justify-end gap-4 md:gap-3 shrink-0">
                <div class="hidden md:flex items-center gap-3">
                    <a wire:navigate
                        class="inline-flex items-center justify-center gap-1 whitespace-nowrap rounded-md text-sm font-medium focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 h-9 px-3 py-2 transition-colors hover:bg-secondary"
                        href="/ecosystem">Ecosystem</a>

                    <a target="_blank"
                        class="inline-flex items-center justify-center gap-1 whitespace-nowrap rounded-md text-sm font-medium focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 h-9 px-3 py-2 transition-colors hover:bg-secondary"
                        href="https://docs.opencharge.network">Docs</a>

                </div>
                <div class="hidden md:flex items-center justify-center shrink-0 w-16 h-9">
                    <a wire:navigate
                        class="inline-flex items-center justify-center gap-1 whitespace-nowrap rounded-md text-sm font-medium focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 h-9 px-3 py-2 transition-colors hover:bg-secondary"
                        href="/create-ocid">Publish</a>
                </div>
                <x-connect-wallet class=" ml-8">
                    <x-button variant="secondary" x-on:click="appKit.open()">
                        <span x-text="shortAddress"></span>
                    </x-button>
                </x-connect-wallet>
                <button @click="mobileMenuOpen = true" class="md:hidden p-2 rounded-md hover:bg-secondary shrink-0">
                    <x-lucide-menu class="size-6" />
                </button>
            </div>
        </div>
    </header>
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak class="md:hidden fixed inset-0 z-50 bg-background overflow-hidden">
        <div class="flex flex-col h-full w-full max-w-full overflow-hidden">
            <div class="flex items-center justify-between pt-3 pb-3 px-4 border-b shrink-0">
                <div class="flex items-center gap-3">
                    <a class="text-xl font-bold hover:opacity-80 shrink-0 ml-2" href="/">
                        <x-logo-icon class="h-6.25 w-auto" />
                    </a>
                </div>
                <button @click="mobileMenuOpen = false" class="p-2 rounded-md hover:bg-secondary shrink-0">
                    <x-lucide-x class="size-6" />
                </button>
            </div>
            <div
                class="flex-1 flex flex-col items-center justify-center p-4 space-y-4 overflow-y-auto overflow-x-hidden w-full">
                <a wire:navigate @click="mobileMenuOpen = false"
                    class="flex items-center justify-center gap-2 px-6 py-4 rounded-md hover:bg-secondary text-2xl font-medium w-full max-w-sm"
                    href="/ecosystem">Ecosystem</a>
                <a wire:navigate @click="mobileMenuOpen = false"
                    class="flex items-center justify-center gap-2 px-6 py-4 rounded-md hover:bg-secondary text-2xl font-medium w-full max-w-sm"
                    href="/create-ocid">Publish</a>
                <a class="flex items-center justify-center gap-2 px-6 py-4 rounded-md hover:bg-secondary text-2xl font-medium w-full max-w-sm"
                    href="https://docs.opencharge.network" target="_blank">Docs</a>
            </div>
        </div>
    </div>
    <main class="flex-1 bg-background">
        {{ $slot }}
    </main>
    <x-footer />
    @livewireScripts
    @fluxScripts
</body>

</html>
