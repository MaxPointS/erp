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
        Schema::create('services', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("company_id")->constrained("companies")-> onUpdate("cascade")->onDelete("cascade");
            $table->string("name",100);
            $table->string("arname",100);
            $table->string("description",350);
            $table->string("ardescription",350);
            $table->decimal("priceBefore",7,3,true);
            $table->decimal("price",7,3,true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
