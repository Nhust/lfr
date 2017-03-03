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
            'email' => 'worfut@hotmail.fr',
            'password' => bcrypt('secret'),
            'btag' => 'Bënz#2915',
        ]);
    }
}
