<?php


namespace SportRadar\CalendarBundle\Service;

class Date
{
    public function __construct()
    {
        
    }
    public function dateToString($date):String
    {
        $date = explode(" ", $date);
        
        return  date('D., ',strtotime( $date[0])).' '.$date[0].', '. $date[1];
        
    }
}