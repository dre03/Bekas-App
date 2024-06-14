<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'production_year', 'type', 'color', 'condition', 'price', 'description', 'user_id', 'sub_categorie_id', 'village_id', 'status_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subcategorie(){
        return $this->belongsTo(SubCategorie::class, 'sub_categorie_id', 'id');
    }
    public function images(){
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
    
    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
    
    public function offers()
    {
        return $this->hasMany(Offer::class, 'product_id', 'id');
    }

    public function statusProduct()
    {
        return $this->belongsTo(StatusProduct::class, 'status_id', 'id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }

}
