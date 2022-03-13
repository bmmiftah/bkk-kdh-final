<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth as auth;

class DataVaksinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardProfil.index', [
            'user' => User::findOrFail(auth::id()),
            // 'jenis_kelamins' => Jenis_kelamin::all(),
            'title' => 'My Profil'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vaksin  $vaksin
     * @return \Illuminate\Http\Response
     */
    public function show(vaksin $vaksin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vaksin  $vaksin
     * @return \Illuminate\Http\Response
     */
    public function edit(vaksin $vaksin)
    {
        $profil = User::findOrFail(auth::id());
        $vaksin = vaksin::all();

        return view('dashboardProfil.vaksin.edit', [
            'user' => $profil,
            'vaksins' => $vaksin,
            'title' => "Edit Data Vaksinasi"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vaksin  $vaksin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vaksin $vaksin)
    {
        $rules = [
            'jenis_vaksin_1' => 'required',
            'tgl_vaksin_1' => 'required',
            'kota_vaksin_1' => 'required',
            'img_bukti_1' => 'required|file|max:1024',
            'jenis_vaksin_2' => 'required',
            'tgl_vaksin_2' => 'required',
            'kota_vaksin_2' => 'required',
            'img_bukti_2' => 'required|file|max:1024'
        ];

        $validatedData = $request->validate($rules);
        // dd($validatedData);

        
        if($request->file('img_bukti_1')) {
            if($request->oldImg_bukti_1) {
                Storage::delete($request->oldImg_bukti_1);
            }
            $validatedData['img_bukti_1'] = $request->file('img_bukti_1')->store('img_bukti_1-images');
        }

        if($request->file('img_bukti_2')) {
            if($request->oldImg_bukti_2) {
                Storage::delete($request->oldImg_bukti_2);
            }
            $validatedData['img_bukti_2'] = $request->file('img_bukti_2')->store('img_bukti_2-images');
        }
        
        User::where('id', auth::id())->update($validatedData);
        
        return redirect('/profil')->with('success', 'Data vaksin telah terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vaksin  $vaksin
     * @return \Illuminate\Http\Response
     */
    public function destroy(vaksin $vaksin)
    {
        //
    }
}
