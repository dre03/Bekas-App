<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('pageFrontend.login');
    }

    public function authenticateUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email Wajid diisi',
            'password.required' => 'Email Wajid diisi'

        ]);

        if (Auth::attempt($credentials) && Auth::user()->role_id == 2) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        } else {
            Auth::logout();
            return redirect()->back()->with('error', 'Email atau password salah');
        }
        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function registrasi(Request $request)
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);
        return response()->json(['success' => 'Registrasi Berhasil! Silahkan Login']);
    }

    public function logout(Request $request)
    {
        if ($request->getMethod() === 'GET') {
            return redirect()->back()->with('error', 'Method not allowed.');
        }
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }


    // google
    // public function redirectGoogle(){
    //     return Socialite::driver('google')->redirect();
    // }

    // public function googleCallBack()
    // {
    //     try {
    //         // Mendapatkan data pengguna dari Google menggunakan Socialite
    //         $userG = Socialite::driver('google')->user();
    //         $user = User::where('email', $userG->email)->first();
    //         if ($user) {
    //             Auth::login($user);
    //             return redirect()->route('homePage');
    //         } else {
    //             $newUser = User::create([
    //                 'name' => $userG->name,
    //                 'username' => $userG->email,
    //                 'email' => $userG->email,
    //                 'role_id' => 2
    //             ]);
    //             Auth::login($newUser);
    //             return redirect()->route('homePage');
    //         }
    //     } catch (\Exception $e) {
    //         return redirect()->route('authUserlogin')->with('error', 'Terjadi Kesalahan Saat Mencoba Masuk Dengan Akun Google');
    //     }
        
    // }

    
}
