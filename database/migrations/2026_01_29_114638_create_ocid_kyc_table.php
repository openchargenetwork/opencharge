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
        Schema::create('ocid_kyc', function (Blueprint $table) {
            $table->foreignId('ocid_id')->constrained('ocids')->cascadeOnDelete();
            $table->foreignId('kyc_provider_id')->constrained('ocids')->cascadeOnDelete();
            $table->primary(['ocid_id', 'kyc_provider_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocid_kyc');
    }
};
