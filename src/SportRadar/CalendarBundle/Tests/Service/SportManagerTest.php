<?php

namespace SportRadar\CalendarBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use SportRadar\CalendarBundle\Service\SportManager;


class SportManagerTest extends KernelTestCase
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
    }

    public function testGetAllSports()
    {
        $service = new SportManager($this->em,$this->form);
        $this->assertNotEmpty($service->getAllSports());
    }

}