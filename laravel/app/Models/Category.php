<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description'
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'category_has_news', 'category_id',
            'news_id');
    }
}
