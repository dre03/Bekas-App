<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $notif = $this->notif();
        $customers = User::where('role_id', 2)->latest()->paginate(10);
        return view('pages.customer.index', [
            'notif' => $notif,
            'title' => 'Pengguna',
            'customers' => $customers,
        ]);
    }
}
