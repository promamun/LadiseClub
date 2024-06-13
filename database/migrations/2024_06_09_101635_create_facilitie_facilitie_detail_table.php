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
    Schema::create('facilitie_facilitie_detail', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('facilitie_id');
      $table->unsignedBigInteger('facilitie_detail_id');

      // Combine foreign key constraints into a single line
      $table->foreign('facilitie_id')->references('id')->on('facilities')->onDelete('cascade');
      $table->foreign('facilitie_detail_id')->references('id')->on('facilitie_details')->onDelete('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('facilitie_facilitie_detail');
  }
};
