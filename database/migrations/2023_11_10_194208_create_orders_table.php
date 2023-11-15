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
        Schema::create('orders', function (Blueprint $table) {
            $table->string("id")->primary();
            $table->foreignUuid("customer_id")->constrained("customers")->onUpdate("cascade")->onDelete("cascade");
            // $table->foreignUuid("invoice_id")->nullable()->constrained("invoices")->onUpdate("cascade")->onDelete("cascade");
            $table->boolean("paied")->default(0);
            $table->decimal("totalprice",7,3);
            $table->string("reference_number",50)->nullable();
            $table->boolean("finished")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
