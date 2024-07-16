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
        Schema::create('tanzania_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('software');
            $table->date('start_date');
            $table->date('end_date');
            $table->bigInteger('price');
            $table->bigInteger('virtual_price');
            $table->string('location');
            $table->string('instructor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanzania_trainings');
    }
};
