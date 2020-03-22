<?php

namespace SportRadar\CalendarBundle\Service;

use SportRadar\CalendarBundle\Entity\Sport;
use Symfony\Component\Form\FormFactory ;
use SportRadar\CalendarBundle\Form\Type\SportType;

class SportManager
{
    private $em;

    private $factoryForm ;

    public function __construct(
        \Doctrine\ORM\EntityManager $entityManager,
        
        FormFactory $factoryForm)
    {
        
        $this->em = $entityManager;
        $this->factoryForm = $factoryForm;
    }

    public function saveSport($request)
    {
        $sport = new Sport();
        $form = $this->factoryForm->create(SportType::class, $sport);
        
        $form->submit($request->request->all());
        if ($form->isValid()) {
            
            $this->em->persist($sport);

            $this->em->flush();
            
            return  $sport;
        } else {
            return $form;
        }
    }
}