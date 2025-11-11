<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internships extends Model
{
    use HasFactory;

    protected $fillable = [
        'students_id',
        'teachers_id',
        'companies_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'catatan_guru',
        'laporan_pkl'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function companies()
    {
        return $this->belongsTo(Companies::class);
    }
}
