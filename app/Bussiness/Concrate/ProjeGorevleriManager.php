<?php

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IProjeGorevleri;
use App\Models\ProjeGorevleri;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProjeGorevleriManager implements IProjeGorevleri
{

    //proje id sine göre proje görevlerini döndürür
    public function GetAllProjectGorevlerWithPersonelName($id)
    {


        $result = DB::table('proje_gorevleris')
            ->join('personels', 'proje_gorevleris.personel_id', '=', 'personels.id')
            ->where('proje_gorevleris.proje_id', '=', $id)
            ->get();

        return $result;
    }

    public function GetAllProjects()
    {

        $result = ProjeGorevleri::all();
        return $result;
    }

    public function GetProjectWithId($id)
    {
        $result = ProjeGorevleri::find($id);

        return $result;
    }

    public function GetAllProjectsWithProjectId($id)
    {

        $result = ProjeGorevleri::where('proje_id', $id);

        return $result;
    }

    public function GetAllProjectsDurumsWithProjectId($id)
    {

        $result = DB::table('proje_gorevleris')->where('proje_id','=',$id);

        $first_column = DB::table('proje_gorevleris')->where('proje_id','=',$id)->where('proje_durum_id', '=', 1)->get();
        $second_column = DB::table('proje_gorevleris')->where('proje_id','=',$id)->where('proje_durum_id', '=', 2)->get();
        $third_column = DB::table('proje_gorevleris')->where('proje_id','=',$id)->where('proje_durum_id', '=', 3)->get();

        $arrayList = [
            'first_column' => $first_column,
            'second_column' => $second_column,
            'third_column' => $third_column
        ];
        return $arrayList;
    }


    function Add($request,$id){
        /*
        *!proje_durum_id'=>$id*/
        $result = ProjeGorevleri::create(
            array(
                'gorev_adi' => $request->gorev_adi,
                'gorev_aciklaması' => $request->gorev_aciklamasi,
                'alim_tarihi'=> date("Y-m-d H:i:s",time()),
                'teslim_tarihi' => $request->teslim_tarihi,
                'personel_id' => $request->personel_id,
                'proje_id'=>$id
            )
        );

        return array(
            'Succes' => "Personel eklendi."
        );
    }

    function Update($request,$id){

        
 
        //request array olarak dönüyor 
        $result = ProjeGorevleri::where('id', $id)->update(
            array(
                'gorev_adi' => $request['gorev_adi'],
                'gorev_aciklaması' => $request['gorev_aciklamasi'],            
                'teslim_tarihi' => date("Y-m-d H:i:s", strtotime($request['teslim_tarihi'])),//timestamp formatına dönüştürür
                'personel_id' => $request['personel_id'],             
            )
        );
    }
}
