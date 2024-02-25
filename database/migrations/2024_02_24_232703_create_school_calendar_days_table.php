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
        Schema::create('school_calendar_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_calendar_id')->nullable()->constrained('school_calendars')->onDelete('cascade');
            $table->foreignId('school_subjet_id')->nullable()->constrained('school_subjects')->onDelete('cascade');
            $table->foreignId('person_id')->nullable()->constrained('persons')->onDelete('cascade');
            $table->string('day', 10)->nullable();
            $table->integer('hour')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_calendar_days');
    }
};
