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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('checkIn');
            $table->date('checkOut');
            $table->foreignId('room_type_id')->constrained('room_types')->onDelete('cascade');
            $table->integer('jumlah_kamar');
            $table->enum('payment_method', ['Transfer Bank', 'Ovo', 'Gopay']);
            $table->string('image');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
