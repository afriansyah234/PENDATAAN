<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Hummatech',
                'alamat' => 'Perum. Permata Regency 1 Blok 10 No. 28 Ngijo, Kec. Karang Ploso, Kab. Malang, Jawa Timur, Indonesia, 65152',
                'no_telepon' => '085176777785',
                'email' => 'info@hummatech.com',
                'penanggung_jawab' => 'Afrizal'
            ],
        ];

        foreach ($companies as $companie) {
            Companies::firstOrCreate($companie);
        }
    }
}
