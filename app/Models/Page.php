<?php

namespace App\Models;

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
}
