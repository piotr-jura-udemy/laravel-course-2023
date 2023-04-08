<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->withCount('reviews')
            ->orderBy('reviews_count', 'desc');
    }

    public function scopeHighestRated(Builder $query): Builder
    {
        return $query->withAvg('reviews', 'rating')
            ->orderBy('reviews_avg_rating', 'desc');
    }
}