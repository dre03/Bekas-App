<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProduct extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    public function products()
    {
        return $this->hasMany(Product::class, 'status_id', 'id');
    }
}
