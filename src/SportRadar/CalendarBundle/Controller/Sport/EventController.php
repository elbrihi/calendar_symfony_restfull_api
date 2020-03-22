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
     * @Rest\View()
     * @Rest\Get("/events")
     */
    public function getEventsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $events = $this->get('doctrine.orm.entity_manager')
                ->getRepository('SportRadarCalendarBundle:Event')
                ->findAll();
        return $events;
    }
    /**
     * 
     * @Rest\View()
     * @Rest\Post("/sport/{id}/events", name="event_new")
     */
    
    public function postEventAction(Request $request)
    {
        
        $sport = $this->get('doctrine.orm.entity_manager')
        ->getRepository('SportRadarCalendarBundle:Sport')
        ->find($request->get('id'));

        if (empty($sport)) {
            return $this->sportNotFound();
        }
        $event = new Event();
        
        $form = $this->createForm(EventType::class, $event);
        
        
        $form->submit($request->request->all());
        
        $event->setSport($sport);
       
        
        $date = $event->getDate();

        $event->setDate($this->get('sport_radar_calendar.date')->dateToString($date));

        if ($form->isValid()) {
            $event->setSport($sport);
            
            $em = $this->get('doctrine.orm.entity_manager');
            
            $em->persist($event);

            $em->flush();
            
            return  $event;
        } else {
            return $form;
        }
    }
     /**
     * 
     * @Rest\View(serializerGroups={"event"})
     * @Rest\Get("/sport/{id}/events", name="event")
     */
    public function getEventAction(Request $request)
    {
        $sport = $this->get('doctrine.orm.entity_manager')
                ->getRepository('SportRadarCalendarBundle:Sport')
                ->find($request->get('id')); // L'identifiant en tant que paramétre n'est plus nécessaire
        /* @var $place Place */

        if (empty($sport)) {
            return $this->sportNotFound();
        }

        return $sport;
    }

    
    private function sportNotFound()
    {
        return \FOS\RestBundle\View\View::create(['message' => 'Sport not found'], Response::HTTP_NOT_FOUND);
    }

}
