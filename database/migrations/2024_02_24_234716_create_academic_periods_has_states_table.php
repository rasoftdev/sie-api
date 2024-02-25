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
        Schema::create('academic_periods_has_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_period_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('state')->nullable();
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
        Schema::dropIfExists('academic_periods_has_states');
    }
};
