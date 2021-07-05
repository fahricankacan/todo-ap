<?php 


namespace App\Bussiness\Abstract;


interface ISozlesmeService{
    public function Add($request);
    public function Update($request, $id);
    public function Delete($id);
    /**
     * Sozleşme inceleme ekranında gösterilecek olan bilgileri json objesi olarak gönderir.
     */
    public function GetSozlesmeShowScreenDatas($id);
}