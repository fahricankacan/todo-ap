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
        $fileName = $request->dosya_yolu->getClientOriginalName();
        $fileNameWithUpperFile=$request->dosya_yolu->storeAs('dosyalar', $request->dosya_yolu->getClientOriginalName());

        //dd(Personel::latest()->first());

        Dosya::Create(
            [
                'dosya_adi' => $fileName,
                'dosya_yolu' => storage_path("app/public/" . $fileNameWithUpperFile)
            ]
        );

        BilgiBankasi::Create(
            [
                'baslik' => $request->bilgi_basligi,
                'aciklama' => $request->bilgi_aciklama,
                'personel_id' => $request->selected_personel,
                'dosya_id' => Dosya::latest()->first(),
                'proje_id' => $id

            ]
        );
    }
}
