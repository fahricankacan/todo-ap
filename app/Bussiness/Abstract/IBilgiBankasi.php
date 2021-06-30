<?php

namespace App\Bussiness\Abstract;

interface IBilgiBankasi{
    
    public function GetBilgilerByProjectID($project_id);

    public function UpdateToSolvedOrClosded($data,$id);

    /***
     * gelen ajax post verilerini kayıt eder.
     */
    public function AddBilgi($request,$id);
}