<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guest extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $keyType = 'string';

    public function rsvps(): BelongsToMany
    {
        return $this->belongsToMany(Rsvp::class, 'rsvp_guest', 'guest_id', 'rsvp_id');
    }

    protected function casts(): array
    {
        return [
            'id' => 'string',
            'dietary_requirements' => 'array',
        ];
    }
}
