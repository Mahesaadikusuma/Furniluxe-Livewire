<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $table = 'transaction_details';

    protected $fillable = [
        'transaction_id',
        'review_id',
        'resi',
        'shipping',
    ];

    
}
