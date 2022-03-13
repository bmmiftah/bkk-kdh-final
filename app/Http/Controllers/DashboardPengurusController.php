<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengurus.index', [
            'penguruses' => Pengurus::all(),
            'title' => "Pengurus"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengurus.create', [
            'title' => "Tambah Pengurus"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'img_pengurus' => 'required|file|max:1024'
        ]);

        $validatedData['img_pengurus'] = $request->file('img_pengurus')->store('pengurus-images');

        Pengurus::create($validatedData);

        return redirect('/dashboard/pengurus')->with('success', 'Pengurus berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        // dd($pengurus);
        return view('dashboard.pengurus.edit', [
            'pengurus' => $pengurus,
            'title' => 'Pengurus'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        
        if($request->file('img_pengurus')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img_pengurus'] = $request->file('img_pengurus')->store('pengurus-images');
        }

        // dd(Pengurus::where('id', $id)->update($validatedData));
        
        Pengurus::where('id', $id)->update($validatedData);

        return redirect('/dashboard/pengurus')->with('success', 'Data Pengurus telah terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if ($carousel->img_carousel) {
        // }

        $pengurus = Pengurus::findOrFail($id);

        Storage::delete($pengurus->img_pengurus);

        Pengurus::destroy($pengurus->id);

        return redirect('/dashboard/pengurus')->with('success', 'Data pengurus telah dihapus!');
    }
}
