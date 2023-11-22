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
        Schema::create('policies', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("policyno");
            $table->dateTime("start");
            $table->dateTime("end");
            $table->unsignedInteger("yearsno");
            $table->string("seller",250);
            $table->string("sid",50);
            $table->boolean("status")->default(true);
            $table->foreignUuid("company_id")->constrained("companies");
            $table->foreignUuid("inscustomer_id")->constrained("inscustomers");
            $table->foreignUuid("car_id")->constrained("cars");
            $table->foreignUuid("policytype_id")->constrained("policytypes");
            $table->decimal("primum",8,3)->default(0.000);
            $table->decimal("fees",8,3)->default(1.000);
            $table->decimal("issuefees",8,3)->default(0.000);
            $table->decimal("indoresment",8,3)->default(0.000);
            $table->decimal("total",8,3)->default(0.000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
