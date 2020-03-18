<?php

namespace SportRadar\CalendarBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use SportRadar\CalendarBundle\Entity\Sport;
use FOS\RestBundle\Controller\Annotations as Rest;
use SportRadar\CalendarBundle\Form\Type\SportType;
use FOS\RestBundle\View\View; 

/**
 * Sport controller.
 *
 * @Route("sport")
 */
class SportController extends Controller
{
    

     /**
     * @Rest\View()
     * @Rest\Get("/sports")
     */
    public function getSportsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

       
       
        $sports = $this->get('doctrine.orm.entity_manager')
                ->getRepository('SportRadarCalendarBundle:Sport')
                ->findAll();
        return $sports;
    }
    /**
     * 
     * @Rest\View()
     * @Rest\Post("/new", name="sport_new")
     */
    public function postSportAction(Request $request)
    {
        $sport = new Sport();
        $form = $this->createForm(SportType::class, $sport);
        
        $form->submit($request->request->all());
        if ($form->isValid()) {
            
            $em = $this->get('doctrine.orm.entity_manager');
            
            $em->persist($sport);

            $em->flush();
            
            return  $sport;
        } else {
            return $form;
        }
    }

    

    
}
