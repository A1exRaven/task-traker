<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
      'id',
      'title',
      'description',
      'status',
      'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
