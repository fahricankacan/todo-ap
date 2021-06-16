<?php

namespace App\Bussiness\Abstract;


interface IPersonelService{

    public function GetAllProjects();
    public function Add( $request);
    public function Delete( $request);
    public function Update( $proje,$id);
    public function GetById($id);
}