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
        Schema::create('call_operators', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('from_operator');
           $table->unsignedBigInteger('to_operator');
           $table->unsignedBigInteger('call_id');
           $table->timestamps();

           $table->foreign('from_operator')->references('id')->on('operators')->onDelete('cascade');
           $table->foreign('to_operator')->references('id')->on('operators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_operators');
    }
};
