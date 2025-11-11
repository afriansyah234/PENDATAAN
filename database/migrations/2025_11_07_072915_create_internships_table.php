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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('students_id')->constrained('students');
            $table->foreignId('teachers_id')->constrained('teachers');
            $table->foreignId('companies_id')->constrained('companies');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status',['aktif','selesai','batal'])->default('aktif');
            $table->text('catatan_guru');
            $table->enum('laporan_pkl',['selesai','belum']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
