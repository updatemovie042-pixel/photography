<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['name', 'description', 'category', 'category_id', 'price', 'image', 'duration'])]
class Service extends Model
{
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function category_rel(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
