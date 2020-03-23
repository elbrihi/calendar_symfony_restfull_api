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
    

    public function __construct()
    {
        
    }
    /**
     * 
     * @Rest\View(serializerGroups={"sport"})
     * @Rest\Get("/sports",name="sport_show")
     */
    public function getSportsAction(Request $request)
    {
        return $this->get('sport_radar_calendar.sport_manager')->getAllSports();  
    }
    /**
     * 
     * @Rest\View()
     * @Rest\Post("/new", name="sport_new")
     */
    public function postSportAction(Request $request)
    {

        return $this->get('sport_radar_calendar.sport_manager')->saveSport($request);
        
    }

    

    
}
