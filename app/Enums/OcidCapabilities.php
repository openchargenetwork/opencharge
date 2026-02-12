<?php

namespace App\Enums;

enum OcidCapabilities: string
{
    case OrdersCheckout = 'orders.checkout';
    case TransferCreate = 'transfer.create';
    case TransferWebhook = 'transfer.webhook';
    case PaymentCreate = 'payment.create';
    case PaymentSettle = 'payment.settle';
    case VerifyTxid = 'verify.txid';
    case CheckoutCreate = 'checkout.create';
    case OrdersCreateSession = 'orders.create.session';
    case OrdersCreate = 'orders.create';
    case OrdersStatus = 'orders.status';
    case KycGrant = 'kyc.grant';
    case KycValidate = 'kyc.validate';
    case KycData = 'kyc.data';

    public function label(): string
    {
        return match ($this) {
            // Transaction & Payment Processing
            self::OrdersCheckout => 'Initiate Order Checkout',
            self::CheckoutCreate => 'Initiate Checkout Session',
            self::PaymentCreate => 'Initiate New Payment',
            self::PaymentSettle => 'Settle Payments',

            // Transfers & Updates
            self::TransferCreate => 'Initiate Fund Transfer',
            self::TransferWebhook => 'Receive Transfer Updates', // "Webhook" is technical; "Updates" is human

            // Order Management
            self::OrdersCreateSession => 'Initialize Order Session',
            self::OrdersCreate => 'Place New Order',
            self::OrdersStatus => 'View Order Status',

            // Verification & Security
            self::VerifyTxid => 'Verify Transaction ID',
            self::KycGrant => 'Grant KYC Approval',
            self::KycValidate => 'Validate Customer Identity',
            self::KycData => 'Access KYC Data',
        };
    }

    /**
     * Get a short description of what this endpoint does.
     */
    public function shortDescription(): string
    {
        return match ($this) {
            self::OrdersCheckout => 'Receive orders from merchants and return a redirect URL for payment.',
            self::TransferCreate => 'Process fund transfers between OCIDs.',
            self::TransferWebhook => 'Receive signed transfer proofs when payments complete.',
            self::PaymentCreate => 'Accept payment requests from third-party apps.',
            self::PaymentSettle => 'Complete payments by accepting settlement proofs.',
            self::VerifyTxid => 'Verify the status of a transaction by its ID.',
            self::CheckoutCreate => 'Create a hosted checkout session for end users.',
            self::OrdersCreateSession => 'Receive orders from merchants via QR code flow.',
            self::OrdersCreate => 'Create and sign a new order for payment.',
            self::OrdersStatus => 'Check the payment status of an order.',
            self::KycGrant => 'UI for users to grant KYC data access to an OCID.',
            self::KycValidate => 'Check a user\'s KYC status and granted permissions.',
            self::KycData => 'Retrieve signed KYC data for granted permissions.',
        };
    }

    /**
     * Get the API endpoint path for this capability.
     */
    public function endpointPath(): string
    {
        return match ($this) {
            self::OrdersCheckout => '/orders/checkout',
            self::TransferCreate => '/transfer/create',
            self::TransferWebhook => '/transfer/webhook',
            self::PaymentCreate => '/payment/create',
            self::PaymentSettle => '/payment/settle',
            self::VerifyTxid => '/verify/{txid}',
            self::CheckoutCreate => '/checkout/create',
            self::OrdersCreateSession => '/orders/create/{sessionId}',
            self::OrdersCreate => '/orders/create',
            self::OrdersStatus => '/orders/{orderId}/status',
            self::KycGrant => '/kyc/grant/{ocid}',
            self::KycValidate => '/kyc/validate',
            self::KycData => '/kyc/data',
        };
    }

    /**
     * Get the HTTP method for this capability.
     */
    public function httpMethod(): string
    {
        return match ($this) {
            self::VerifyTxid, self::OrdersStatus, self::KycGrant => 'GET',
            default => 'POST',
        };
    }

    /**
     * Get the documentation URL for this capability.
     */
    public function docsUrl(): string
    {
        return match ($this) {
            // Merchant Gateway API
            self::OrdersCheckout => 'https://docs.opencharge.network/merchant-gateway-api/endpoint/orders-checkout',
            self::PaymentCreate => 'https://docs.opencharge.network/merchant-gateway-api/endpoint/payment-create',
            self::PaymentSettle => 'https://docs.opencharge.network/merchant-gateway-api/endpoint/payment-settle',
            self::VerifyTxid => 'https://docs.opencharge.network/merchant-gateway-api/endpoint/verify-txid',

            // Payment Gateway API
            self::CheckoutCreate => 'https://docs.opencharge.network/payment-gateway-api/endpoint/checkout-create',
            self::OrdersCreateSession => 'https://docs.opencharge.network/payment-gateway-api/endpoint/orders-create',

            // Merchant API
            self::OrdersCreate => 'https://docs.opencharge.network/merchant-api/endpoint/orders-create',
            self::OrdersStatus => 'https://docs.opencharge.network/merchant-api/endpoint/order-status',

            // Shared across APIs
            self::TransferCreate => 'https://docs.opencharge.network/merchant-gateway-api/endpoint/transfer-create',
            self::TransferWebhook => 'https://docs.opencharge.network/merchant-gateway-api/endpoint/transfer-webhook',

            // KYC Provider API
            self::KycGrant => 'https://docs.opencharge.network/kyc-provider-api/endpoint/kyc-grant',
            self::KycValidate => 'https://docs.opencharge.network/kyc-provider-api/endpoint/kyc-validate',
            self::KycData => 'https://docs.opencharge.network/kyc-provider-api/endpoint/kyc-data',
        };
    }

    /**
     * Get an array of merchant capabilities
     *
     * @return OcidCapabilities[]
     */
    public static function getMerchantCapabilities(): array
    {
        return [
            self::OrdersCreate,
            self::OrdersStatus,
            self::TransferWebhook,
        ];
    }

    /**
     * Get an array of merchant gateway capabilities
     *
     * @return OcidCapabilities[]
     */
    public static function getMerchantGatewayCapabilities(): array
    {
        return [
            self::OrdersCheckout,
            self::TransferCreate,
            self::TransferWebhook,
            self::PaymentCreate,
            self::PaymentSettle,
            self::VerifyTxid,
        ];
    }

    /**
     * Get an array of payment gateway capabilities
     *
     * @return OcidCapabilities[]
     */
    public static function getPaymentGatewayCapabilities(): array
    {
        return [
            self::CheckoutCreate,
            self::OrdersCreateSession,
            self::TransferCreate,
            self::TransferWebhook,
        ];
    }

    /**
     * Get an array of kyc provider capabilities
     *
     * @return OcidCapabilities[]
     */
    public static function getKycProviderCapabilities(): array
    {
        return [
            self::KycGrant,
            self::KycValidate,
            self::KycData,
        ];
    }
}
