** Create API Token **
----
  Returns api troken

* **URL**

  /users

* **Method:**

  `POST`
  

   **Required:**
   
  @email:  @STRING


* **Data Params**

  @email:  @STRING

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[{"token":'sd3fF4f'}]`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />




** Get Products **
----
  Returns json data about a single user.

* **URL**

  /products

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
  None

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[{"id":5,"name":"test product","category":"hats","sku":"34525663","price":1234.45,"quantity":20,"created_at":"2016-12-18T00:00:00-0500","updated_at":"2016-12-18T00:00:00-0500"}`
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />

 
 ** Create Product **
----
  Returns json data about a single user.

* **URL**

  /products

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
 
 'name'  
	'category' 
	'sku'
	'price'      
	'quantity'  
	'apikey'     

* **Data Params**

  'name'  
	'category' 
	'sku'
	'price'      
	'quantity'  
	'apikey'

* **Success Response:**

  * **Code:** 200 <br />

 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
  
  
  
  See ProductsController for all methods:
  
    **list all products**
    **list all categories**
    **retrieve a single product**
    **create a product**
    **update a product**
    **delete a product**
