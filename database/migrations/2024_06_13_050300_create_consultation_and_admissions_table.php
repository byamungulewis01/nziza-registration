<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_and_admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->restrictOnDelete();
            $table->foreignId('hospital_id')->constrained()->restrictOnDelete();
            $table->date('dateOfExit')->nullable();
            $table->string('main_diagnostic')->nullable();
            $table->foreignId('evolution_id')->nullable()->constrained()->restrictOnDelete();
            $table->foreignId('insurence_id')->nullable()->constrained()->restrictOnDelete();
            $table->string('orientation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation_and_admissions');
    }
};
