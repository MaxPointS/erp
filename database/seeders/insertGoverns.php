<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class insertGoverns extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("governs")->insert([
            [
                "uuid"=>Str::uuid(),
                "name" => "Capital",
                "arname" => "العاصمة",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name" => "Farwaniya",
                "arname" => "الفروانية",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name" => "Hawalli",
                "arname" => "حولى ",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name" => "Ahmadii",
                "arname" => "الأحمدى",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name" => "Jahra",
                "arname" => "الجهراء",
                "created_at" => now(),
                "updated_at" => now()
            ],
            
            [
                "uuid"=>Str::uuid(),
                "name" => "Mubark Al-Kabeer",
                "arname" => "مبارك الكبير",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ]);
    }
}
