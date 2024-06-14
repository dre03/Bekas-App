<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    protected function notif()
    {
        // Memeriksa apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            $user = Auth::user()->id;
            $notif = Notification::where('created_for', $user)->get();
            return $notif;
        }
        return []; // Mengembalikan array kosong jika pengguna belum terautentikasi
    }
}
