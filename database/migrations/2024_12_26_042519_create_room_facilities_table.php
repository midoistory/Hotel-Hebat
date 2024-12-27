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
        Schema::create('room_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('room_type_id')->constrained('room_types')->onDelete('cascade');
            $table->text('kamar')->nullable();
            $table->text('perlengkapan_tidur')->nullable();
            $table->text('umum')->nullable();
            $table->text('makan')->nullable();
            $table->text('media')->nullable();
            $table->text('kamar_mandi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_facilities');
    }
};
