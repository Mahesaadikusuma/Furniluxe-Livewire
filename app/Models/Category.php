<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'thumbnail'
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
                'source' => 'name',
                // 'onUpdate' => true,
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

   
}
