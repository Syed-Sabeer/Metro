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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users'); // assuming users table exists
            $table->foreignId('room_id')->constrained('rooms'); // Store the sender's name
            $table->text('message');    // The chat message
            $table->timestamps();       // Timestamps for created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
