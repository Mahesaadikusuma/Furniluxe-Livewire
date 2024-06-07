<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'product_id',
        'transaction_total',
        'tax',
        'transaction_status',
        'code',
        'qty',
    ];


     public function getCreatedAttribute()
    {
        // return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function getTotalPricedAttribute()
    {
    
        return  number_format($this->transaction_total, 0, ',', '.');
    }

    /**
     * Get all of the product for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(product::class, 'id', 'product_id');
    }

    /**
     * Get the user that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the transactionDetail associated with the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail(): HasOne
    {
        return $this->hasOne(TransactionDetail::class, 'transaction_id', 'id');
    }
}
