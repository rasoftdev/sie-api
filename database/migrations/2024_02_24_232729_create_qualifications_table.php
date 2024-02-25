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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->nullable()->constrained('tasks')->onDelete('set null');
            $table->foreignId('student_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->date('delivery_date')->nullable();
            $table->float('value')->nullable();
            $table->foreignId('academic_period_id')->nullable()->constrained('academic_periods')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifications');
    }
};
