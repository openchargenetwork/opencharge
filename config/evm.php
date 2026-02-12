<?php

return [

    'contract' => env('EVM_CONTRACT_ADDRESS'),
    'testnet' => env('EVM_TESTNET', true),
    'projectId' => env('APPKIT_PROJECT_ID'),

    'abi' => [
        [
            'type' => 'function',
            'name' => 'ocidMintWithBaseURI',
            'inputs' => [
                ['name' => 'to', 'type' => 'address'],
                ['name' => 'baseURI', 'type' => 'string'],
            ],
            'outputs' => [
                ['name' => '', 'type' => 'uint256'],
            ],
            'stateMutability' => 'payable',
        ],
        [
            'type' => 'function',
            'name' => 'ocidMint',
            'inputs' => [
                ['name' => 'to', 'type' => 'address'],
                ['name' => 'uri', 'type' => 'string'],
            ],
            'outputs' => [
                ['name' => '', 'type' => 'uint256'],
            ],
            'stateMutability' => 'payable',
        ],
        [
            'type' => 'function',
            'name' => 'mintFee',
            'inputs' => [],
            'outputs' => [
                ['name' => '', 'type' => 'uint256'],
            ],
            'stateMutability' => 'view',
        ],
        [
            'type' => 'event',
            'name' => 'OCIDMinted',
            'inputs' => [
                ['name' => 'to', 'type' => 'address', 'indexed' => true],
                ['name' => 'tokenId', 'type' => 'uint256', 'indexed' => true],
            ],
            'anonymous' => false,
        ],
        [
            'type' => 'error',
            'name' => 'InsufficientPayment',
            'inputs' => [
                ['name' => 'required', 'type' => 'uint256'],
                ['name' => 'provided', 'type' => 'uint256'],
            ],
        ],
    ],

    'nft_base_url' => 'https://cdn.chargecloud.io/ocid/',

];
