<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $admins = User::where('role_id', 1)->latest()->paginate(10);

        return view('pages.admin.index', [
            'title' => 'Admin',
            'admins' => $admins
        ]);
    }

    public function myProfile()
    {
        return view('pages.profile.index', []);
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:5',
            'password' => 'required|min:5|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 5 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            
        ]);

        $admin = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 1
        ]);
        if ($admin) {
            Notification::create([
                'created_for' => $admin->id,
                'title' => 'Lengkapi Profile',
                'message' => 'Silahkan Lengkapi Profile Anda',
                'url' => '/profile',
                'read_at' => 0
            ]);
        }
        return redirect()->route('admin')->with(['success' => 'Akun admin berhasl dibuat']);
    }

    public function updateProfile(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'username' => ['required', 'unique:users,username,' . auth()->id()],
                'gender' => 'required',
                'address' => 'required',
                'profile_pic' => 'image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'phone_number.required' => 'No Telpon wajib diisi',
                'username.required' => 'Username wajib diisi',
                'gender.required' => 'Jenis Kelamin wajib diisi',
                'address.required' => 'Alamat wajib diisi',
                'profile_pic.mimes' => 'Format File harus berupa jpeg,jpg,png',
            ]
        );

        $userId = Auth::user()->id;
        $user = User::find($userId);

        // Update data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;
        $user->gender = $request->gender;
        $user->address = $request->address;

        // Cek apakah ada file foto profil yang diunggah
        if ($request->hasFile('profile_pic')) {
            // Simpan foto profil yang baru dan dapatkan path-nya
            $profilePicPath = $request->file('profile_pic')->store('user-profile', 'public');
            // Hapus foto profil lama (jika ada)
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            // Simpan path foto profil yang baru ke dalam atribut pengguna
            $user->profile_pic = $profilePicPath;
        }
        // Simpan perubahan pada data pengguna
        $user->save();
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'currentPassword' => 'required',
                'newPassword' => 'required|min:5',
                'renewPassword' => 'required|same:newPassword',
            ],
            [
                'currentPassword.required' => 'Password lama wajib diisi',
                'newPassword.required' => 'Password baru wajib diisi',
                'renewPassword.required' => 'Konfirmasi password baru wajib diisi',
                'newPassword.min' => 'Password baru minimal harus 5 karakter',
                'renewPassword.same' => 'Konfirmasi password baru harus sama dengan password baru',
            ]
        );

        // Ambil pengguna yang sedang login
        $userId = Auth::user()->id;
        $user = User::find($userId);

        // Periksa apakah password lama sesuai
        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->with(['error' => 'Password lama tidak sesuai']);
        }

        // Update password pengguna
        $user->password = Hash::make($request->newPassword);
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
}
