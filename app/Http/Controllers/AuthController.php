<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrasi(){
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|email:dns|unique:users',
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:5',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah digunakan',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 5 karakter',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 1
        ]);
        if ($user) {
            Notification::create([
                'created_for' => $user->id,
                'title' => 'Lengkapi Profile',
                'message' => 'Silahkan Lengkapi Profile Anda',
                'url' => '/profile',
                'read_at' => 0
            ]);
        }

        return redirect()->route('login')->with(['success' => 'Registrasi Berhasil! Silahkan Login']);
    }
    
    public function login(){
        return view('auth.login');
    }

    private function profileIsComplete()
    {
        $user = Auth::user();
        $requiredColumns = ['name', 'email', 'username', 'phone_number', 'birth_date', 'birth_place', 'gender', 'address', 'profile_pic', 'role_id'];
        foreach ($requiredColumns as $column) {
            if (empty($user->{$column})) {
                return false;
            }
        }
        return true;
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if (!$this->profileIsComplete()) {
                return redirect()->route('dashboard')->with(['lengkapiProfile' => 'Silahkan lengkapi Profile Anda!']);
            }

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
