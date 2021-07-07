<?php

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\IBilgiBankasi;
use App\Models\BilgiBankasi;
use App\Models\Dosya;
use GuzzleHttp\Psr7\Request;
use App\Models\Personel;

class BilgiBankasiManager implements IBilgiBankasi
{

    /**
     * proje id sini alır ve bilgilerin çözüm durumuna göre 3 farklı arraya içeren bir array döndürür.
     */
    public function GetBilgilerByProjectID($project_id)
    {
        $active = BilgiBankasi::where('proje_id', '=', $project_id)->where('activity_id', '=', '1')->get();
        $resolved = BilgiBankasi::where('proje_id', '=', $project_id)->where('activity_id', '=', '2')->get();
        $closed = BilgiBankasi::where('proje_id', '=', $project_id)->where('activity_id', '=', '3')->get();

        $bilgiRepo = [
            'active' => $active,
            'resolved' => $resolved,
            'closed' => $closed,

        ];

        return $bilgiRepo;
    }


    public function UpdateToSolvedOrClosded($data, $id)
    {


        BilgiBankasi::where('id', '=', $id)->update(['activity_id' => $data["durum"]]);
    }


    public function AddBilgi($request, $id)
    {
        $sonDosyaID=null;
        if(!empty($request->file())){
            $sonDosyaID=$this->DosyaEkle($request)->id;
        }

        // $bilgiBankasiCount= BilgiBankasi::count();

        // if($bilgiBankasiCount>0){

        //     $sonDosyaID = BilgiBankasi::find($id)->dosya_id;
        // }

        
        //dd(Personel::latest()->first());

        BilgiBankasi::Create(
            [
                'baslik' => $request->bilgi_basligi,
                'aciklama' => $request->bilg_aciklama,
                'personel_id' => $request->selected_personel,
                'dosya_id' => $sonDosyaID,
                'proje_id' => $id

            ]
        );
    }


    public function UpdateBilgi($request, $id){
        
     //  $dosya= $request->file();
        $sonDosya=null;
        if(!empty($request->file())){
            $sonDosyaID=$this->DosyaEkle($request)->id;
        }
       
        $sonDosya = BilgiBankasi::find($id)->dosya_id;

        $bilgi=BilgiBankasi::where('id','=',$id)->update(
            [
                'baslik'=>$request->baslik,
                'aciklama'=>$request->acilama,
                'personel_id' =>$request->personel_sec,
                'dosya_id' =>$sonDosya,
            ]
        );
       //protected $fillable = ['id','proje_id','dosya_id','baslik','aciklama','activity_id',"personel_id"];

    }


    /**
     * Requestten gelen dosyayı storage/dosyalar klasörüne kayıt eder 
     * Dosyalar veri tabanına kayıt atar ve son eklenen rowu döndürür
     */
    private function DosyaEkle($request)
    {
        $fileName = $request->dosya_ekle->getClientOriginalName();
        $fileNameWithUpperFile=$request->dosya_ekle->storeAs('dosyalar', $request->dosya_ekle->getClientOriginalName());

        Dosya::Create(
            [
                'dosya_adi' => $fileName,
                'dosya_yolu' => storage_path("app/public/" . $fileNameWithUpperFile)
            ]
        );

        return Dosya::latest()->first();
    }

    public function TotalTicket($id){
      $totalTicket=BilgiBankasi::where('proje_id', '=', $id)->count();
      return $totalTicket;
    }
    public function TotalResolvedTickets($id){
        $totalResolvedTickets =BilgiBankasi::where('activity_id','=',2)->count();
        return $totalResolvedTickets;
        
    }
    public function TotalClosedTickets($id){
        $TotalClosedTickets=BilgiBankasi::where('activity_id','=',3)->count();
        return $TotalClosedTickets;

    }
    public function TotalActiveTickets($id){
        $totalActiveTickets = BilgiBankasi::where('activity_id','=',1)->count();
        return $totalActiveTickets;
    }
    public function TotalREsponseTime($id){
        $firstBilgi = BilgiBankasi::where('activity_id', '=',1)->first();
        $sonBilgi = BilgiBankasi::where('activity_id', '=',3)->get()->last();

        $firstTime = $firstBilgi->created_at;
        $LasttTime = $firstBilgi->updated_at;

        $diff = $firstTime->diffInSeconds($LasttTime);
        $totalDuration=gmdate('H:i:s', $diff);

        return $totalDuration;

    }

    public function AllTicketCount(){
        $count = BilgiBankasi::count();

        return $count;
    }

}
