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
                'name_classroom' => 'Kelas 10A',
                'capacity' => 21,
            ],
            [
                'name_classroom' => 'Kelas 11B',
                'capacity' => 19,
            ],
            [
                'name_classroom' => 'Kelas 12C',
                'capacity' => 25,
            ],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::firstOrCreate($classroom);
        }
    }
}
