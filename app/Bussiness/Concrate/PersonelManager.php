<?php

namespace App\Bussiness\Concrate;


use App\Bussiness\Abstract\IPersonelService;
use App\Models\Personel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PersonelManager implements IPersonelService
{

    public function GetAllProjects()
    {
    }

    public function Add($request)
    {

        $result = Personel::create(
            array(
                'ad' => $request->ad,
                'soyad' => $request->soyad,
                'tel_no' => $request->tel_no,
                'mail_adresi' => $request->mail_adresi
            )
        );

        return array(
            'Succes' => "Personel eklendi."
        );
    }
    public function Delete($request)
    {
        
        $request->delete();
    }
    public function Update($proje, $id)
    {

        $result = Personel::where('id', $id)->update(
            array(
                'ad' => $proje->ad,
                'soyad' => $proje->soyad,
                'tel_no' => $proje->tel_no,
                'mail_adresi' => $proje->mail_adresi
            )
        );

        return array(
            'Succes' => 'Proje güncellendi.'
        );
    }
    public function GetById($id)
    {
        $result = Personel::find($id);

        return $result;
    }
}
