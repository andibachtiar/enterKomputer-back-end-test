<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("products")->insert([
            [
                "name" => "jeruk",
                "category_id" => 1,
                "price" => null,
                "variants" => json_encode([
                    "dingin" => [
                        "price" => 12000
                    ],
                    "panas" => [
                        "price" => 10000
                    ],
                ]),
            ],
            [
                "name" => "teh",
                "price" => null,
                "category_id" => 1,
                "variants" => json_encode([
                    "manis" => [
                        "price" => 8000
                    ],
                    "tawar" => [
                        "price" => 5000
                    ],
                ]),
            ],
            [
                "name" => "kopi",
                "price" => null,
                "category_id" => 1,
                "variants" => json_encode([
                    "dingin" => [
                        "price" => 8000
                    ],
                    "panas" => [
                        "price" => 6000
                    ],
                ]),
            ],
            [
                "name" => "extra es batu",
                "price" => 2000,
                "category_id" => 1,
                "variants" => null
            ],

            [
                "name" => "mie",
                "price" => null,
                "category_id" => 2,
                "variants" => json_encode([
                    "goreng" => [
                        "price" => 15000
                    ],
                    "kuah" => [
                        "price" => 15000
                    ],
                ]),
            ],

            [
                "name" => "nasi goreng + jeruk dingin",
                "price" => 23000,
                "category_id" => 3,
                "variants" => null
            ],
        ]);
    }
}
