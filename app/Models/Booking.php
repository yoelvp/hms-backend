<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model {
  use HasFactory;

  /**
   * Relationship: belongs to User::class
   */
  public function user(): BelongsTo {
    return $this->belongsTo(User::class);
  }

  public function room(): BelongsTo {
    return $this->belongsTo(Room::class);
  }
}
