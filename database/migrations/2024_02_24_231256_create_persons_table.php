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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('document_type', 20)->nullable();
            $table->string('document_number', 20)->nullable();
            $table->string('document_issuance', 20)->nullable();
            $table->date('document_issue_date')->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('second_name', 100)->nullable();
            $table->string('first_surname', 100)->nullable();
            $table->string('second_surname', 100)->nullable();
            $table->date('birthday')->nullable();
            $table->char('rh', 4)->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('address', 50)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('main_phone', 20)->nullable();
            $table->string('other_phone', 20)->nullable();
            $table->char('stratum', 4)->nullable();
            $table->char('sisben', 4)->nullable();
            $table->string('eps', 100)->nullable();
            $table->text('occupation')->nullable();
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
        Schema::dropIfExists('persons');
    }
};
