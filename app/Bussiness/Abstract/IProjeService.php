<?php

namespace App\Bussiness\Abstract;

use App\Models\Proje;


interface IProjeService {

   public function GetAllProjects();
   public function Add( $request);
   public function Delete( $request);
   public function Update( $proje,$id);
   public function GetById($id);
   public function GetProjectWithMusteriNameById($id);
   public function GetProjectWithMusteriName();
}