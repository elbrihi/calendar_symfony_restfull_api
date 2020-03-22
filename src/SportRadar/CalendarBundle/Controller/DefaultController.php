<?php

namespace SportRadar\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SportRadar\CalendarBundle\Entity\Event;
use SportRadar\CalendarBundle\Form\Type\EventType;

class DefaultController extends Controller
{
    public function indexAction()
    {
    
        $event = new Event();
        
        $form = $this->createForm('SportRadar\CalendarBundle\Form\Type\EventType', $event);
        
        return $this->render('@SportRadarCalendar/Default/index.html.twig',array(
            'event' => $event,
            'form' =>$form->createView(),
        ));   

    }
}
