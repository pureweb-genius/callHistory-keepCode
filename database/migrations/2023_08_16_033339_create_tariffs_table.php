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
        Schema::create('tariffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operator_id_from');
            $table->unsignedBigInteger('operator_id_to');
            $table->string('cost');
            $table->timestamps();

            $table->foreign('operator_id_from')->references('id')->on('operators')->onDelete('cascade');
            $table->foreign('operator_id_to')->references('id')->on('operators')->onDelete('cascade');
            $table->unique(['operator_id_from', 'operator_id_to']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tariffs');
    }
};
