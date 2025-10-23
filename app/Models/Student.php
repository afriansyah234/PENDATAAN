<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable= ['name','nis', 'classroom_id','gender','phone_number','major','address'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}