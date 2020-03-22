<?php

namespace SportRadar\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SportRadar\CalendarBundle\Entity\Event;
use SportRadar\CalendarBundle\Form\Type\EventType;
use SportRadar\CalendarBundle\Entity\Sport;
use SportRadar\CalendarBundle\Form\Type\SportType;

class DefaultController extends Controller
{
    public function indexAction()
    {
    
        $event = new Event();
        $sport = new Sport();
        
        $event_form = $this->createForm('SportRadar\CalendarBundle\Form\Type\EventType', $event);
        $sport_form = $this->createForm('SportRadar\CalendarBundle\Form\Type\SportType', $sport);

        return $this->render('@SportRadarCalendar/Default/index.html.twig',array(
            'event' => $event,
            'event_form' =>$event_form->createView(),
            'sport_form' =>$sport_form->createView(),
        ));   

    }
}
