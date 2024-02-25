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
        Schema::create('locations', function (Blueprint $table) {
               $table->id();
            $table->foreignId('person_id')->nullable()->constrained('persons')->onDelete('set null');
            $table->foreignId('municipality_id')->nullable()->constrained('municipalities')->onDelete('set null');
            $table->string('location_type', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
