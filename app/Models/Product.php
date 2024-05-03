<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'production_year', 'type', 'color', 'condition', 'price', 'description', 'user_id', 'categorie_id', 'image_id', 'status_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
    public function image(){
        return $this->hasMany(Image::class, 'image_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'product_id', 'id');
    }

    public function statusProduct()
    {
        return $this->belongsTo(StatusProduct::class, 'status_id', 'id');
    }
}
