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
            'date'=>'2017-02-20',
            'heure'=>'12:00',
            'instance_id'=>'1',
            'user_id'=>'1',
            'difficulte'=>'heroic',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus varius arcu tellus, et tempus leo imperdiet eget. Etiam venenatis enim sit amet ligula accumsan, id tempor massa fermentum. Praesent vitae turpis faucibus, varius magna at, commodo tortor. In mi lectus, vulputate eu elementum eget, egestas varius justo. Aenean ornare nunc odio, vitae iaculis purus facilisis ac. Fusce eleifend magna orci, a viverra arcu luctus aliquam. Vivamus eu magna ligula. Nam bibendum libero vitae est elementum dictum nec eget felis. Nam elementum nisi ut nunc aliquet maximus. Phasellus massa dui, semper et facilisis sit amet, finibus eget magna. Nulla vestibulum turpis vitae ex egestas commodo. Praesent varius justo sed augue accumsan dictum.

Suspendisse vehicula massa in ligula dictum, a rutrum tortor tincidunt. In non metus sem. Proin pulvinar neque vitae tristique ullamcorper. Vestibulum et neque ut lorem consequat congue. Ut sit amet orci sed ante accumsan venenatis sit amet nec odio. Praesent imperdiet at massa eu bibendum. Donec imperdiet pretium orci iaculis hendrerit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Nam sit amet dignissim diam. Vivamus convallis facilisis massa non gravida. Nam lectus leo, cursus sit amet varius ut, consequat non tellus. Integer vel purus elit. Proin dictum augue auctor luctus tristique. Mauris eget risus lacus. Nulla finibus, nisi sed fringilla scelerisque, magna leo facilisis elit, eu feugiat erat nulla ac erat. Quisque tempor metus eget interdum laoreet. Nam elementum posuere ligula, vel bibendum ante aliquet vel. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis tortor nunc, egestas ac varius in, sollicitudin a erat. Donec consequat metus eu tempus tincidunt. Suspendisse viverra aliquet magna sit amet fringilla. Quisque turpis eros, condimentum quis euismod a, aliquam non neque.

'
        ]);
    }
}
