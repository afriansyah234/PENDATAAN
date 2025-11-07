<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kelas','kapasitas'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
