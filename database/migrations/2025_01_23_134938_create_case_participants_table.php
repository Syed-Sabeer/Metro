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

            Schema::create('case_participants', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('case_id');
                $table->unsignedBigInteger('participant_id');
                $table->string('role')->nullable();
                $table->timestamps();

                // Foreign Key Constraint
                $table->foreign('case_id')->references('id')->on('casenews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_participants');
    }
};
