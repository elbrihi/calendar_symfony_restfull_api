<?php

namespace SportRadar\CalendarBundle\Tests\Controller\Sport;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventControllerTest extends WebTestCase
{
      public function testEventController()
      {
        $client   = static::createClient();

        $crawler  = $client->request('POST', '/event/sport/1/events',
        array( 
            "date" =>"02.03.2020 12:00",
            "city" =>"Vienna",

           
        )); 
       
        $response = $client->getResponse();

    
        $this->assertJsonResponse($response, 200);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
      }

      public function testGetSportAction()
      {
        $client   = static::createClient();
        $crawler  = $client->request('GET', '/event/events');

        $response = $client->getResponse();

      
        $this->assertJsonResponse($response, 200);
     
      }
      protected function assertJsonResponse($response, $statusCode = 200)
      {
          $this->assertEquals(
              $statusCode, $response->getStatusCode(),
              $response->getContent()
          );
          $this->assertTrue(
              $response->headers->contains('Content-Type', 'application/json'),
              $response->headers
          );
      }













    /*
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/sport/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /sport/");
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'sportradar_calendarbundle_sport[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'sportradar_calendarbundle_sport[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }

    */
}
