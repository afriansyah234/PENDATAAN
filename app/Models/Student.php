<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable= ['nama_siswa','nis', 'classroom_id','gender','no_telp','jurusan','alamat'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
