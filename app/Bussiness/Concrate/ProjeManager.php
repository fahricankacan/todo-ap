<?php

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IProjeService;
use App\Models\Musteri;
use App\Models\Proje;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProjeManager implements IProjeService
{

    public function GetAllProjects()
    {


        $AllProjects = Proje::all();
        return $AllProjects;
    }

    public function Add($request)
    {

        $result = Proje::create(
            array(
                'proje_adi' => $request->proje_adi,
                'proje_aciklamasi' => $request->proje_aciklamasi,
                'alim_tarihi' => $request->baslangic_tarihi,
                'teslim_tarihi' => $request->bitis_tarihi,
                'musteri_id' => $request->musteri_id,

            )
        );

        return array(
            'Succes' => "Proje eklendi."
        );
    }

    public function Update($proje, $id)
    {

        $musteriID=null;
        if($proje->edit_musteri_adi!="default"){

            $musteriID=$proje->edit_musteri_adi;
        }

        $proje = Proje::where('id', $id)->update(
            array(
                'proje_adi' => $proje->edit_proje_adi,
                'proje_aciklamasi' => $proje->edit_proje_aciklamasi,             
                'teslim_tarihi' => $proje->edit_proje_teslim_tarihi,
                'musteri_id' => $musteriID,          
            )
        );

        return array(
            'Succes' => "Proje güncellendi."
        );
    }

    public function Delete($proje)
    {
        $proje->delete();

        return array(
            'Succes' => "Proje silindi."
        );
    }

    public function GetById($id)
    {



        $result = Proje::find($id);
        return array(
            'Success' => "Proje getirild",
            'result' => $result

        );
    }

    public function GetProjectWithMusteriNameById($id)
    {

        $result = DB::table('projes')
            ->join('musteris', 'projes.musteri_id', '=', 'musteris.id')
            ->where('projes.id', '=', $id)
            ->get();

        return $result;
        /*
        $result = Proje::find($id);
        $musteri = Musteri::find($result->musteri_id);

        $newProjeArray =  array(

            'proje_adi' => $result->proje_adi,
            'proje_aciklamasi' => $result->proje_aciklamasi,
            'alim_tarihi' => $result->alim_tarihi,
            'teslim_tarihi' => $result->teslim_tarihi,
            'musteri_name' =>  $musteri->ad . " " . $musteri->soyad,
            'aktif_pasif' =>$result->aktif_pasif

        );

       return $newProjeArray;
       */
    }

    public function GetProjectWithMusteriName()
    {


        /*
        $proje=Proje::all();
        $a=0;
        foreach ($proje as $p ) {
            
            if(!empty(( $p->musteri->ad))){
                 echo $p->musteri->ad;
            }else{
               
            }
          
        }
        */


        // TODO:JOİN İŞLEMİ İLE YAP RELETİONSHİP İLE UĞRAŞMA 
        //$result = Proje::find(1)->musteri;

        // $result = DB::table('projes')
        //     ->join('musteris', 'projes.musteri_id', '=', 'musteris.id')
        //     //->orderBy('projes.id','asc')
        //     ->get();
        
        $result= Proje::all();

        return $result;
    }
}
