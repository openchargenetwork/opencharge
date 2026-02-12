
import { createAppKit } from '@reown/appkit';
import { EthersAdapter } from '@reown/appkit-adapter-ethers';
import {
    createSIWEConfig,
    formatMessage
} from '@reown/appkit-siwe';
import { bsc, sepolia } from '@reown/appkit/networks';
import { ethers } from 'ethers';
// Initialize SIWE with the provided configuration
export const createSiwe = () => {
    const metadata = {
        name: 'Opencharge Network',
        description: 'An open protocol for payment interoperability',
        url: 'http://localhost', // origin must match your domain & subdomain
        icons: ['https://violet-registered-wasp-238.mypinata.cloud/ipfs/bafkreidmgbkfprzbd2ovqw4hdwvtkj5awf2ws66jcl7mhr5jxr4qvjqhma']
    }

    window.initSiwe = (siweConfig, projectId) => {
        if (!siweConfig || !projectId) {
            console.error('Missing required SIWE configuration');
            return;
        }
        // Create the AppKit instance
        return createAppKit({
            adapters: [new EthersAdapter()],
            projectId,
            metadata: {
                ...metadata,
                url: siweConfig.uri,
            },
            networks: [bsc, sepolia],
            defaultNetwork: bsc,
            themeMode: siweConfig.theme ?? 'light',
            siweConfig: createSIWEConfig({
                getMessageParams: async () => ({
                    domain: siweConfig.domain,
                    uri: siweConfig.uri,
                    chains: [siweConfig.chainId],
                    statement: siweConfig.statement,
                    nonce: siweConfig.nonce,
                    version: siweConfig.version || '1'
                }),

                createMessage: ({ address, ...args }) => {
                    console.log(args, address);
                    return formatMessage(args, address)
                },
                // Use the provided verifyMessage function or default to a simple one
                verifyMessage: siweConfig.verifyMessage || (async () => true),
                // Basic nonce management
                getNonce: siweConfig.getNonce || (async () => siweConfig.nonce),
                getSession: async () => null, // We'll handle sessions on the server
                signOut: async () => true
            })
        });
    };
    window.initAppKit = (projectId, themeMode) => {
        if (!projectId) {
            console.error('Missing required AppKit configuration');
            return;
        }
        // Create the AppKit instance
        const appkit = createAppKit({
            adapters: [new EthersAdapter()],
            projectId,
            metadata,
            networks: [bsc, sepolia],
            defaultNetwork: bsc,
            themeMode: themeMode ?? 'light',
        });
        return [appkit, ethers, bsc, sepolia];
    };
}
// Initialize SIWE when the document is loaded
createSiwe();
