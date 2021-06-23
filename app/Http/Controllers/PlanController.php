<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proje;

class PlanController extends Controller
{
    
    public function index($id){
        
        return view('plan.plan');
    }


    public function a(){

        $projeler=Proje::all();

        return view('plan.projeler')->with('projeler',$projeler);
    }
}
