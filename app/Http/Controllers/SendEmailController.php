<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Musteri;
use App\Models\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    

    public function denemeMail(){

       // Mail::to('fahrican.kcn@gmail.com')->send(new Contact());

    }

    public function SendMailToPersonel(Request $request)
    {
        
        $validate = $request->validate(
            [
                'musteri_id'=>'required',
                'mail_adi'=> 'required',
                'mail_aciklamasi' => 'required'
            
            ]
            );

            for($i=count($request->musteri_id);$i>0;$i--){

                if(!empty($request->musteri_id[$i-1])){
                    $musteri=Personel::find($request->musteri_id[$i-1]);
            
                    Mail::to($musteri->mail_adresi)->send(new Contact($request->mail_aciklamasi));
                }
                
            }
           

            return redirect('/iletisim/index');
        

    }
    public function SendMailToCustomer(Request $request)
    {
        
        $validate = $request->validate(
            [
                'musteri_id'=>'required',
                'mail_adi'=> 'required',
                'mail_aciklamasi' => 'required'
            
            ]
            );

        for($i=count($request->musteri_id);$i>0;$i--){

            if(!empty($request->musteri_id[$i-1])){
                $musteri=Musteri::find($request->musteri_id[$i-1]);
        
                Mail::to($musteri->mail_adresi)->send(new Contact($request->mail_aciklamasi));
            }
            
        }
      

            return redirect('/iletisim/index');
        

    }


    public function SendMailToCustomPerson(Request $request){

        return redirect('/iletisim/index');
    }

}
