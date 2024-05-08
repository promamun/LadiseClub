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
      Schema::create('member_member_category', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('member_category_id');
        $table->unsignedBigInteger('member_id');

        // Combine foreign key constraints into a single line
        $table->foreign('member_category_id')->references('id')->on('member_categories')->onDelete('cascade');
        $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_member_category');
    }
};
