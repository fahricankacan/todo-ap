<?php 

namespace App\Bussiness\Concrate;

use App\Bussiness\Abstract\ICalendar;
use App\Models\calendar_event;

class CalendarManager implements ICalendar{

    public function GetAllCalendarEvents(){

        // $calendarData = new calendar_event();

        $calendarData = calendar_event::all();

        $array []= array(
            'id' =>$calendarData->id,
            'title' => $calendarData->title,
            'start' => $calendarData->start,
            'end' => $calendarData->end
        ) ;
        return $calendarData;
    }

    public function Add($request){
        
    }

    public function Delete($request){

    }
    public function Update($request){

    }
}