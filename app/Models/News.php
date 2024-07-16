<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    Spatie\Sluggable\HasSlug,
    Spatie\Sluggable\SlugOptions;

class News extends Model
{
    use HasSlug;

    protected $table='News' ;
    protected $fillable =
        [
            'title',
            'body',
            'slug',
            'like',
            'view_count',
            'Book_id',
            'image',
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

    public function token()
    {
        return $this->hasOne(Books::class,'id','Book_id');
    }

    public function category()
    {
        return $this->hasOne(Categories::class,'id','category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class,'news_id','id');
    }
}

