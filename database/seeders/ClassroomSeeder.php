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
            ['name_classroom' => 'Kelas 10A'],
            ['name_classroom' => 'Kelas 10B'],
            ['name_classroom' => 'Kelas 11A'],
            ['name_classroom' => 'Kelas 11B'],
            ['name_classroom' => 'Kelas 12A'],
            ['name_classroom' => 'Kelas 12B'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create($classroom);
        }
    }
}
