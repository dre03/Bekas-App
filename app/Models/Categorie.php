<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function subcategories()
    {
        return $this->hasMany(SubCategorie::class, 'categorie_id', 'id');
    }

}
