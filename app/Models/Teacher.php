<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nip',
        'no_telepon'
    ];

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function internships()
    {
        return $this->hasMany(internships::class);
    }
}
