<?php
namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Users;


class UsersController extends FOSRestController
{

	
	public function postUsersAction(Request $request)
    { 
		$email=$request->get('email');
		$user = $this->getDoctrine()->getRepository('AppBundle:Users')->findByEmail($email);
        if (!isset($user[0]) || count($user[0]) === null) {
          return new View("user does not exist", Response::HTTP_NOT_FOUND);
		}
		$token=bin2hex(random_bytes(10));
		$sn = $this->getDoctrine()->getManager();
		$user[0]->setToken($token);
		 $sn->flush();
		return new View(array('token' => $token), Response::HTTP_OK);

		
    } // "post_users"            [POST] /users
}