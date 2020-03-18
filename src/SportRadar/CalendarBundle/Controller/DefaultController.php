<?php

namespace SportRadar\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SportRadarCalendarBundle:Default:index.html.twig');   

    }
}
