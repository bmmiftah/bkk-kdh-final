<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Pendaftaran;
use App\Models\Perusahaan;
use App\Models\User;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as auth;

class DashboardPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.pendaftaran.index', [
           'pendaftarans' => Pendaftaran::all(),
           'lowongans' => Lowongan::all(),
            'title' => "Pendaftaran",
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
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        $lowongans = Lowongan::all();
        $vaksin = Vaksin::all();
        
        return view('dashboard.pendaftaran.show', [
            'pendaftaran' => $pendaftaran,
            'title' => "Pendaftaran",
            'user' => User::findOrFail(auth::id()),
            'lowongan' => $lowongans,
            'vaksins' => $vaksin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        $lowongans = Lowongan::all();
        $vaksin = Vaksin::all();
        
        return view('dashboard.pendaftaran.edit', [
            'pendaftaran' => $pendaftaran,
            'title' => "Pendaftaran",
            'user' => User::findOrFail(auth::id()),
            'lowongan' => $lowongans,
            'vaksins' => $vaksin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        // dd($pendaftaran->status);
        if ($pendaftaran->status === 'Verifikasi Data') {
           $validatedData['status'] = 'Lolos Tahap Psikotes';
        }elseif ($pendaftaran->status === 'Lolos Tahap Psikotes') {
            $validatedData['status'] = 'Lolos Tahap Wawancara';
        }elseif ($pendaftaran->status === 'Lolos Tahap Wawancara') {
            $validatedData['status'] = 'Lolos Tahap MCU';
        }elseif ($pendaftaran->status === 'Lolos Tahap MCU') {
            $validatedData['status'] = 'Diterima';
        }


        // dd($pendaftaran->id);
        // $validatedData = $request->validate([
        //     'status' => 'required',
        // ]);

        // dd($validatedData);
        Pendaftaran::where('id', $pendaftaran->id)->update($validatedData);
        return redirect('/dashboard/pendaftaran')->with('success', 'Status pendaftaran telah diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        Pendaftaran::destroy($pendaftaran->id);

        return redirect('/dashboard/pendaftaran')->with('success', 'Data pendaftaran telah dihapus!');
    }
}
