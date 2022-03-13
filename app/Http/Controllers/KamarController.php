<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Http\Requests\StorekamarRequest;
use App\Http\Requests\UpdatekamarRequest;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kamar.index', [
            'kamar' => kamar::all()
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
     * @param  \App\Http\Requests\StorekamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kamar' => 'required',
            'jumlah_kamar' => 'required',
            'image' => 'required|image',   
        ]);

        $image = $request->file('image')->store('kamar');

        Kamar::create([
            'tipe_kamar' => $request->tipe_kamar,
            'jumlah_kamar' => $request->jumlah_kamar,
            'image' => $image
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(kamar $kamar)
    {
        return view('admin.kamar.edit', [
            'kamar' => Kamar::find($kamar->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekamarRequest  $request
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kamar $kamar)
    {
        $request->validate([
            'tipe_kamar' => 'required',
            'jumlah_kamar' => 'required',    
            'image' => 'image'
        ]);

        $image = $request->file('image');

        if (!$image) {
            $namaImage = $request->image_lama;        
        } else {

            $namaImage = $image->store('kamar');
            unlink('storage/' . $request->image_lama);
        }

        Kamar::find($kamar->id)->update([
            'tipe_kamar' => $request->tipe_kamar,
            'jumlah_kamar' => $request->jumlah_kamar,
            'image' => $namaImage
        ]);

        return redirect('/kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(kamar $kamar)
    {
        Kamar::destroy($kamar->id);

        return redirect('/kamar');
    }

    
}
