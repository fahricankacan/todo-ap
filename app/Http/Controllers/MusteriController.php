<?php

namespace App\Http\Controllers;

use App\Models\Musteri;
use Illuminate\Http\Request;

class MusteriController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $musteriler = Musteri::all();
        return view('musteri.musteri',array(
            'musteriler'=>$musteriler
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('musteri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([

            'adi'=>'required',
            'soyad'=>'required',
            'telefon_numarasi'=>'required',
            'email'=>'required',
            'il'=>'required',
            'ilce'=>'required',

        ]);


        $musteri = Musteri::create(
            array(
            'ad'=>$request->input('adi'),
            'soyad'=>$request->input('soyad'),
            'tel_no'=>$request->input('telefon_numarasi'),
            'mail_adresi'=>$request->input('email'),
            'il'=>$request->input('il'),
            'ilce'=>$request->input('ilce'),
        ));


        return redirect('/musteri');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('musteri.show',[
            'musteri'=>Musteri::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $musteri = Musteri::find($id);

        return view('musteri.edit')->with('musteri',$musteri);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $musteri = Musteri::where('id',$id)
        ->update(
            [
                'ad'=>$request->input('adi'),
                'soyad'=>$request->input('soyad'),
                'tel_no'=>$request->input('telefon_numarasi'),
                'mail_adresi'=>$request->input('email'),
                'il'=>$request->input('il'),
                'ilce'=>$request->input('ilce'),
            ]
            );
        return redirect('/musteri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musteri $musteri)
    {
        $musteri->delete();
        return redirect('/musteri');
    }
}
