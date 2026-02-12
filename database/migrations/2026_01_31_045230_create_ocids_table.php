<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ocids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('token_id')->unique()->nullable();

            // Basic OCID Info
            $table->string('opencharge_version')->default('0.1');
            $table->string('name')->nullable();
            $table->text('profile')->nullable();
            $table->string('icon')->nullable();

            // Config - extracted fields
            $table->text('public_key')->nullable();
            $table->string('endpoint')->nullable();
            $table->json('capabilities')->nullable();
            // Array of capability strings

            // Settlement - extracted fields
            $table->json('settlement_currencies')->nullable();
            // Array of currency codes
            $table->json('settlement_accepts')->nullable();
            // Array of payment method IDs

            // KYC
            $table->json('kyc')->nullable(); // Array of KYC provider IDs

            // Signature & Contact
            $table->text('signature')->nullable();
            $table->string('contact')->nullable();

       
            // derived
            $table->string('status')->nullable();
            $table->boolean('valid_signature')->default(false);
            $table->boolean('testnet')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocids');
    }
};
