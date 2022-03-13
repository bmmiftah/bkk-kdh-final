<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.perusahaan.index', [
            'perusahaans' => Perusahaan::all(),
            'title' => "Perusahaan"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.perusahaan.create', [
            'title' => "Perusahaan"
        ]);
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
            'nama_perusahaan' => 'required|max:255',
            'slug' => 'required|unique:perusahaans',
            'detail_perusahaan' => 'required'
        ]);

        $validateData['nama_perusahaan']=Str::upper($validateData['nama_perusahaan']);

        Perusahaan::create($validateData);

        return redirect('/dashboard/perusahaan')->with('success', 'Perusahaan Baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaan.edit', [
            'perusahaan' => $perusahaan,
            'title' => 'Perusahaan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $rules = [
            'nama_perusahaan' => 'required|max:255',
            'detail_perusahaan' => 'required'
        ];

        if ($request->slug != $perusahaan->slug) {
            $rules['slug'] = 'required|unique:perusahaans';
        }

        
        $validatedData = $request->validate($rules);
        
        $validatedData['nama_perusahaan']=Str::upper($validatedData['nama_perusahaan']);
        
        Perusahaan::where('id', $perusahaan->id)->update($validatedData);

        return redirect('/dashboard/perusahaan')->with('success', 'Perusahaan telah terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $perusahaan)
    {
        
    }

    public function checkSlug(Request $request)             
    {
        $slug = SlugService::createSlug(Perusahaan::class, 'slug', $request->nama_perusahaan);

        return response()->json(['slug' => $slug]);
    }
}
