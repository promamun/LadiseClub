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
      Schema::create('permission_role', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('permission_id');
        $table->unsignedBigInteger('role_id');
        // Relation permission
        $table->foreign('permission_id')->references('id')->on('permissions')->cascadeOnDelete()->cascadeOnDelete();
        // Relation Role
        $table->foreign('role_id')->references('id')->on('roles')->cascadeOnDelete()->cascadeOnDelete();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('permission_role');
    }
};
