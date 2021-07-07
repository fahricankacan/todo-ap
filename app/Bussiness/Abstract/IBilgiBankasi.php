<?php

namespace App\Bussiness\Abstract;

interface IBilgiBankasi{
    
    public function GetBilgilerByProjectID($project_id);

    public function UpdateToSolvedOrClosded($data,$id);

    /***
     * gelen ajax post verilerini kayıt eder.
     * 
     */
    public function AddBilgi($request,$id);

    /**
     * gelen biligiyi ve dosyayı günceller
     */
    public function UpdateBilgi($request, $id);
    
    /**
     * Proje id 'ye göre totalTicket sayısı döndürür
     * @param  int  $id
     * @return int
     */
    public function TotalTicket($id);
    
    /**
     * Proje id'ye göre toplam  closed ticket sayısı döndürür.
     * @param  int  $id
     *  @return int
     */
    public function TotalClosedTickets($id);
    
    /**
     * Proje id'ye göre toplam  active ticket sayısı döndürür.
     * @param  int  $id
     *  @return int
     */
    public function TotalActiveTickets($id);

    /**
     * Proje id'ye göre toplam  Resolved ticket sayısı döndürür.
     * @param  int  $id
     *  @return int
     */
    public function TotalResolvedTickets($id);

    /**
     * Proje id'ye göre toplam cevap verilme süresini döndürür.
     * @param  int  $id 
     * 
     */
    public function TotalREsponseTime($id);

    /**
     * Veri tabanındaki toplam ticket sayısını döndürür.
     * @return int 
     */
    public function AllTicketCount();

    /**
     * 
     */
}