<?php

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IProjeDurumu;
use App\Models\Proje;
use App\Models\ProjeDurum;
use App\Models\Sozlesme;

class ProjeDurumuManager implements IProjeDurumu{

    public function CreateProjectDurums(){

        
        $count = ProjeDurum::count();

        if ($count < 5) {
             ProjeDurum::Create(
                ['durum' => 'yapım_aşamasında']
            );

            ProjeDurum::Create(
                ['durum' => 'beklemede']
            );
            ProjeDurum::Create(
                ['durum' => 'bitti']
            );
            ProjeDurum::Create(
                ['durum' => 'odenmis']
            );
            ProjeDurum::Create(
                ['durum' => 'odenmemis']
            );
            ProjeDurum::Create(
                ['durum' => 'iptal']
            );
        }
    }

    public function Update($request, $id){

        if(($request->sayfa=="proje")){
            $projeID = $id;
            $projeDurumID=$request->p_durum;
        }else{
            $proje = Sozlesme::find($id);
            $projeID = $proje->proje_id;
            $projeDurumID=$request->durum;
        }
        
        //$projeDurumID =Proje::find($projeID)->proje_durum_id;
        Proje::where('id', '=', $projeID)
        ->update([
            'proje_durum_id'=>$request->durum
        ]);
    }

}