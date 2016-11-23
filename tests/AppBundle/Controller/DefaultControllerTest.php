<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        
        $crawler = $client->request('GET', '/');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
       
        // if can be decode must be a json file created            
        $ob = json_decode($client->getResponse()->getContent());
         var_dump($ob);
        if($ob === null) {
           return false ;
        }
        
        
            }
}

