<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name",100);
            $table->string("arname",100);
            $table->string("address",350);
            $table->string("araddress",350);
            $table->string("tel",350);
            $table->string("image",350)->default('back.jpeg');
            $table->string("location")->nullable();
            $table->boolean("active")->default(true);
            $table->foreignUuid("companyservicetype_id")->constrained("companyservicetypes")-> onUpdate("cascade")->onDelete("cascade");

            // $table->foreignUuid("companyservicetype_id")->constrained("companyservicetypes")->references('uuid')->onUpdate("cascade")-> onDelete("cascade");
            $table->timestamps();
            // "uuid",
            // "name",
            // "image", 
            // "arname",
            // "address",
            // "araddress",
            // "companyservicetype_id" ,
            // "location" ,
            // "tel" ,
            // "araddress",
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
