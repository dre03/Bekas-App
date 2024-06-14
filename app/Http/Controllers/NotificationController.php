<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    function index($user_id){
        $notifications = Notification::where('created_for', $user_id)->get();
        return response()->json($notifications);
    }
}
