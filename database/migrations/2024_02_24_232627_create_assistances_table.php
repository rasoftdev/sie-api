<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->foreignId('person_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->foreignId('school_subjet_id')->nullable()->constrained('school_subjects')->onDelete('set null');
            $table->foreignId('academic_period_id')->nullable()->constrained('academic_periods')->onDelete('set null');
            $table->integer('hour')->nullable();
            $table->char('date', 4)->nullable();
            $table->tinyInteger('in_class')->nullable();
            $table->tinyInteger('justified_inassitence')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistences');
    }
};
