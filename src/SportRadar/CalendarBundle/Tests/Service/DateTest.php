<?php

namespace SportRadar\CalendarBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use SportRadar\CalendarBundle\Service\EventManager;
use Symfony\Component\HttpFoundation\Request;
use SportRadar\CalendarBundle\Service\Date;

class DateTest extends KernelTestCase
{

    
    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
       
    }

    public function testDateToString()
    {
        $service = new Date();
        $this->assertEquals($service->dateToString("02.03.2020 12:00"),"Mon.,  02.03.2020, 12:00");
    }

   

}