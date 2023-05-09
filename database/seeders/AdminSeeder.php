<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Impotractor Administrador',
            'email' => 'cotizaciones@impotractor.com',
            'password' => bcrypt('Impotractor2005'),
        ])->assignRole('Admin');
    }
}
