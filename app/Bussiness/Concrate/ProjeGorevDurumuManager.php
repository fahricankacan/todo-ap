<?php 


namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IProjeGorevDurmu;
use App\Models\ProjeGorevDurumu;
use App\Models\ProjeGorevleri;
use Illuminate\Database\Eloquent\Model;

class ProjeGorevDurumuManager implements IProjeGorevDurmu{

    public function CreateIfDefaultValuesDoesntExist(){

        $projeGorevleri = ProjeGorevDurumu::Create(
            ['gorev_durumu' =>'todo'],
            ['gorev_durumu'=>'inprogress'],
            ['gorev_durumu' =>'done']
        ); 
    }

}