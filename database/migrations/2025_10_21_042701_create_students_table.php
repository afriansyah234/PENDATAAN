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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name_student');
            $table->string('nis')->unique();
            $table->foreignId('classroom_id')
                ->constrained('classrooms')
                ->onDelete('cascade');
            $table->enum('gender', ['L', 'P']);
            $table->string('phone_number')->nullable();
            $table->string('major');
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
