<div x-data="{
        appKit: null,
        address: null,
        isConnected: false,
        isLoading: false,
        async init() {
            this.appKit = appKit;
            this.isConnected = this.appKit.getIsConnectedState();
            this.address = this.appKit.getAddress();
            // Subscribe to connection state changes
            this.appKit.subscribeState((state) => {
                this.isConnected = this.appKit.getIsConnectedState();
                this.address = this.appKit.getAddress();
            });
    
            // Listen for wallet-connected event from Livewire
            window.addEventListener('wallet-connected', (event) => {
                this.address = event.detail.address;
                this.isConnected = true;
            });
        },
        get shortAddress() {
            if (!this.address) return null;
            return this.address.slice(0, 6) + '...' + this.address.slice(-4);
        },
        async openWallet() {
            if (!this.appKit) return;
            this.isLoading = true;
            try {
                await this.appKit.open();
            } finally {
                this.isLoading = false;
            }
        }
    }" x-cloak>
        <div x-show="isConnected">
            {{ $slot }}
        </div>

        <x-button variant="secondary" x-show="!isConnected" type="button" x-on:click="openWallet"
            class="relative group w-full transition-colors flex items-center justify-center">
            <svg x-show="isLoading" class="animate-spin h-5 w-5 absolute left-5" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <x-lucide-wallet x-show="!isLoading" class="size-4 stroke-3" />
            <span>Connect Wallet</span>
        </x-button>
    </div>