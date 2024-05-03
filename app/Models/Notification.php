<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['created_for', 'title', 'message', 'url', 'read_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_for', 'id');
    }


}
