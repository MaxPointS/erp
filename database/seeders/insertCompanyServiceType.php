<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class insertCompanyServiceType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("companyservicetypes")->insert([
            [
                    "uuid"=>Str::uuid(),
                    "name" => "Insurance",
                    "arname" => "تأمين",
                    "created_at" => now(),
                    "updated_at" => now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name" => "inspection",
                "arname" => "فحص فنى",
                "created_at" => now(),
                "updated_at" => now()
        ],
        ]);
    }
}
