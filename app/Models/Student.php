<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nama_siswa','nis','classroom_id','gender','no_telp','jurusan','email','alamat','teachers_id'];


    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function internships()
    {
        return $this->hasOne(internships::class);
    }
}
