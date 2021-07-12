<?php 

namespace App\Bussiness\Abstract;

interface ICalendar{

    /**
     * Bütün ajanda verilerini döndürür.
     * 
     */
    public function GetAllCalendarEvents();
}