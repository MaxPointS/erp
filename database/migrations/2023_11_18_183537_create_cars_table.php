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
        Schema::create('cars', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("plate");
            $table->foreignUuid("carlicencetype_id")->constrained("carlicencetypes");
            $table->foreignUuid("carfactory_id")->constrained("carfactories");
            $table->foreignUuid("carfactoryclasse_id")->constrained("carfactoryclasses");
            $table->foreignUuid("carshape_id")->constrained("carshapes");
            $table->foreignUuid("carcolor_id")->constrained("carcolors");
            $table->foreignUuid("carfuel_id")->constrained("carfuels");
            $table->foreignUuid("carcondition_id")->constrained("carconditions");
            $table->integer("madeyear");
            $table->smallInteger("passangerno");
            $table->string("baseno")->nullable();
            $table->string("enginno");
            $table->integer("emptywieght")->nullable();
            $table->integer("loadedwieght")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
