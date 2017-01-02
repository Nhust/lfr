<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nom' => 'Libeert',
            'prenom' => 'Pierre-Henri',
            'email' => 'worfut@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
