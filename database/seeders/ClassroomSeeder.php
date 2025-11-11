<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = [
            [
                'nama_kelas' => 'Kelas 10A',
                'kapasitas' => 21,
            ],
            [
                'nama_kelas' => 'Kelas 11B',
                'kapasitas' => 19,
            ],
            [
                'nama_kelas' => 'Kelas 12C',
                'kapasitas' => 25,
            ],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::firstOrCreate($classroom);
        }
    }
}
