<?php

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IProjeDurumu;
use App\Models\ProjeDurum;

class ProjeDurumuManager implements IProjeDurumu{

    public function CreateProjectDurums(){

        
        $count = ProjeDurum::count();

        if ($count != 5) {
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

}