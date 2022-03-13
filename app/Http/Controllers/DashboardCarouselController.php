<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Carousell.index', [
            'carousels' => Carousel::all(),
            'title' => "Carousell Informasi"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Carousell.create', [
            'title' => 'Tambah Carousell Informasi'
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
        $validatedData = $request->validate([
            'title_carousel' => 'required|max:255',
            'img_carousel' => 'required|file|max:1024' 
        ]);

        $validatedData['img_carousel'] = $request->file('img_carousel')->store('carousel-images');

        Carousel::create($validatedData);

        return redirect('/dashboard/carousell')->with('success', 'Carousell Informasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);

        return view('dashboard.Carousell.edit', [
            'carousel' => $carousel,
            'title' => 'Carousell'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title_carousel' => 'required|max:255',
            'img_carousel' => 'file|max:1024' 
        ];
        
        $validatedData = $request->validate($rules);

        if($request->file('img_carousel')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img_carousel'] = $request->file('img_carousel')->store('carousel-images');
        }

        Carousel::where('id', $id)->update($validatedData);

        return redirect('/dashboard/carousell')->with('success', 'Data Carousell Informasi telah terupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if ($carousel->img_carousel) {
        // }
        $carousel = Carousel::findOrFail($id);
        
        Storage::delete($carousel->img_carousel);

        Carousel::destroy($carousel->id);

        return redirect('/dashboard/carousell')->with('success', 'Data Carousell Informasi telah dihapus!');
    }
}
