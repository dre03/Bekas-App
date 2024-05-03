<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $notif = $this->notif();
        return view('pages.profile.index',[
            'notif' => $notif
        ]);
    }

    public function updateProfile(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'username' => ['required', 'unique:users,username,' . auth()->id()],
                'birth_date' => 'required',
                'birth_place' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'profile' => 'image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'phone_number.required' => 'No Telpon wajib diisi',
                'username.required' => 'Username wajib diisi',
                'birth_date.required' => 'Tanggal lahir Kelamin wajib diisi',
                'birth_place.required' => 'Temat Lahir wajib diisi',
                'gender.required' => 'Jenis Kelamin wajib diisi',
                'address.required' => 'Alamat wajib diisi',
            ]
        );

        $userId = Auth::id();
        $user = User::find($userId);

        //check if image is uploaded
        if ($request->hasFile('profile')) {

            //upload new image
            $profile = $request->file('profile');
            $profile->storeAs('public/users', $profile->hashName());

            //delete old profile
            Storage::delete('public/users/' . $user->profile);

            //update user with new image
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'username' => $request->username,
                'birth_date' => $request->birth_date,
                'birth_place' => $request->birth_place,
                'gender' => $request->gender,
                'address' => $request->address,
                'profile' => $profile->hashName(),
            ]);
        } else {

            //update user without image
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'username' => $request->username,
                'birth_date' => $request->birth_date,
                'birth_place' => $request->birth_place,
                'gender' => $request->gender,
                'address' => $request->address,
            ]);
        }

        //redirect to index
        return redirect()->route('profile')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
