<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // public function index()
    // {
    //     return view('pages.profile.index', [
    //     ]);
    // }

    // public function updateProfile(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'name' => 'required',
    //             'email' => 'required',
    //             'phone_number' => 'required',
    //             'username' => ['required', 'unique:users,username,' . auth()->id()],
    //             'birth_date' => 'required',
    //             'birth_place' => 'required',
    //             'gender' => 'required',
    //             'address' => 'required',
    //             'profile_pic' => 'image|mimes:jpeg,jpg,png|max:2048',
    //         ],
    //         [
    //             'name.required' => 'Nama wajib diisi',
    //             'email.required' => 'Email wajib diisi',
    //             'phone_number.required' => 'No Telpon wajib diisi',
    //             'username.required' => 'Username wajib diisi',
    //             'birth_date.required' => 'Tanggal lahir Kelamin wajib diisi',
    //             'birth_place.required' => 'Temat Lahir wajib diisi',
    //             'gender.required' => 'Jenis Kelamin wajib diisi',
    //             'address.required' => 'Alamat wajib diisi',
    //             'profile_pic.mimes' => 'Format File harus berupa jpeg,jpg,png',
    //         ]
    //     );

    //     $userId = Auth::user()->id;
    //     $user = User::find($userId);

    //     // Update data pengguna
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phone_number = $request->phone_number;
    //     $user->username = $request->username;
    //     $user->birth_date = $request->birth_date;
    //     $user->birth_place = $request->birth_place;
    //     $user->gender = $request->gender;
    //     $user->address = $request->address;

    //     // Cek apakah ada file foto profil yang diunggah
    //     if ($request->hasFile('profile_pic')) {
    //         // Simpan foto profil yang baru dan dapatkan path-nya
    //         $profilePicPath = $request->file('profile_pic')->store('user-profile', 'public');
    //         // Hapus foto profil lama (jika ada)
    //         if ($user->profile_pic) {
    //             Storage::disk('public')->delete($user->profile_pic);
    //         }
    //         // Simpan path foto profil yang baru ke dalam atribut pengguna
    //         $user->profile_pic = $profilePicPath;
    //     }
    //     // Simpan perubahan pada data pengguna
    //     $user->save();
    //     return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    // }

    // public function updatePassword(Request $request)
    // {
    //     // Validasi input
    //     $request->validate(
    //         [
    //             'currentPassword' => 'required',
    //             'newPassword' => 'required|min:6',
    //             'renewPassword' => 'required|same:newPassword',
    //         ],
    //         [
    //             'currentPassword.required' => 'Password lama wajib diisi',
    //             'newPassword.required' => 'Password baru wajib diisi',
    //             'renewPassword.required' => 'Konfirmasi password baru wajib diisi',
    //             'newPassword.min' => 'Password baru minimal harus 6 karakter',
    //             'renewPassword.same' => 'Konfirmasi password baru harus sama dengan password baru',
    //         ]
    //     );

    //     // Ambil pengguna yang sedang login
    //     $userId = Auth::user()->id;
    //     $user = User::find($userId);

    //     // Periksa apakah password lama sesuai
    //     if (!Hash::check($request->currentPassword, $user->password)) {
    //         return redirect()->back()->with(['error' => 'Password lama tidak sesuai']);
    //     }

    //     // Update password pengguna
    //     $user->password = Hash::make($request->newPassword);
    //     $user->save();

    //     // Redirect dengan pesan sukses
    //     return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    // }
}
