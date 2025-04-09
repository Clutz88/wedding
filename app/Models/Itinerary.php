<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'time' => 'datetime',
        ];
    }

    protected function time(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->asDateTime($value)->format('H:i')
        );
    }
}
