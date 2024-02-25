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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_subjet_id')->nullable()->constrained('school_subjects')->onDelete('set null');
            $table->foreignId('person_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->string('name', 100)->nullable();
            $table->longText('content')->nullable();
            $table->string('type', 50)->nullable();
            $table->float('percentage')->nullable();
            $table->tinyInteger('state')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
