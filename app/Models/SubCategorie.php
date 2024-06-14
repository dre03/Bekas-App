<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategorie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'categorie_id'];

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_categorie_id', 'id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
    
}
