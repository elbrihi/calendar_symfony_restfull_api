<?php

namespace SportRadar\CalendarBundle\Controller\Sport;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use SportRadar\CalendarBundle\Entity\Event;
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
     * @Rest\Post("/new", name="event_new")
     */
    public function postEventAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        
        $form->submit($request->request->all());
        if ($form->isValid()) {
            
            $em = $this->get('doctrine.orm.entity_manager');
            
            $em->persist($event);

            $em->flush();
            
            return  $event;
        } else {
            return $form;
        }
    }

}
