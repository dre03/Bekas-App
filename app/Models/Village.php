<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'village_id', 'id');
    }

}
