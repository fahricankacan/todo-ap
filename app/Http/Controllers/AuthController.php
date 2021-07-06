<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login()
    {

        return view('login.login');
    }
    public function Register()
    {
        return view('login.register');
    }

    public function Save(Request $request)
    {

        $request->validate([
            'kullanici_adi' => 'required',
            'sifre' => 'required|min:5|max:12',
            'email' => 'required|email|unique:admins'
        ]);

        $admin = new Admin;

        $admin->kullanici_adi=$request->kullanici_adi;
        $admin->email=$request->email;
        $admin->sifre=Hash::make($request->sifre);
        $save = $admin->save();

        if($save){
            return back()->with('success','Yeni kullanıcı oluşturuldu.');
        }else{
            return back()->with('error','Birşeyler yanlış gitti.');
        }
    }

    public function Check(Request $request ){
         $request->validate([
             'kullanici_adi' => 'required',
             'sifre' => 'required|min:5|max:12'
         ]);

         $userInfo = Admin::where('kullanici_adi','=',$request->kullanici_adi)->first();

         if(!$userInfo){
             return back()->with('fail','Kullanıcı adı bulunamadı.');
         }else{

            if(Hash::check($request->sifre, $userInfo->sifre)){
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('/proje');
            }
            else{
                return back()->with('fail','Parola hatalı.');
            }
         }
    }

    public function Logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
}
