<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
			
		$crawler = $client->request('POST', '/users', array('email'  => 'bobby@foo.com'));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
		
		$crawler = $client->request('POST', '/users', array('email2'  => 'test1@test.com'));

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
   	   
    }
}
