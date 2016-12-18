<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductsControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/products');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
		
		
		$crawler = $client->request('GET', '/products/categories');

        $this->assertEquals(204, $client->getResponse()->getStatusCode());
		
		
		$crawler = $client->request('GET', '/products/2');

        $this->assertEquals(204, $client->getResponse()->getStatusCode());
		
		
		$crawler = $client->request('POST', '/users', array('email'  => 'test@test.com'));

		
	
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
		$key=json_decode($client->getResponse()->getContent());
		$this->assertGreaterThan(0, strlen($key->token));
		
				$aproduct=array(
		 	'name' => 'test product test', 
			'category' => 'hats', 
			'sku' => '34525663', 
			'price' => '1234.45', 
			'quantity' => '20', 
			'apikey' => $key->token, 
		 );
		 $crawler = $client->request('POST', '/products', $aproduct);
		 var_dump($client->getResponse()->getContent());
		    $this->assertEquals(200, $client->getResponse()->getStatusCode());
			
			
		 $options=array('apikey' => $key->token);
		 $crawler = $client->request('DELETE', '/products/7', $options);
		 $this->assertEquals(200, $client->getResponse()->getStatusCode());
     
		
		
		
		
		
	
    }
}
