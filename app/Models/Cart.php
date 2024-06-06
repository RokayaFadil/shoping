<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        
    ];

    public function product():BelongsTo 
    {
        return $this->belongsTo(related: Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
