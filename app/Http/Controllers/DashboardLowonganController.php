<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Lowongan::perusahaan());
        return view('dashboard.lowongan.index', [
            'lowongans' => Lowongan::all(),
            // 'perusahaan' => Perusahaan::all(),
            'title' => "Lowongan"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perusahaan = Perusahaan::all();

        return view('dashboard.lowongan.create', [
            'perusahaans' => $perusahaan,
            'title' => "Lowongan"
        ]);

        // $validatedData['excerpt'] = Str::limit(strip_tags($request->detail_lowongan), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $validateData = $request->validate([
            'title_lowongan' => 'required|max:255',
            'slug' => 'required|unique:lowongans',
            'perusahaan_id' => 'required',
            'tgl_buka' => 'required',
            'tgl_tutup' => 'required',
            'detail_lowongan' => 'required',
            'kriteria_lowongan' => 'required',
            
        ]);
        
        $validateData['excerpt'] = Str::limit(strip_tags($request->detail_lowongan), 200);
        $validateData['informasi_tambahan'] = $request->informasi_tambahan;
        // dd($validateData);
        
        Lowongan::create($validateData);

        return redirect('/dashboard/lowongan')->with('success', 'Lowongan baru telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
        return view('dashboard.lowongan.show', [
            'lowongans' => $lowongan,
            'title' => "Lowongan"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        $perusahaans = Perusahaan::all();

        return view('dashboard.lowongan.edit', [
            'lowongan' => $lowongan,
            'perusahaans' => $perusahaans,
            'title' => "Lowongan"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $rules = [
            'title_lowongan' => 'required|max:255',
            'perusahaan_id' => 'required',
            'tgl_buka' => 'required',
            'tgl_tutup' => 'required',
            'detail_lowongan' => 'required',
            'kriteria_lowongan' => 'required'
        ];

        if ($request->slug != $lowongan->slug) {
            $rules['slug'] = 'required|unique:lowongans';
        }

        $validatedData = $request->validate($rules);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->detail_lowongan), 200);

        Lowongan::where('id', $lowongan->id)->update($validatedData);

        return redirect('/dashboard/lowongan')->with('success', 'Lowongan telah terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        Lowongan::destroy($lowongan->id);

        return redirect('/dashboard/lowongan')->with('success', 'Lowongan telah dihapus!');
    }
    
    public function checkSlug(Request $request)             
    {
        $slug = SlugService::createSlug(Lowongan::class, 'slug', $request->title_lowongan);

        return response()->json(['slug' => $slug]);
    }
}
