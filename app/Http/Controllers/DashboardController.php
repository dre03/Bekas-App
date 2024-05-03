<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $notif = $this->notif();
        $thisYear = now()->format('Y');
        $countProduct = Product::whereYear('created_at', $thisYear)->count();
        $countUser = User::where('role_id', 2)->whereYear('created_at', $thisYear)->count();
        $totalSales = Product::where('status_id', 2)->sum('price');
        $latestSales = Product::latest()->paginate(10);
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'countProduct' => $countProduct,
            'countUser' => $countUser,
            'totalSales' => $totalSales,
            'latestSales' => $latestSales,
            'notif' => $notif
        ]);
    }
}
