<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $keyType = 'string';

    public function rsvp(): BelongsTo
    {
        return $this->belongsTo(Rsvp::class);
    }

    protected function casts(): array
    {
        return [
            'id' => 'string',
            'dietary_requirements' => 'array',
        ];
    }
}
