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
        Schema::create('student_has_parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->foreignId('parent_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->string('kinship', 100)->nullable();
            $table->tinyInteger('is_attendant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_has_parents');
    }
};
