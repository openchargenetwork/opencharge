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
        Schema::create('ocid_accepts', function (Blueprint $table) {
            $table->foreignId('ocid_id')->constrained('ocids')->cascadeOnDelete();
            $table->foreignId('accepts_id')->constrained('ocids')->cascadeOnDelete();
            $table->primary(['ocid_id', 'accepts_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocid_accepts');
    }
};
