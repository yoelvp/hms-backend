<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model {
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $guarded = [
    'id',
    'created_at',
    'updated_at'
  ];

  /**
   * Get all reservations for the room
   */
  public function bookings(): HasMany {
    return $this->hasMany(Booking::class);
  }
}
