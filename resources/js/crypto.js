/**
 * Cryptographic utilities for OCID metadata signing
 * Uses @noble/secp256k1 for key generation and signing
 * @lowerdeck/canonicalize for consistent JSON serialization
 * @lowerdeck/hash for SHA-256 hashing
 */

import * as secp from '@noble/secp256k1';
import { canonicalize } from '@lowerdeck/canonicalize';

/**
 * Convert hex string to Uint8Array
 */
function hexToBytes(hex) {
    if (typeof hex !== 'string') {
        throw new TypeError('hexToBytes: expected string, got ' + typeof hex);
    }
    if (hex.length % 2 !== 0) {
        throw new Error('hexToBytes: received invalid unpadded hex');
    }
    const array = new Uint8Array(hex.length / 2);
    for (let i = 0; i < array.length; i++) {
        const j = i * 2;
        array[i] = parseInt(hex.slice(j, j + 2), 16);
    }
    return array;
}

/**
 * Convert Uint8Array to hex string
 */
function bytesToHex(bytes) {
    return Array.from(bytes)
        .map(b => b.toString(16).padStart(2, '0'))
        .join('');
}

/**
 * Generate public key from private key
 * @param {string} privateKeyHex - Private key as hex string
 * @returns {string} Compressed public key as hex string, or null if invalid
 */
export function generatePublicKey(privateKeyHex) {
    try {
        // Remove any whitespace
        const cleanHex = privateKeyHex.replace(/\s+/g, '');

        // Validate hex format
        if (!/^[0-9a-fA-F]+$/.test(cleanHex)) {
            return null;
        }

        // Private key should be 32 bytes (64 hex chars)
        if (cleanHex.length !== 64) {
            return null;
        }

        const privateKeyBytes = hexToBytes(cleanHex);
        const publicKeyBytes = secp.getPublicKey(privateKeyBytes, true); // compressed
        return bytesToHex(publicKeyBytes);
    } catch (error) {
        console.error('Error generating public key:', error);
        return null;
    }
}

/**
 * Sign the config object with private key
 * @param {object} config - The config object to sign
 * @param {string} privateKeyHex - Private key as hex string
 * @returns {Promise<string|null>} Signature as hex string, or null if invalid
 */
export async function signConfig(config, privateKeyHex) {
    try {
        // Remove any whitespace
        const cleanHex = privateKeyHex.replace(/\s+/g, '');

        // Validate
        if (!/^[0-9a-fA-F]+$/.test(cleanHex) || cleanHex.length !== 64) {
            return null;
        }

        // Canonicalize the config object for consistent hashing
        const canonicalJson = canonicalize(config);

        // Encode and Hash
        const messageBytes = new TextEncoder().encode(canonicalJson);
        const messageHashBytes = await secp.hashes.sha256Async(messageBytes);

        // Sign the hash (with prehash: false since we already hashed the message)
        const privateKeyBytes = hexToBytes(cleanHex);
        const signature = await secp.signAsync(messageHashBytes, privateKeyBytes, { prehash: false });

        // Handle both v2 and v3 API
        let signatureBytes;
        if (signature instanceof Uint8Array) {
            // v2 API - signature is already Uint8Array
            signatureBytes = signature;
        } else if (typeof signature.toBytes === 'function') {
            // v3 API - signature is object with toBytes method
            signatureBytes = signature.toBytes();
        } else {
            throw new Error('Unknown signature format');
        }

        return bytesToHex(signatureBytes);
    } catch (error) {
        console.error('Error signing config:', error);
        return null;
    }
}

/**
 * Validate if a string is a valid hex private key
 * @param {string} privateKeyHex - Private key to validate
 * @returns {boolean}
 */
export function isValidPrivateKey(privateKeyHex) {
    if (!privateKeyHex) return false;
    const cleanHex = privateKeyHex.replace(/\s+/g, '');
    return /^[0-9a-fA-F]{64}$/.test(cleanHex);
}

/**
 * Generate a new random private key
 * @returns {string} New private key as hex string
 */
export function generatePrivateKey() {
    const privateKeyBytes = secp.utils.randomSecretKey();
    return bytesToHex(privateKeyBytes);
}

// Make functions available globally for Alpine.js
window.ocidCrypto = {
    generatePublicKey,
    signConfig,
    isValidPrivateKey,
    generatePrivateKey
};
