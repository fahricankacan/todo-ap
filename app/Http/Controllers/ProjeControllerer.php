<?php

namespace App\Http\Controllers;

use App\Bussiness\Abstract\IMusteriService;
use App\Bussiness\Abstract\IProjeService;
use App\Bussiness\Deneme;
use App\Bussiness\IDeneme;
use App\Http\Requests\ProjeControllerRequest;
use App\Http\Requests\ProjeControllerStoreRequest;
use App\Models\Musteri;
use App\Models\Proje;
use App\Models\Sozlesme;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class ProjeControllerer extends Controller
{


    protected $_projeService;
    protected $_musteriService;

    function  __construct(IProjeService $projeService, IMusteriService $musteriService)
    {

        $this->_projeService = $projeService;
        $this->_musteriService = $musteriService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // dd(Proje::find(1)->musteri->ad);
        $projeler = $this->_projeService->GetProjectWithMusteriName();


        return view('proje.proje')->with('projeler', $projeler)->with('musteriler', Musteri::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('proje.create')->with('musteriler', Musteri::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjeControllerStoreRequest $request)
    {
        // $validate = $request->validate(
        //     [
        //         'proje_adi' => 'required',
        //         'proje_aciklamasi' => 'required',
        //         'baslangic_tarihi' => 'required',
        //         'teslim_tarihi' => 'required',
        //         'musteri_id' => 'required',
        //         'proje_fiyat'=> 'required|regex:/^\d+(\.\d{1,2})?$/'
        //     ]
        // );

        $validated = $request->validated();
        $sa = $this->_projeService->Add($request);

        return redirect('/proje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proje = Proje::find($id);

        return $proje->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proje = $this->_projeService->GetProjectWithMusteriNameById($id); //Proje::find($id);
        //dd($proje);
        // print_r($proje[0]->proje_adi);
        return view('proje.edit')->with('proje', $proje[0]);
        //->with('musteri',Musteri::find($proje->musteri_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->_projeService->Update($request, $id);

        return  "update form"; //redirect('/proje');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proje::destroy($id);
        Sozlesme::where('proje_id','=',$id)->delete();
        return "Proje silindi";
    }


    public function planIndex()
    {

        return view('proje.plan');
    }
}
