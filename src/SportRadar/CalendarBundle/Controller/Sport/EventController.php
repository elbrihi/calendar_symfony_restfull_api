<?php

namespace SportRadar\CalendarBundle\Controller\Sport;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use SportRadar\CalendarBundle\Entity\Event;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use SportRadar\CalendarBundle\Form\Type\EventType;
use FOS\RestBundle\View\View; 

/**
 * Sport controller.
 *
 * @Route("event")
 */

class EventController extends Controller 

{
     /**
     * 
     * @Rest\View(serializerGroups={"event"})
     * @Rest\Get("/events", name="events")
     */
    public function getEventsAction(Request $request)
    {
        return $this->get('sport_radar_calendar.event_manager')->getAllEvents();
        
    }
    /**
     * 
     * @Rest\View(serializerGroups={"event"})
     * @Rest\Post("/sport/{id}/events", name="event_new")
     */
    
    public function postEventAction(Request $request)
    {
        return $this->get('sport_radar_calendar.event_manager')->saveEvent($request);
        
    }
     
}
