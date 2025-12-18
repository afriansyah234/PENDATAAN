<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'nama_siswa'  => $this->nama_siswa,
            'nis'         => $this->nis,
            'jurusan'     => $this->jurusan,
            'gender'      => $this->gender,
            'email'       => $this->email,
            'no_telp'     => $this->no_telp,
            'alamat'      => $this->alamat,

            // RELASI
            'classroom' => $this->whenLoaded('classroom', function () {
                return [
                    'id'         => $this->classroom->id,
                    'nama_kelas' => $this->classroom->nama_kelas,
                ];
            }),

            'teacher' => $this->whenLoaded('teacher', function () {
                return [
                    'id'   => $this->teacher->id,
                    'nama' => optional($this->teacher->user)->name,
                ];
            }),
        ];
    }
}

