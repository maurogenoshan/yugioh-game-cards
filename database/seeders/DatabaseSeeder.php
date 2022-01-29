<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        DB::table('cards')->insert([
            'name' => Str::random(10),
            'first_edition' => '0',
            'serial_code' => Str::random(10),
            'atk' => '7',
            'def' => '1',
            'starts' => '4',
            'description' => 'A card',
            'image' =>  Str::random(10).'.png',
            'date_created' => '1986-01-20 00:00:00'
        ]);

        DB::table('types')->insert([
            'name' => 'Carta Magica',
            'parent_id' => ''
        ]);

        DB::table('card_type')->insert([
            'card_id' => 1,
            'type_id' => 1
        ]);
    }
}
