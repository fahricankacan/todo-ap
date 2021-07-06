<?php

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\ISozlesmeService;
use App\Models\Musteri;
use App\Models\Proje;
use App\Models\Sozlesme;

class SozlesmeManager implements ISozlesmeService
{

    public function Add($request)
    {

        Sozlesme::Create([
            'proje_id' => $request->proje_id,
            'aciklama_metni' => $request->sozlesme_metni,
            'alim_tarihi' => $request->sozlesme_tarihi,
            'teslim_tarihi' => $request->teslim_tarihi,
            'proje_fiyat' => $request->proje_fiyat
        ]);
    }


    public function Update($request, $id)
    {
        Sozlesme::where('id', '=', $id)
            ->update([
                'proje_id' => $request->proje_id,
                'aciklama_metni' => $request->sozlesme_metni,
                'alim_tarihi' => $request->alim_tarihi,
                'teslim_tarihi' => $request->teslim_tarihi,
                'proje_fiyat' => $request->proje_fiyat
            ]);
    }

    public function Delete($id)
    {
        
        Sozlesme::destroy($id);
    }
    
    public function GetSozlesmeShowScreenDatas($id){

        $sozlesme=Sozlesme::find($id);
        $proje=Proje::where('id','=',$sozlesme->proje_id)->get();
        $musteri = Musteri::where('id','=',$proje[0]->musteri_id)->get();

        $sozlesmeData=[
            'proje_adi'=>$proje[0]-> proje_adi,
            'proje_id'=>$proje[0]->id,
            'proje_ucreti'=>$sozlesme->proje_fiyat,
            'sozlesme_alim_tarihi'=>$sozlesme->alim_tarihi,
            'sozlesme_teslim_tarihi'=>$sozlesme->teslim_tarihi,
            'sozlesme_aciklama_metni'=>$sozlesme->aciklama_metni,
            'musteri_adi'=>$musteri[0]->ad, 
            'musteri_soyad' =>$musteri[0]->soyad, 
            'musteri_il'=>$musteri[0]->il,
            'musteri_tel'=>$musteri[0]->tel_no,
            'musteri_ilce'=>$musteri[0]->ilce,
            'musteri_mail_adresi'=>$musteri[0]->mail_adresi
        ];

        return $sozlesmeData;
    }
}
