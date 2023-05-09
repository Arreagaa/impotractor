<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rubén Tahuité',
            'email' => 'ventas1@impotractor.com',
            'password' => bcrypt('@Impo-23'),
        ])->assignRole('Seller');

        User::create([
            'name' => 'Aaron Medrano',
            'email' => 'ventas2@impotractor.com',
            'password' => bcrypt('@Impo-23'),
        ])->assignRole('Seller');
    }
}
