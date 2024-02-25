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
        Schema::create('person_has_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('persons')->onDelete('cascade');
            $table->foreignId('notification_id')->constrained('notifications')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_has_notifications');
    }
};
