<?php

namespace App\Http\Controllers;

use App\Bussiness\Abstract\IBilgiBankasi;
use App\Bussiness\Abstract\IBilgiBankasiActivity;
use Illuminate\Http\Request;




use Carbon\Carbon;



use App\Bussiness\Abstract\IProjeGorevDurmu;
use App\Bussiness\Abstract\IProjeGorevleri;
use App\Models\BilgiBankasi;
use App\Models\Dosya;
use App\Models\Musteri;
use App\Models\Personel;
use App\Models\Proje;
use App\Models\ProjeGorevleri;
use Illuminate\Contracts\Cache\Store;
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
    public function store(Request $request, $id)
    {

        // dosya_yolu
        // $request->dosya_yolu->storeAs('dosyalar',$request->dosya_yolu->getClientOriginalName());
        // $as = $request->file();

        $this->_bilgiBankasi->AddBilgi($request, $id);
        return response()->json(['success' => 'Başarı ile kayıt edildi.']);
        // Storage::disk('local')->put($as->path(),'Contents');
        // $SA=    $request->all();
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
    public function updateBilgiDurumu(Request $request, $id)
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

    /**
     * indirilecek olan dosyanın idsini alır
     */
    public function downloadFile($id)
    {

        $dosya = Dosya::find($id);

        if (!empty($dosya)) {
            $dosya_yolu = $dosya->dosya_yolu;
            $dilimler = explode("dosyalar/", $dosya_yolu);

            return Storage::download("/dosyalar" . "/" . $dilimler[1]);
        }
        
        return response('Dosya bulunamadı',404);
    }

    public function GetDosyaID($id)
    {

        $bilgi = BilgiBankasi::find($id);
        
        if(!empty($bilgi)){
            $dosya = Dosya::find($bilgi->dosya_id);
            if (!empty($dosya)) {
                return $bilgi->dosya_id;
            }
        }
       
        return "";
    
    }

    public function UpdateBilgi(Request $request,$id){

        $this->_bilgiBankasi->UpdateBilgi($request,$id);
        $sa = $request->all();
        return "update bilgi";
    }


    public function Delete($id){

        BilgiBankasi::find($id)->delete();
        return response()->json(['success' => 'Bilgi silindi.']);
    }
}
