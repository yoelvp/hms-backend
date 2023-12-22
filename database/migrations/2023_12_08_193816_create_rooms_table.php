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
      $table->boolean('bathroom_included');
      $table->boolean('hot_water');
      $table->boolean('tv_included');
      $table->boolean('availability');
      $table->string('type_room');
      $table->double('price_per_day', 8, 2);
      $table->double('price_per_hour', 8, 2);
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
