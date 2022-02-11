<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Populate cards
        \App\Models\Card::factory(10)->create();

        // Populate the pivot table
        $types = \App\Models\Type::all();

        \App\Models\Card::all()->each(function ($card) use ($types) {
            $card->types()->attach(
                $types->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
