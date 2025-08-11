<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'adminsoccer',
            'email' => "adminsoccer@gmail.com",
            'password' => bcrypt('AZERTYazerty123@@'),
        ]);
    }
}
