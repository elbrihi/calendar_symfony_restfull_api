<?php

namespace SportRadar\CalendarBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SportControllerTest extends WebTestCase
{
      public function testPostSportController()
      {
        $client   = static::createClient();

        $crawler  = $client->request('POST', '/sport/new',
        array( 
            "title" =>"football",
           
        )); 
       
        $response = $client->getResponse();

    
        $this->assertJsonResponse($response, 200);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
      }

      public function testGetSportAction()
      {
        $client   = static::createClient();
        $crawler  = $client->request('GET', '/sport/sports');

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

}
