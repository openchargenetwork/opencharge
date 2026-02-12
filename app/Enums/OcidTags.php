<?php

namespace App\Enums;

enum OcidTags: string
{
    case Merchant = 'merchant';
    case AVD = 'automated_vending_device';
    case Aggregator = 'aggregator';
    case Gateway = 'gateway'; // Merged Merchant & Payment Gateways
    case OnOffRamp = 'on_off_ramp';
    case Banking = 'banking'; // Merged Bank & NeoBanking
    case Wallet = 'wallet';
    case Exchange = 'exchange'; // Crypto Exchange
    case Compliance = 'compliance'; // Merged KYC & AML services
    case PaymentProcessing = 'payment_processing'; // Merged Send, Receive, Split, Recurring, Refunds
    case B2BSettlements = 'b2b_settlement';
    case Remittance = 'remittance';
    case PeerToPeer = 'peer_to_peer';
    case Escrow = 'escrow';

    public function label(): string
    {
        return match ($this) {
            self::Merchant => 'Merchant',
            self::AVD => 'Auto Vending',
            self::Aggregator => 'Aggregator',
            self::Gateway => 'Pay Gateway',
            self::OnOffRamp => 'On/Off Ramp',
            self::Banking => 'Banking',
            self::Wallet => 'Wallets',
            self::Exchange => 'Exchange',
            self::Compliance => 'KYC/AML',
            self::PaymentProcessing => 'Payment Processing',
            self::B2BSettlements => 'B2B Settlements',
            self::Remittance => 'Remittance',
            self::PeerToPeer => 'Peer-to-Peer',
            self::Escrow => 'Escrow',
        };
    }
}
