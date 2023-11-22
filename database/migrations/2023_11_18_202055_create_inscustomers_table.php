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
        Schema::create('inscustomers', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUlid("nationality_id")->constrained("nationalities");
            $table->foreignUlid("govern_area_id")->constrained("govern_areas");
            $table->foreignUlid("legalnationality_id")->constrained("nationalities")->references("id");
            $table->string("legalname",250);
            $table->string("legalid",50);
            $table->string("legaltel",50);
            $table->string("legalprofission",150);
            $table->string("name",150);
            $table->string("sid",50);
            $table->string("tel",50);
            $table->string("block",50);
            $table->string("street",250);
            $table->string("jadda",10);
            $table->string("house",50);
            $table->string("floor",50);
            $table->string("partment",50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscustomers');
    }
};
