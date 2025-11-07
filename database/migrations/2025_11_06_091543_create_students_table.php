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
            $table->string('nama_siswa');
            $table->string('nis')->unique();
            $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
            $table->enum('gender', ['L', 'P']);
            $table->string('no_telp')->nullable();
            $table->string('jurusan');
            $table->string('email');
            $table->text('alamat')->nullable();
            $table->foreignId('teachers_id')->constrained('teachers')->onDelete('cascade');
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
