<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrinterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("printers")->insert([
            [
                "name" => "Printer kasir",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Printer dapur (Makanan)",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Printer bar (Minuman)",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
