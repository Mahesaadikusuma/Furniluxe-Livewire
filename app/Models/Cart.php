<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'price',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // /**
    //  * Get all of the comments for the Cart
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    // }

    public function product()
    {
        // return $this->HasMany(Product::class, 'id', 'product_id');
        return $this->belongsTo(Product::class);
    }
}
