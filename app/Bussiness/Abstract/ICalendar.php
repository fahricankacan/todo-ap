<?php 

namespace App\Bussiness\Abstract;

interface ICalendar{

    /**
     * Bütün ajanda verilerini döndürür.
     * 
     */
    public function GetAllCalendarEvents();
    /**
     * Ajandaya yeni plan ekler.
     */
    public function Add( $request);
    /**
     * Ajandadan plan siler.
     */
    public function Delete( $request);
    /**
     * Ajandadan plan günceller.
     */
    public function Update( $request); 
}