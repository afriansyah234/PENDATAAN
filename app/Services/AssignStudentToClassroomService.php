<?php
namespace App\Services\Classroom;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class AssignStudentToClassroomService
{
    public function execute(Classroom $classroom, Student $student): void
    {
        DB::transaction(function () use ($classroom, $student) {

            // lock biar gak over capacity
            $classroom = Classroom::where('id', $classroom->id)
                ->lockForUpdate()
                ->first();

            // cek apakah siswa sudah punya kelas
            if ($student->classroom_id !== null) {
                throw new RuntimeException('Siswa sudah terdaftar di kelas lain');
            }

            // cek kapasitas
            if ($classroom->students()->count() >= $classroom->kapasitas) {
                throw new RuntimeException('Kelas sudah penuh');
            }

            // assign siswa
            $student->update([
                'classroom_id' => $classroom->id
            ]);
        });
    }
}

?>