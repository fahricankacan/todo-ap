<?php

namespace App\Http\Controllers;

use App\Bussiness\Abstract\IBilgiBankasi;
use App\Bussiness\Abstract\IBilgiBankasiActivity;
use Illuminate\Http\Request;




use Carbon\Carbon;



use App\Bussiness\Abstract\IProjeGorevDurmu;
use App\Bussiness\Abstract\IProjeGorevleri;
use App\Models\BilgiBankasi;
use App\Models\Musteri;
use App\Models\Personel;
use App\Models\Proje;
use App\Models\ProjeGorevleri;
use Illuminate\Support\Facades\Storage;

class BilgiBankasiController extends Controller
{

    private IBilgiBankasiActivity $_bilgiBankasiActivty;
    private IBilgiBankasi $_bilgiBankasi;
    protected $_projeGorevleriService;
    protected $_projeGorevDurumuService;

    function  __construct(
        IBilgiBankasiActivity $bilgiBankasiActivty,
        IBilgiBankasi $bilgiBankasi,
        IProjeGorevleri $projeGorevleri,
        IProjeGorevDurmu $gorevdurumu
    ) {

        $this->_bilgiBankasiActivty = $bilgiBankasiActivty;
        $this->_bilgiBankasi = $bilgiBankasi;
        $this->_projeGorevDurumuService = $gorevdurumu;
        $this->_projeGorevleriService = $projeGorevleri;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $this->_projeGorevDurumuService->CreateIfDefaultValuesDoesntExist();
        $projeler = Proje::all();

        return view('bilgi-bankasi.projeler')->with('projeler', $projeler);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dosya_yolu
        $request->dosya_yolu->store('app');
        $as = $request->file();

       

       // Storage::disk('local')->put($as->path(),'Contents');
        $SA=    $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->_bilgiBankasiActivty->createBilgiBankasiActivityValues();



        //dd(BilgiBankasi::find($id)->personel->ad);

        //$bilgi=BilgiBankasi::find($id)->activty;
        //$b= $bilgi->proje;
        //dd($this->_bilgiBankasi->GetBilgilerByProjectID($id));

        return  view('bilgi-bankasi.bilgi-bankasi', [
            'bilgiler' => $this->_bilgiBankasi->GetBilgilerByProjectID($id)

        ])->with('personeller', Personel::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->_bilgiBankasi->UpdateToSolvedOrClosded($request->all(), $id);
        return response()->json(['success' => 'Got Simple Ajax Request.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
