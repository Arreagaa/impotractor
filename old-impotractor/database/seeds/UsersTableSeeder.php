<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
	  DB::table('users')->insert([
      'name' => 'Impotractor Admin',
      'email' => 'cotizaciones@impotractor.com',
      'password' => bcrypt('Impotractor2005'),
    ]);
  }
}
