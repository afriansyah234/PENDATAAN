<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat',
        'no_telepon',
        'email',
        'penanggung_jawab'
    ];

    public function internships()
    {
        return $this->hasMany(internships::class);
    }
}
