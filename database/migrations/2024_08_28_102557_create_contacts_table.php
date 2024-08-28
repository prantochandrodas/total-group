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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('background_image')->nullable();
            $table->string('title')->nullable();
            $table->string('location_icon')->nullable();
            $table->string('location_title')->nullable();
            $table->text('location')->nullable();
            $table->string('contact_icon')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('map_image')->nullable();
            $table->string('map_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
