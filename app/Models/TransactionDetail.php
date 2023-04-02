<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_code',
        'product_code',
        'price',
        'discount',
        'total_amount',
        'quantity',
    ];
}