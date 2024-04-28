<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class News extends Model
{
    use HasSlug;

    protected $table='News';
    protected $fillable =
        [
            'title',
            'body',
            'slug',
            'like',
            'view_count',
            'Book_id',
            'category_id'
        ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function Book()
    {
        return $this->hasOne(Books::class,'id','Book_id');
    }

    public function category()
    {
        return $this->hasOne(Categories::class,'id','category_id');
    }
}
