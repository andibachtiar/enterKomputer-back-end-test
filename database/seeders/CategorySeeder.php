<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            [
                "name" => "minuman",
                "printer_ids" => json_encode([1, 2]),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "makanan",
                "printer_ids" => json_encode([1, 3]),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "promo",
                "printer_ids" => json_encode([1, 3]),
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
