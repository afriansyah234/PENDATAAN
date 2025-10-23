<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'name' => 'admin',
            'email' => 'xcc@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('admin');
    }
}
