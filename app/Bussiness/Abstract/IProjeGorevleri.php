<?php

namespace App\Bussiness\Abstract;

interface IProjeGorevleri
{

    //proje id sine göre proje görevlerini döndürür
    public function GetAllProjectGorevlerWithPersonelName($id);

    public function GetAllProjects();

    public function GetProjectWithId($id);

    public function GetAllProjectsWithProjectId($id);

    public function GetAllProjectsDurumsWithProjectId($id);

    public function Add($request, $id);

    public function Update($request, $id);
}
