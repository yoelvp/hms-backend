<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('rooms', function (Blueprint $table) {
      $table->id();
      $table->string('room_number');
      $table->string('loor_number');
      $table->string('number_beds');
      $table->string('bathroom_included');
      $table->string('hot_water');
      $table->string('tv_included');
      $table->string('availability');
      $table->string('type_room');
      $table->string('price_per_day');
      $table->string('price_per_hour');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('rooms');
  }
};
