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
        Schema::create('policycondetions', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("arname");
            $table->boolean("status")->default(true);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policycondetions');
    }
};
