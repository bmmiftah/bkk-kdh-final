<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth as auth;
use App\Models\User;
use App\Models\lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;


class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       return view('lowongan', [

        "title" => "Semua Lowongan",
        "perusahaans" =>Perusahaan::all(),
        // "lowongans" => Lowongan::latest()->paginate(4)->withQueryString()
        "lowongans" => Lowongan::latest()->filter(request(['search']))->paginate(3)->withQueryString()
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
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(lowongan $lowongan)
    {
            
        // $user = User::findOrFail(auth::id());

        
        return view('detail_lowongan', [
            "title" => 'Detail Lowongan',
            "detail_lowongan" => $lowongan,
            // "user"=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(lowongan $lowongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lowongan $lowongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(lowongan $lowongan)
    {
        //
    }
}

