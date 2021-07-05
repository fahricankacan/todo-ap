<?php

namespace App\Http\Controllers;

use App\Bussiness\Abstract\IProjeDurumu;
use App\Bussiness\Abstract\ISozlesmeService;
use App\Models\Musteri;
use App\Models\Proje;
use App\Models\Sozlesme;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SozlesmeController extends Controller
{
    private $_sozlesmeService;
    private $_proje_durumService;

    public function __construct(ISozlesmeService $sozlesme,IProjeDurumu $durumService){

        $this->_sozlesmeService=$sozlesme;
        $this->_proje_durumService = $durumService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   
        $this->_proje_durumService->CreateProjectDurums();
        return view('sozlesmeler.sozleme')
        ->with('sozlesmeler',Sozlesme::where('proje_id','>',0)->get())
        ->with('projeler',Proje::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sozlesmeler.create')
        ->with('musteriler', Musteri::all())
        ->with('projeler',Proje::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_sozlesmeService->Add($request);

        return redirect('/sozlesme');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->_sozlesmeService->GetSozlesmeShowScreenDatas($id);
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Sozlesme::find($id)->toJson();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->_sozlesmeService->Delete($id);
        return response()->json(['success' => 'Başarı ile silindi.']);
    }
}
