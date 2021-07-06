<?php


namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IProjeGorevDurmu;
use App\Models\ProjeGorevDurumu;
use App\Models\ProjeGorevleri;
use Illuminate\Database\Eloquent\Model;

class ProjeGorevDurumuManager implements IProjeGorevDurmu
{

    public function CreateIfDefaultValuesDoesntExist()
    {


        $count = ProjeGorevDurumu::count();

        if ($count != 3) {
            $projeGorevleri = ProjeGorevDurumu::Create(
                ['durum' => 'todo']
            );

            ProjeGorevDurumu::Create(
                ['durum' => 'inprogress']
            );
            ProjeGorevDurumu::Create(
                ['durum' => 'done']
            );
        }
    }
}
