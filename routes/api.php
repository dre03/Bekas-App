<?php

use App\Http\Controllers\NotificationController;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notification/{user_id}', [NotificationController::class, 'index'])->name('notif');

Route::prefix('province')->group(function () {
    Route::get('/', function () {
        $data = Province::all();
        return response()->json($data);
    });

    Route::get('/{id}', function ($id) {
        $data = Province::find($id);
        return response()->json($data);
    });

    Route::get('/search/{name}', function ($name) {
        $data = Province::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($data);
    });
});

Route::prefix('city')->group(function () {
    Route::get('/', function () {
        $data = City::all();
        return response()->json($data);
    });

    Route::get('/{id}', function ($id) {
        $data = City::find($id);
        return response()->json($data);
    });

    Route::get('/search/{name}', function ($name) {
        $data = City::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($data);
    });

    Route::get('/province/{id}', function ($id) {
        $data = City::where('province_id', '=', $id)->get();
        return response()->json($data);
    });
});

Route::prefix('district')->group(function () {
    Route::get('/', function () {
        $data = District::all();
        return response()->json($data);
    });

    Route::get('/{id}', function ($id) {
        $data = District::find($id);
        return response()->json($data);
    });

    Route::get('/search/{name}', function ($name) {
        $data = District::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($data);
    });

    Route::get('/city/{id}', function ($id) {
        $data = District::where('city_id', '=', $id)->get();
        return response()->json($data);
    });
});

Route::prefix('village')->group(function () {
    Route::get('/', function () {
        $data = Village::all();
        return response()->json($data);
    });

    Route::get('/{id}', function ($id) {
        $data = Village::find($id);
        return response()->json($data);
    });

    Route::get('/search/{name}', function ($name) {
        $data = Village::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($data);
    });

    Route::get('/district/{id}', function ($id) {
        $data = Village::where('district_id', '=', $id)->get();
        return response()->json($data);
    });
});