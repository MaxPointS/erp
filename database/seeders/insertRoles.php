<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class insertRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("roles")->insert([
            [
                "uuid"=>Str::uuid(),
                "name" => "administrator",
                "arname" => "مدير نظام",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "uuid"=>Str::uuid(),
                "name" => "user",
                "arname" => "مستخدم",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ]);
    }
}
