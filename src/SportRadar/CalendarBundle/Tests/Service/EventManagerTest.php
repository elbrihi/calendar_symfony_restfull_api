<?php

namespace SportRadar\CalendarBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use SportRadar\CalendarBundle\Service\EventManager;
use Symfony\Component\HttpFoundation\Request;

class EventManagerTest extends KernelTestCase
{

    private $container;

    private $em;

    private $form;

    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->em = $this->container->get('doctrine.orm.entity_manager');
        $this->form = $this->container->get('form.factory');
        $this->date = $this->container->get('sport_radar_calendar.date');;
        $this->request = new Request();
    }

    public function testGetAllEvents()
    {
        $service = new EventManager($this->em,$this->form,$this->date);
        $this->assertNotEmpty($service->getAllEvents());
    }

    protected function tearDown()
    {
        $this->em->close();
        unset($this->em,$this->form,$this->date);
    }

}