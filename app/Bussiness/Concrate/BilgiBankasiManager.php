<?php

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IBilgiBankasi;
use App\Models\BilgiBankasi;
use GuzzleHttp\Psr7\Request;

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

        $bilgiRepo=[
            'active'=>$active,
            'resolved'=>$resolved,
            'closed'=>$closed,

        ];

        return $bilgiRepo;
    }


    public function UpdateToSolvedOrClosded($data,$id){

       
        BilgiBankasi::where('id','=',$id)->update(['activity_id'=>$data["durum"]]);
    }

}
