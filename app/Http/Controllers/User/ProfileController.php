<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $products = Product::where('user_id', $userId)->get();

        return view('website.profile.index', [
            'title' => 'Profile',
            'products' => $products,
        ]);
    }

    public function edit(){
        return view('website.profile.edit', ['title' => 'Edit Profile']);
    }

    public function update(Request $request)
    {
    $request->validate(
            [
                'name' => 'required',
                'username' => ['required', 'unique:users,username,' . auth()->id()],
                'email' => ['required', 'unique:users,email,' . auth()->id()],
                'phone_number' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'currentPassword' => 'nullable',
                'newPassword' => 'nullable|min:5',
                'renewPassword' => 'same:newPassword',
                'profile_pic' => 'image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'username.required' => 'Username tidak boleh kosong',
                'phone_number.required' => 'No Telpon tidak boleh kosong',
                'phone_number.numeric' => 'No Telpon harus berupa angka',
                'email.required' => 'Email tidak boleh kosong',
                'email.unique' => 'Email sudah digunakan',
                'gender.required' => 'Jenis Kelamin tidak boleh kosong',
                'address.required' => 'Alamat tidak boleh kosong',
                'newPassword.min' => 'Password baru minimal harus 5 karakter',
                'renewPassword.same' => 'Konfirmasi password harus sama dengan password baru',
                'profile_pic.mimes' => 'Format file harus berupa jpeg, jpg, png',
            ]
        );
        $userId = Auth::user()->id;
        $user = User::find($userId);
        // Update data pengguna
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->address = $request->address;

        // Periksa apakah password lama sesuai
        if ($request->filled('currentPassword') && !Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'Password lama tidak sesuai']);
        }

        // Update password hanya jika newPassword diisi
        if ($request->filled('newPassword')) {
            $user->password = Hash::make($request->newPassword);
        }

        // Cek apakah ada file foto profil yang diunggah
        if ($request->hasFile('profile_pic')) {
            // Simpan foto profil yang baru dan dapatkan path-nya
            $profilePicPath = $request->file('profile_pic')->store('user-profile', 'public');
            // Hapus foto profil lama (jika ada)
            if ($user->profile_pic) {
                Storage::delete('public/' . $user->profile_pic);
            }
            // Simpan path foto profil yang baru ke dalam atribut pengguna
            $user->profile_pic = $profilePicPath;
        }
        // Simpan perubahan pada data pengguna
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }


    public function seller($id)
    {
        $user = User::find($id);
        $products = Product::where('status_id', 1)->where('user_id', $id)->latest()->get();
        $noProducts = $products->isEmpty();
        return view('website.profile.seller',[
                'title' => 'Profile Seller',
                'products' => $products,
                'noProducts' => $noProducts,
                'user' => $user
            ]);
    }

}
