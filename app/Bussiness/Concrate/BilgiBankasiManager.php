<?php

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IBilgiBankasi;
use App\Models\BilgiBankasi;
use App\Models\Dosya;
use GuzzleHttp\Psr7\Request;
use App\Models\Personel;

class BilgiBankasiManager implements IBilgiBankasi
{

    /**
     * proje id sini alır ve bilgilerin çözüm durumuna göre 3 farklı arraya içeren bir array döndürür.
     */
    public function GetBilgilerByProjectID($project_id)
    {
        $active = BilgiBankasi::where('proje_id', '=', $project_id)->where('activity_id', '=', '1')->get();
        $resolved = BilgiBankasi::where('proje_id', '=', $project_id)->where('activity_id', '=', '2')->get();
        $closed = BilgiBankasi::where('proje_id', '=', $project_id)->where('activity_id', '=', '3')->get();

        $bilgiRepo = [
            'active' => $active,
            'resolved' => $resolved,
            'closed' => $closed,

        ];

        return $bilgiRepo;
    }


    public function UpdateToSolvedOrClosded($data, $id)
    {


        BilgiBankasi::where('id', '=', $id)->update(['activity_id' => $data["durum"]]);
    }


    public function AddBilgi($request, $id)
    {
        $sonDosya=null;
        if(!empty($request->file())){
            $sonDosyaID=$this->DosyaEkle($request)->id;
        }

        $sonDosya = BilgiBankasi::find($id)->dosya_id;

        //dd(Personel::latest()->first());

        BilgiBankasi::Create(
            [
                'baslik' => $request->bilgi_basligi,
                'aciklama' => $request->bilgi_aciklama,
                'personel_id' => $request->selected_personel,
                'dosya_id' => $sonDosya,
                'proje_id' => $id

            ]
        );
    }


    public function UpdateBilgi($request, $id){
        
     //  $dosya= $request->file();
        $sonDosya=null;
        if(!empty($request->file())){
            $sonDosyaID=$this->DosyaEkle($request)->id;
        }
       
        $sonDosya = BilgiBankasi::find($id)->dosya_id;

        $bilgi=BilgiBankasi::where('id','=',$id)->update(
            [
                'baslik'=>$request->baslik,
                'aciklama'=>$request->acilama,
                'personel_id' =>$request->personel_sec,
                'dosya_id' =>$sonDosya,
            ]
        );
       //protected $fillable = ['id','proje_id','dosya_id','baslik','aciklama','activity_id',"personel_id"];

    }


    /**
     * Requestten gelen dosyayı storage/dosyalar klasörüne kayıt eder 
     * Dosyalar veri tabanına kayıt atar ve son eklenen rowu döndürür
     */
    private function DosyaEkle($request)
    {
        $fileName = $request->dosya_ekle->getClientOriginalName();
        $fileNameWithUpperFile=$request->dosya_ekle->storeAs('dosyalar', $request->dosya_ekle->getClientOriginalName());

        Dosya::Create(
            [
                'dosya_adi' => $fileName,
                'dosya_yolu' => storage_path("app/public/" . $fileNameWithUpperFile)
            ]
        );

        return Dosya::latest()->first();
    }
}
