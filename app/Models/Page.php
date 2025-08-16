<?php

namespace App\Models;

use Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function seo(): HasOne
    {
        return $this->hasOne(PageSeo::class, 'page_id');
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return Cache::remember(
            key: "Page.$value.$field",
            ttl: 500,
            callback: fn () => $this->with('seo')->where($field, $value)->firstOrFail()
        );
    }
}
