<?php

namespace App\Http\Controllers;

use App\Bussiness\Abstract\IMusteriService;
use App\Bussiness\Abstract\IProjeService;
use App\Bussiness\Deneme;
use App\Bussiness\IDeneme;
use App\Models\Musteri;
use App\Models\Proje;
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

        $projeler = $this->_projeService->GetProjectWithMusteriName();

        return view('proje.proje')->with('projeler', $projeler);
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
    public function store(Request $request)
    {



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

        return view('proje.show');
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

        return redirect('/proje');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proje::find($id)->destroy();
        return redirect('/musteri');
    }


    public function planIndex(){

        return view('proje.plan');
    }
}
