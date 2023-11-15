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
        Schema::create('govern_areas', function (Blueprint $table) {
            $table->uuid("id")->primary() ;
            $table->string("name",50);
            $table->string("arname",100);
            $table->foreignUuid("govern_id")->constrained("governs")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('govern_areas');
    }
};
