<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('bookings', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('room_id');
      $table->string('start_date');
      $table->string('end_date');
      $table->string('start_time');
      $table->string('end_time');
      $table->string('client_names');
      $table->string('client_surnames');
      $table->string('client_document_number');
      $table->string('client_phone_number');
      $table->string('client_address');

      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('room_id')->references('id')->on('rooms');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('bookings');
  }
};
