<?php


namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IBilgiBankasiActivity;
use App\Models\BilgiBankasi;
use App\Models\BilgiBankasiActivity;
use Illuminate\Database\Eloquent;

class BilgiBankasiActivityManager implements IBilgiBankasiActivity
{

    public function createBilgiBankasiActivityValues()
    {

        /**
         * todo: veri tabanında kayır varmı yokmu kontrol et eğer veri tabanı boşsa kayıt ekle  
         */
         $count = 0 ;
         $count=BilgiBankasiActivity::count();   

        if ($count != 3) {
            BilgiBankasiActivity::Create(
                ['activity' => "active"]
            );
            BilgiBankasiActivity::Create(
                ['activity' => "resolved"]
            );

            BilgiBankasiActivity::Create(
                ['activity' => "closed"]
            );
        }
    }
}
