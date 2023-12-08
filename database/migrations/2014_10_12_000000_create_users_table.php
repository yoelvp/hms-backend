<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('names', 50)->nullable(false);
      $table->string('last_name', 50)->nullable(false);
      $table->string('document_number', 8)->unique()->nullable(false);
      $table->string('phone_number', 9)->nullable(false);
      $table->string('address', 120)->unique()->nullable(false);
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('users');
  }
};
