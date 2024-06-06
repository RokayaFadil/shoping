<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'namecategorie',
        'imagecategorie',
        
    ];

    public function getImage($imagecategorie)
    {
        return asset($imagecategorie);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
