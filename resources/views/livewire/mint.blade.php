<?php

use Livewire\Component;
use App\Models\Ocid;

new class extends Component {
    public string $error = '';

    /**
     * Persist the minted OCID record after on-chain confirmation.
     */
    /**
     * @param array<int, string> $tags
     */
    public function createOcid(int $tokenId, string $endpoint = '', array $tags = [], bool $testnet = true): void
    {
        if (Ocid::where('token_id', (int) $tokenId)->exists()) {
            $this->error = 'Token ID ' . $tokenId . ' is already registered.';
            return;
        }

        Ocid::create([
            'token_id' => (int) $tokenId,
            'endpoint' => $endpoint,
            'tags' => $tags,
            'testnet' => $testnet,
        ]);
    }
}; ?>

<div class="max-w-140 mx-auto grid">
    <div class="flex flex-col w-full items-center gap-5">
        <div class="flex flex-col items-center gap-3">
            <h2 class="text-3xl">New OpenCharge ID</h2>
            <span class="text-zinc-400 text-xs">Mint the OpenCharge NFT to get a Token ID.</span>
        </div>
        <div x-data="{
            endpoint: '',
            selectedTags: [],
            network: 'testnet',
            isMinting: false,
            mintedTokenId: null,
            mintError: '',
            mintFee: null,
            mintFeeLoaded: false,
            mintFeeFormatted: null,
            contractAddress: '{{ config('evm.contract') }}',
            contractAbi: {{ \Illuminate\Support\Js::from(config('evm.abi')) }},
            nftBaseUrl: '{{ config('evm.nft_base_url') }}',
            init() {
                const { selectedNetworkId } = appKit.getState();
                const mchainId = selectedNetworkId.split(':')?.[0] ?? null
                const chainId = appKit.getChainId();
                this.network = mchainId === bsc.id || chainId === bsc.id ? 'mainnet' : 'testnet';
                const isConnected = appKit.getIsConnectedState();
                if (isConnected) this.loadFee();
                appKit.subscribeNetwork(({ chainId }) => {
                    this.network = chainId === bsc.id ? 'mainnet' : 'testnet';
                });
                appKit.subscribeAccount((state) => {
                    if (state.isConnected) {
                        this.loadFee();
                    } else {
                        this.mintFee = null;
                        this.mintFeeFormatted = null;
                    }
                });
            },
            async loadFee() {
                if (this.mintFeeLoaded) return;
                try {
                    const walletProvider = appKit.getWalletProvider();
                    if (!walletProvider) return;
                    const provider = new ethers.BrowserProvider(walletProvider);
                    const contract = new ethers.Contract(this.contractAddress, this.contractAbi, provider);
                    this.mintFee = await contract.mintFee();
                    this.mintFeeFormatted = ethers.formatEther(this.mintFee);
                    this.mintFeeLoaded = true;
                } catch (e) {
                    this.mintFeeLoaded = false;
                    console.error('Failed to load fee:', e);
                }
            },
            async switchToTestnet() {
                await appKit.switchNetwork(sepolia);
            },
            async switchToMainnet() {
                await appKit.switchNetwork(bsc);
            },
            async mint() {
                this.isMinting = true;
                this.mintError = '';
        
                try {
                    const targetChain = this.network === 'testnet' ? sepolia : bsc;
                    const { selectedNetworkId } = appKit.getState();
                    if (selectedNetworkId !== targetChain.id) {
                        await appKit.switchNetwork(targetChain);
                    }
                    const walletProvider = appKit.getWalletProvider();
                    const provider = new ethers.BrowserProvider(walletProvider);
                    const signer = await provider.getSigner();
                    const address = await signer.getAddress();
                    const contract = new ethers.Contract(this.contractAddress, this.contractAbi, signer);
        
                    const fee = this.mintFee ?? await contract.mintFee();
                    const tx = await contract.ocidMint(address, this.endpoint, { value: fee });
                    const receipt = await tx.wait();
        
                    const event = receipt.logs
                        .map(log => { try { return contract.interface.parseLog(log); } catch (e) { return null; } })
                        .find(e => e && e.name === 'OCIDMinted');
        
                    if (!event) {
                        this.mintError = 'Transaction succeeded but OCIDMinted event not found.';
                        return;
                    }
        
                    this.mintedTokenId = Number(event.args.tokenId);
                    await $wire.createOcid(this.mintedTokenId, this.endpoint, this.selectedTags, this.network === 'testnet');
        
                    if ($wire.error) {
                        this.mintedTokenId = null;
                    }
                } catch (e) {
                    console.error('Mint failed:', e);
        
                    if (e.code === 'ACTION_REJECTED' || e.code === 4001) {
                        this.mintError = 'Transaction rejected by wallet.';
                    } else if (e.code === 'INSUFFICIENT_FUNDS') {
                        this.mintError = 'Insufficient funds to cover the mint fee and gas costs.';
                    } else if (e.revert?.name === 'InsufficientPayment') {
                        this.mintError = 'Insufficient payment for minting.';
                    } else {
                        const msg = e.shortMessage || e.message || 'Minting failed.';
                        this.mintError = msg.length > 120 ? msg.substring(0, 120) + '…' : msg;
                    }
                } finally {
                    this.isMinting = false;
                }
            }
        }" class="flex bg-card rounded-xl p-5 sm:p-10 flex-col w-full gap-3">

            @if ($error)
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">{{ $error }}</div>
            @endif

            <div x-show="mintError" x-cloak class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                <span x-text="mintError"></span>
            </div>

            <div x-show="mintedTokenId" x-cloak
                class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded">
                OCID #<span x-text="mintedTokenId"></span> minted successfully!
                <a x-bind:href="'/ocids/' + mintedTokenId" class="underline ml-1">Update Your Info</a>
            </div>
            <div class="w-full mb-4">
                <label class="ml-3 text-sm font-medium text-foreground">Network</label>
                <div class="flex gap-2 mt-2">
                    <button type="button" @click="switchToTestnet()"
                        :class="network === 'testnet'
                            ?
                            'bg-primary text-primary-foreground shadow-sm hover:bg-primary/90' :
                            'border border-input bg-background shadow-xs hover:bg-accent hover:text-accent-foreground'"
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium rounded-md transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring cursor-pointer h-9 px-3 py-2 text-sm">Testnet</button>
                    <button type="button" @click="switchToMainnet()"
                        :class="network === 'mainnet'
                            ?
                            'bg-primary text-primary-foreground shadow-sm hover:bg-primary/90' :
                            'border border-input bg-background shadow-xs hover:bg-accent hover:text-accent-foreground'"
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium rounded-md transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring cursor-pointer h-9 px-3 py-2 text-sm">Mainnet</button>
                </div>
            </div>
            <div class="w-full  mb-4">
                <label class="ml-3 text-sm font-medium text-foreground">What does your service do?</label>
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach (\App\Enums\OcidTags::cases() as $tag)
                        <button type="button"
                            @click="selectedTags.includes('{{ $tag->value }}') ? selectedTags = selectedTags.filter(t => t !== '{{ $tag->value }}') : selectedTags.push('{{ $tag->value }}')"
                            :class="selectedTags.includes('{{ $tag->value }}') ?
                                'bg-primary text-primary-foreground shadow-sm hover:bg-primary/90' :
                                'border border-input bg-background shadow-xs hover:bg-accent hover:text-accent-foreground'"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium rounded-md transition-colors focus-visible:outline-hidden focus-visible:ring-1 focus-visible:ring-ring cursor-pointer h-9 px-3 py-2 text-sm">{{ $tag->label() }}</button>
                    @endforeach
                </div>
            </div>
            <div class="w-full  mb-4">
                <label class="ml-3 text-sm font-medium text-foreground">Provide your Api Endpoint</label>
                <input x-model="endpoint" placeholder="Your Api Endpoint" type="text"
                    class="mt-1 w-full text-sm text-foreground border border-muted rounded-lg bg-secondary focus:outline-hidden focus:border-primary px-4 py-2.5 h-10" />
            </div>

            <div class="flex mt-4 justify-end gap-8 items-center">
                <div x-show="mintFeeFormatted" x-cloak class="w-full text-sm text-muted-foreground text-right">
                    Network fee: <span x-text="mintFeeFormatted"></span> <span
                        x-text="network === 'testnet' ? 'ETH' : 'BNB'"></span>
                </div>
                <x-connect-wallet>
                    <div>
                        <x-button variant="primary" @click="mint()" ::disabled="isMinting || !endpoint">
                            <svg x-show="isMinting" class="animate-spin h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span x-text="isMinting ? 'Minting...' : 'Mint OCID NFT'"></span>
                        </x-button>
                    </div>
                </x-connect-wallet>
            </div>
        </div>
    </div>
</div>
