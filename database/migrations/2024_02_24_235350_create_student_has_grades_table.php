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
        Schema::create('student_has_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->foreignId('grade_id')->nullable()->constrained('grades')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_has_grades');
    }
};
