<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'nom'=>'Donjon Fun',
            'nbCharacters'=>'5',
            'datetime'=>'2017-01-30 16:33:00',
            'instance_id'=>'1',
            'user_id'=>'1',
        ]);
    }
}
