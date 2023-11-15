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
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("role_id")->constrained("roles")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignUuid("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignUuid("permission_id")->constrained("permissions")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permission');
    }
};
