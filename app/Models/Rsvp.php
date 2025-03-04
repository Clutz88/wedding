<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rsvp extends Model
{
    use HasUuids;

    public function guests(): BelongsToMany
    {
        return $this->belongsToMany(Guest::class, 'rsvp_guest', 'rsvp_id', 'guest_id');
    }
}
