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
        Schema::create('student_has_courses', function (Blueprint $table) {
            $table->id();
              $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('set null');
            $table->foreignId('student_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->char('year', 4)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_has_courses');
    }
};
