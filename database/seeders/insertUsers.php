<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class insertUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
      
        DB::table("users")->insert([
            [ "uuid"=>Str::uuid(), "name"=>"admin","role_id"=>"2c701f6b-2410-44f3-8d49-dadd7a53b12a","email"=>"admin@insrance.com","password"=>Hash::make(123),"created_at"=>now(),"updated_at"=>now()],
            [ "uuid"=>Str::uuid(), "name"=>"user1","role_id"=>"e8fa00ee-5f28-4277-857a-55763ed85515","email"=>"user1@insrance.com","password"=>Hash::make(123),"created_at"=>now(),"updated_at"=>now()],
            [ "uuid"=>Str::uuid(), "name"=>"user2","role_id"=>"e8fa00ee-5f28-4277-857a-55763ed85515","email"=>"user2@insrance.com","password"=>Hash::make(123),"created_at"=>now(),"updated_at"=>now()],
            [ "uuid"=>Str::uuid(), "name"=>"user3","role_id"=>"e8fa00ee-5f28-4277-857a-55763ed85515" ,"email"=>"user3@insrance.com","password"=>Hash::make(123),"created_at"=>now(),"updated_at"=>now()],
        ]);
    }
}
