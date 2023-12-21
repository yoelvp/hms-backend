<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase {
  private User $user;

  public function setUp(): void {
    parent::setUp();
    $this->user = User::factory()->create();
  }

  /** @test */
  public function itCanLoginAUser(): void {
    $loginData = [
      'email' => 'yoelvp73@gmail.com',
      'password' => '@Valverde'
    ];

    $response = $this->postJson('/api/v1/login', $loginData);
    $response->assertStatus(200);
  }
}
