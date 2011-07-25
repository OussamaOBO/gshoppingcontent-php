<?php
/**
 * Example to insert a product.
 *
 * Copyright 2011 Google, Inc
 *
 *   Licensed under the Apache License, Version 2.0 (the "License"); you may not
 *   use this file except in compliance with the License.  You may obtain a copy
 *   of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *   Unless required by applicable law or agreed to in writing, software
 *   distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 *   WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  See the
 *   License for the specific language governing permissions and limitations
 *   under the License.
 *
 * @version 1
 * @author afshar@google.com
 * @copyright Google Inc, 2011
 */

// import our library
require_once('GShoppingContent.php');

// Get the user credentials
$creds = Credentials::get();

// Create a client for our merchant and log in
$client = new GSC_Client($creds["merchantId"]);
$client->login($creds["email"], $creds["password"]);

// Now enter some product data
$product = new GSC_Product();
$product->setSKU("dd192");
$product->setProductLink("http://code.google.com/");
$product->setTitle("Dijji Digital Camera");
$product->setPrice("199.99", "usd");
$product->setAdult("false");
$product->setCondition("new");

// Finally send the data to the API
$entry = $client->insert($product);
echo('Inserted: ' . $entry->getTitle() . "\n");

/**
 * Credentials - Enter your own values
 *
 * @author afshar@google.com
**/
class Credentials {
    public static function get() {
        return array(
            "merchantId" => "7852698",
            "email" => "jsmith@gmail.com",
            "password" => "XXXXXX",
        );
    }
}


?>