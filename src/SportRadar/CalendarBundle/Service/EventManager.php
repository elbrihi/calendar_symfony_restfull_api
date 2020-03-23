<?php

namespace SportRadar\CalendarBundle\Service;

use SportRadar\CalendarBundle\Entity\Event;
use Symfony\Component\Form\FormFactory ;
use SportRadar\CalendarBundle\Form\Type\EventType;
use SportRadar\CalendarBundle\Service\Date;

class EventManager
{
    private $em;

    private $factoryForm ;

    private $date ; 

    public function __construct(
        \Doctrine\ORM\EntityManager $entityManager,
        
        FormFactory $factoryForm,
        
        Date $date
        )
    {
        
        $this->em = $entityManager;
        $this->factoryForm = $factoryForm;
        $this->date = $date;
    }

    public function saveEvent($request)
    {
        $sport = $this->em
        ->getRepository('SportRadarCalendarBundle:Sport')
        ->find($request->get('id'));
       ;
        $event = new Event();
        
        $form = $this->factoryForm->create(EventType::class, $event);
        
        
        $form->submit($request->request->all());
        
        $event->setSport($sport);
      
        $date = $event->getDate();

        
        $event->setDate($this->date->dateToString($date));
        
        if ($form->isValid()) {
            $event->setSport($sport);
            
            
            $this->em->persist($event);

            $this->em->flush();
            
            return  $event;
        } else {
            return $form;
        }
       
    }

    public function getAllEvents()
    {
       

        $events = $this->em
                ->getRepository('SportRadarCalendarBundle:Event')
                ->findAll();
        return $events;
    }
}