# Open Charge Network

Open Charge is a payment interoperability protocol — a common language that defines how payment services communicate with each other. Think of it like HTTP for the web, but for payments. It doesn't move money; it standardizes how payment systems talk about moving money.

## Overview

The protocol is designed to be consumed by merchants (online, OTC) and wallet service providers like Venmo, MetaMask, Alipay, Safewallet and others. Once implemented, these services can seamlessly accept payments from or send payments to Open Charge merchants or other Open Charge-compatible wallets.

While developers can implement direct access to the protocol in their own systems, wallet services retain full control over their transaction policies. They can still choose to allow transactions only with certain parties. Open Charge doesn't replace payment apps — it's simply a communication layer that any payment app can hook into.

## Core Concepts

| Concept | Description |
|---------|-------------|
| **A Simple Protocol** | Stakeholders determine when to send, receive, or respond to messages. The protocol defines the language, not the behavior. |
| **Communication Only** | Open Charge defines communication standards. Wallets and devices remain fully responsible for security, authentication, and verification. |
| **Built for Developers** | Open Charge isn't meant for end users making payments. It's for development teams who want to expand their app's interoperability and reach. |
| **Open Source at Its Core** | All protocol contracts are open source and community-contributed. Anyone can propose edits and improvements to the code and documentation. |

## Hardware and Vending Device Support

Open Charge also defines a uniform communication API for hardware devices — vending machines, fuel pumps, EV chargers, parking meters, and more. This allows any Open Charge-compatible wallet or payment service to operate supported hardware through a standardized set of commands, without custom integrations for each manufacturer.

**Example:** Imagine MetaMask implements Open Charge merchant services, then MetaMask could potentially command an Open Charge-supported fuel pump to release 30 liters of fuel after confirming payment — without need for further development or manufacturer-specific integration.

This removes the need for merchants to hire dedicated development teams for each device or payment provider combination.

### Hardware Features

| Feature | Description |
|---------|-------------|
| **Cherry-Pick Features** | Apps, services, and devices can choose which protocol features to implement or block, and publish their capabilities so peers know what to expect. |
| **Freedom to Choose Partners** | Apps, services, and devices can accept or reject transaction handshakes at will. The protocol facilitates communication but enforces no partnerships. |
| **Controlled Device Access** | The protocol defines commands for payment and delivery workflows only. It doesn't grant unrestricted access or enforce rules on device behavior. |
| **Status Broadcasts** | Devices and services can optionally broadcast status information. This public data can power indexes, maps, availability dashboards, and more. |

## Key Principles

| Principle | Description |
|-----------|-------------|
| **Interoperability** | Any compliant wallet can communicate with any other compliant wallet or device. |
| **Sovereignty** | Each participant retains full control over their security, policies, and partnerships. |
| **Extensibility** | The protocol can grow through community proposals without breaking existing implementations. |
| **Transparency** | Capabilities and restrictions are published openly, so participants know what to expect. |

## Development

### Requirements

- PHP 8.2+
- Node.js
- Composer

### Setup

```bash
composer setup
```

This will install PHP and Node dependencies, generate an application key, run migrations, and build frontend assets.

### Running Locally

```bash
composer dev
```

This starts the Laravel development server, queue worker, log viewer, and Vite dev server concurrently.

### Testing

```bash
composer test
```

### Code Formatting

```bash
composer lint
```

## Tech Stack

- **Backend:** Laravel 12, Livewire 4
- **Frontend:** Flux UI, Tailwind CSS 4
- **Authentication:** Laravel Fortify

## License

MIT
