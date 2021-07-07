<?php

namespace App\Http\Controllers;

use App\Bussiness\Abstract\IProjeGorevDurmu;
use App\Bussiness\Abstract\IProjeGorevleri;
use App\Http\Requests\PlanCreateRequest;
use Illuminate\Http\Request;
use App\Models\Proje;
use Carbon\Carbon;
use App\Models\Personel;
use App\Models\ProjeGorevleri;

class PlanController extends Controller
{

    protected $_projeGorevleriService;
    protected $_projeGorevDurumuService;
    function  __construct(IProjeGorevleri $projeGorevleri, IProjeGorevDurmu $gorevdurumu)
    {
        $this->_projeGorevleriService = $projeGorevleri;
        $this->_projeGorevDurumuService = $gorevdurumu;
    }

    public function index($id)
    {

        $result = $this->_projeGorevleriService->GetAllProjectsDurumsWithProjectId($id);
        $personeller = Personel::all();

        return view('plan.plan')
        ->with('bir', $result['first_column'])
        ->with('id', $id)
        ->with('iki', $result["second_column"])
        ->with('uc', $result['third_column'])
        ->with('personeller', $personeller);
    }


    public function a()
    {
        $this->_projeGorevDurumuService->CreateIfDefaultValuesDoesntExist();
        $projeler = Proje::all();

        return view('plan.projeler')->with('projeler', $projeler);
    }

    public function CreateNewCard(PlanCreateRequest $request,$projeId){

        
        $this->_projeGorevleriService->Add($request, $projeId);
        return "yeni kart eklendi"; // back()->withInput();
    }

     public function UpdateCard(Request $request,$id){

        // a array döner
        $a  =$request->all();

        $this->_projeGorevleriService->Update($a, $id);
        return response()->json(['success'=>'Got Simple Ajax Request.']);
     }

     public function GetPlanWithJson($id){

        $result = $this->_projeGorevleriService->GetProjectWithId($id);
        
        return  $result->toJson();
     }

     public function Delete(Request $request,$id){

         ProjeGorevleri::destroy($id);

         return response()->json(['success'=>'Başarı ile kart silindi.']);
     }


     public function CardDurumUpdate(Request $request){


        $this->_projeGorevleriService->UpdateDurumID($request);
    

        return response()->json(['success'=>'Got Simple Ajax Request.']);
     }
}