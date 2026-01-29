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
            $table->string('ocid')->unique();
            $table->string('type')->index();
            $table->string('opencharge_version');
            $table->string('name');
            $table->text('profile')->nullable();
            $table->string('icon')->nullable();
            $table->json('config')->nullable();
            $table->string('signature')->nullable();
            $table->string('contact')->nullable();
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
