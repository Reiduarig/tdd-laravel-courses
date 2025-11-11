<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'tagline',
        'image',
        'learnings',
        'release_at',
    ];

    protected $casts = [
        'release_at' => 'datetime',
        'learnings' => 'array',
    ];

    public function scopeReleased(Builder $query): Builder
    {
        return $query->whereNotNull('release_at');
    }
}
