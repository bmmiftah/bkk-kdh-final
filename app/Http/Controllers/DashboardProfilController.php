<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Jenis_kelamin;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth as auth;

class DashboardProfilController extends Controller
{
    public function index()
    {
        return view('DashboardProfil.index', [
            'user' => User::findOrFail(auth::id()),
            // 'jenis_kelamins' => Jenis_kelamin::all(),
            'title' => 'Profil Saya'
        ]);
    }

    public function edit(User $user)
    {
        // $profil = User::find(4)->profil();
        $profil = User::findOrFail(auth::id());
        $jenis_kelamin = Jenis_kelamin::all();
        // dd($tes);
        return view('DashboardProfil.personal.edit', [
            'user' => $profil,
            'jenis_kelamins' => $jenis_kelamin,
            'title' => "Edit Data Diri"
        ]);
    }

    

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'nik' => 'required|max:16|unique:users',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'sekolah' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'avatar' => 'file|max:1024'
        ];

        $validatedData = $request->validate($rules);
        // dd($validatedData);

        
        if($request->file('avatar')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['avatar'] = $request->file('avatar')->store('avatar-images');
        }
        
        User::where('id', auth::id())->update($validatedData);
        
        return redirect('/profil')->with('success', 'Profil telah terupdate!');
    }
}
