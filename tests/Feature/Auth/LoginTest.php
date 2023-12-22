<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class LoginTest extends TestCase {
  /** @test */
  public function the_user_should_be_registered(): void {
    $loginData = [
      'email' => 'yoelvp73@gmail.com',
      'password' => '@Valverde'
    ];

    $response = $this->postJson('/api/v1/login', $loginData);

    $response->assertJsonStructure(['token', 'token_type']);
    $response->assertStatus(200);
  }
}
