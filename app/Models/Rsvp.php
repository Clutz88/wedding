<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rsvp extends Model
{
    use HasUuids;

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class, 'rsvp_id');
    }
}
