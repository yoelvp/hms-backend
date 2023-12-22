<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRoomRequest extends FormRequest {
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array {
    return [
      'room_number' => 'required|string',
      'loor_number' => 'required|string',
      'number_beds' => 'required|string',
      'bathroom_included' => 'required|bool',
      'hot_water' => 'required|bool',
      'tv_included' => 'required|bool',
      'availability' => 'required|bool',
      'type_room' => 'required|string',
      'price_per_day' => 'required|numeric',
      'price_per_hour' => 'required|numeric',
    ];
  }
}
