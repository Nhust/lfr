<?php

use Illuminate\Database\Seeder;

class InstancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instances')->insert([
            'nom'=>'Grimrail Depot',
            'typeInstance'=>'Donjon',
        ]);
    }
}
