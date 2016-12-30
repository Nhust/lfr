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
            'nom' => str_random(10),
            'prenom' => 'user'.str_random(1),
            'email' => 'm"ail'.str_random(1).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
