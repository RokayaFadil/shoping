<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameproduct',
        'description',
        'imageproduct',
        'price',
        'categorie_id',
    ];

    public function getImage($imageproduct)
    {
        return asset($imageproduct);
    }

    public function categorie():BelongsTo 
    {
        return $this->belongsTo(related: Categorie::class);
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
