* **symfony 3 Sample REST API using FOSJsRoutingBundle**
<br><br>


* **Installing** 

CREATE DATABASE store;<br><br>

insert into users (name, email, createdAt, updatedAt) VALUES ('Bobby Fischer', 'bobby@foo.com', now(), now());<br>
insert into users (name, email, createdAt, updatedAt) VALUES ('Betty Rubble', 'betty@foo.com', now(), now());<br>


insert into products (name, category, sku, price, quantity, createdAt, updatedAt) VALUES ('Pong', 'Games', 'A0001', '69.99', 20, now(), now());<br>
insert into products (name, category, sku, price, quantity, createdAt, updatedAt) VALUES ('GameStation 5', 'Games', 'A0002', 269.99, 15, now(), now());<br><br>

insert into products (name, category, sku, price, quantity, createdAt, updatedAt) VALUES ('AP Oman PC - Aluminum', 'Computers', 'A0003', 1399.99, 10, now(), now());<br>
insert into products (name, category, sku, price, quantity, createdAt, updatedAt) VALUES ('Fony UHD HDR 55', 'Games', 'A0004', '1399.99', 5, now(), now());<br><br><hr>

* ** Create API Token **
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



<br>
* ** Get Products **
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

 
 <br>
 * ** Create Product **
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
  <br><br><br>
  
  
  See ProductsController for all methods:
  
    **<li>list all products</li>**
    **<li>list all categories</li>**
    **<li>retrieve a single product</li>**
    **<li>create a product</li>**
    **<li>update a product</li>**
    **<li>delete a product</li>**
