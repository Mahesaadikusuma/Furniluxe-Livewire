<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
     use HasFactory, Sluggable;
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($category) {
            $category ->slug = SlugService::createSlug($category, 'slug', $category->name);
        });
    }


    public function getThumbnailUrl()
    {
        return Str::startsWith($this->thumbnail, ['http://', 'https://']) 
            ? $this->thumbnail 
            : asset(Storage::url($this->thumbnail));
    }


    /**
     * Get all of the product for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        // , 'category_id', 'id'
        return $this->hasMany(Product::class);
    }
}
