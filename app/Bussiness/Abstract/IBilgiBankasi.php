<?php

namespace App\Bussiness\Abstract;

interface IBilgiBankasi{
    
    public function GetBilgilerByProjectID($project_id);

    public function UpdateToSolvedOrClosded($data,$id);
}