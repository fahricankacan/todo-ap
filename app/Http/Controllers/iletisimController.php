<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Personel;

class iletisimController extends Controller
{
    
    public function index()
    {
        return view('iletisim.iletisim');
    }

    public function musteri(){
       
        return view('iletisim.iletisim_musteri')->with("musteriler",Musteri::all());
    }
    public function personel(){

        return view('iletisim.iletisim_calisan')->with("musteriler",Personel::all());
    }
    public function custom(){
        return view('iletisim.iletisim_custom');
    }
}
