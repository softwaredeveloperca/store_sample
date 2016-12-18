<?php
namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\Response as Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Products;
use AppBundle\Entity\Users;


class ProductsController extends FOSRestController
{
	private function checkKey(Request $request)
	{
		$apikey=$request->get('apikey');
		$usr=$this->getDoctrine()->getRepository('AppBundle:Users')->findByToken($apikey);
		if (!isset($usr) || count($usr[0]) === null) {
          return new View("key is not valid", Response::HTTP_NOT_FOUND);
		}
		
		$usr[0]->setTokenDate(new \DateTime('now'));
		$em = $this->getDoctrine()->getManager();
		$em->persist($usr[0]);
		$em->flush();
		
		
	}
    public function getProductsAction()
    { 
		$restresult = $this->getDoctrine()->getRepository('AppBundle:Products')->findAll();
        if (count($restresult) === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
        return $restresult;
	} // "get_products"            [GET] /products
	
	public function deleteProductAction($id, REQUEST $request)
    {
		$this->checkKey($request);
		$data = new Products;
	  $sn = $this->getDoctrine()->getManager();
	  $product = $this->getDoctrine()->getRepository('AppBundle:Products')->find($id);
		if (empty($product)) {
		  return new View("product not found", Response::HTTP_NOT_FOUND);
		 }
		 else {
		  $sn->remove($product);
		  $sn->flush();
		 }
	  return new View("deleted successfully", Response::HTTP_OK);
		
	} // "delete_product"          [DELETE] /products/{id}
	
	public function postProductsAction(Request $request)
    {
		// create
		$this->checkKey($request);
	   $data = new Products;
	   $name = $request->get('name');
	   $category = $request->get('category');
	   $sku = $request->get('sku');
	   $price = $request->get('price');
	   $quantity = $request->get('quantity');

	   if(empty($name) || empty($category) || empty($sku) || empty($price) || empty($quantity))
	   {
		  return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE); 
	   } 
	    $data->setName($name);
	    $data->setCategory($category);
	    $data->setSku($sku);
	    $data->setPrice($price);
	    $data->setQuantity($quantity);
		$data->updatedTimestamps();
	
		  $em = $this->getDoctrine()->getManager();
		  $em->persist($data);
		  $em->flush();
		   return new View("Product Added Successfully", Response::HTTP_OK);
		
	} // "post_products"             [POST] /products
	
	public function postProductsEditAction($id, Request $request)
    {
		 $this->checkKey($request);
		 $data = new Products;
	   $name = $request->get('name');
	   $category = $request->get('category');
	   $sku = $request->get('sku');
	   $price = $request->get('price');
	   $quantity = $request->get('quantity');
	   
		 $sn = $this->getDoctrine()->getManager();
		 $product = $this->getDoctrine()->getRepository('AppBundle:Products')->find($id);
		if (empty($product)) {
		   return new View("product not found", Response::HTTP_NOT_FOUND);
		 } 
		elseif(!empty($name) && !empty($category) && !empty($sku) && !empty($price) && !empty($quantity)){
    		$product->setName($name);
			$data->setCategory($category);
			$data->setSku($sku);
			$data->setPrice($price);
			$data->setQuantity($quantity);
			$data->updatedTimestamps();
		   $sn->flush();
		   return new View("Product Updated Successfully", Response::HTTP_OK);
		 }
		 else 
		 {
			 return new View("Cannot Save NULL values", Response::HTTP_NOT_FOUND);
		 }
	
		// edit
	} // "post_users"           [POST] /products/{slug}
	
    public function getProductAction($slug)
    {
		$data = new Products;
	  $sn = $this->getDoctrine()->getManager();
	  $product = $this->getDoctrine()->getRepository('AppBundle:Products')->find($slug);
	
        if (count($product) === null) {
          return new View("product does not exist", Response::HTTP_NOT_FOUND);
     }
        return $product;
	} // "get_product"             [GET] /products/{slug}
	
    public function getProductCategoriesAction()
    { 
		$qb = $this->getDoctrine()->getRepository("AppBundle:Products")->createQueryBuilder("p");

		$categories=$this->getDoctrine()->getRepository("AppBundle:Products")->findByCategory(array('distinct' => true));
		
		
		
		$em = $this->getDoctrine()->getEntityManager();
  		$qb = $em->createQueryBuilder();

         $q  = $qb->select(array('p.category'))
           ->from('AppBundle:Products', 'p')
           ->groupBy('p.category')
           ->getQuery();
		 
		 
		$categories=array();
        $categories_data=array_values( $q->getResult());
		
		foreach($categories_data as $category)
		{
			array_push($categories, $category['category']);
		}

        if (count($categories) === null) {
          return new View("there are no categories", Response::HTTP_NOT_FOUND);
     }
        return $categories;
	} // "get_products_categories"            [GET] /productcategories
	
}
