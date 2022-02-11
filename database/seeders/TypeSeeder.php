<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = array();
        $parentTypes = [
            [
                "name" => "Monstruo",
                "parent_id" => 0
            ],
            [
                "name" => "Mágica",
                "parent_id" => 0
            ],
            [
                "name" => "Trampa",
                "parent_id" => 0
            ]
        ];

        foreach ($parentTypes as $type) {
            $ids[] = Type::insertGetId(
                [
                    "name" => $type["name"],
                    "parent_id" => $type["parent_id"]
                ]
            );
        }
        Type::insert([
            [
                "name" => "Monstruos Normales",
                "parent_id" => $ids[0]
            ],
            [
                "name" => "Monstruos de Efecto",
                "parent_id" => $ids[0]
            ],
            [
                "name" => "Monstruos de Ritual",
                "parent_id" => $ids[0]
            ],
            [
                "name" => "Cartas Mágicas de Juego Rápido",
                "parent_id" => $ids[1]
            ],
            [
                "name" => "Cartas de Trampa de Contraefecto",
                "parent_id" => $ids[2]
            ]

        ]);
    }
}
