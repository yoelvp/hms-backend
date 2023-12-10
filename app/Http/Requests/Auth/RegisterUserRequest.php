<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest {
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array {
    return [
      'names' => 'required|string',
      'last_name' => 'required|string',
      'document_number' => 'required|string|max:8|unique:users',
      'phone_number' => 'required|string|max:9',
      'address' => 'required|string',
      'email' => 'required|string|email|min:5|unique:users',
      'password' => 'required|string'
    ];
  }
}
