<?php
//connect to database class
include_once(__DIR__ . '/../settings/db_class.php');
/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

//  public function add_brand($a,$b)
// 	{
// 		$ndb = new db_connection();	
// 		$name =  mysqli_real_escape_string($ndb->db_conn(), $a);
// 		$desc =  mysqli_real_escape_string($ndb->db_conn(), $b);
// 		$sql="INSERT INTO `brands`(`brand_name`, `brand_description`) VALUES ('$name','$desc')";
// 		return $this->db_query($sql);
// 	}

class General_Class extends db_connection {
    // Method to add a new category
    public function add_category($cat_name) {
        $sql = "INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name')";
        return $this->db_query($sql); // returns true on success, false on failure
    }
   
    
    public function register_user($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $customer_image, $user_role) {
        $hashed_password = password_hash($customer_pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO customer (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_image, user_role) VALUES ('$customer_name', '$customer_email', '$hashed_password', '$customer_country', '$customer_city', '$customer_contact', '$customer_image', '$user_role')";
        return $this->db_query($sql);
    }
    public function add_brand($brand_name) {
        $sql = "INSERT INTO `brands` (`brand_name`) VALUES ('$brand_name')";
        return $this->db_query($sql); // returns true on success, false on failure
    }
    
    public function get_all_categories() {
        $sql = "SELECT * FROM `categories`";
        return $this->db_fetch_all($sql); // assuming db_fetch_all fetches all results as an associative array
    }
    
    public function add_prod($product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords) {
        $sql = "INSERT INTO `products` (`product_cat`,`product_brand`,`product_title`,`product_price`,`product_desc`,`product_image`,`product_keywords`) VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_description','$product_image','$product_keywords')";
        return $this->db_query($sql); // returns true on success, false on failure
    }
    public function update_brand($brand_id, $brand_name) {
        $sql = "UPDATE `brands` SET `brand_name` = '$brand_name' WHERE `brand_id` = $brand_id";
        return $this->db_query($sql); // returns true on success, false on failure
    } 
    public function delete_brand($brand_id) {
        $sql = "DELETE FROM`brands` WHERE `brand_id` = $brand_id";
        return $this->db_query($sql); // returns true on success, false on failure
    } 

    public function fetch_all_brands() {
        $sql = "SELECT brand_id, brand_name FROM brands"; // Adjust table name and columns as necessary
        $result = $this->db_fetch_all($sql); // Ensure db_query executes the SQL and returns the result set
        if ($result) {
            return $result; // Adjust this method to fetch and return all rows of the result
        } else {
            return []; // Return an empty array if the query fails
        }
    }
    public function update_prod($product_id,$product_cat,$product_brand,$product_title,$product_price,$product_description,$NewImageName,$product_keywords) {
        $sql = "UPDATE `product` SET `product_cat` = '$product_cat', `product_title`='$product_title',`product_brand`='$product_brand', `product_price`='$product_price', `product_desc`='$product_description', `product_image`='$NewImageName',`product_keywords`='$product_keywords' WHERE `product_id` = $product_id";
        return $this->db_query($sql); // returns true on success, false on failure
    } 

    public function fetch_all_products() {
        $sql = "SELECT product_title, product_desc,product_price,product_image  FROM products"; // Adjust table name and columns as necessary
        $result = $this->db_fetch_all($sql); // Ensure db_query executes the SQL and returns the result set
        if ($result) {
            return $result; // Adjust this method to fetch and return all rows of the result
        } else {
            return []; // Return an empty array if the query fails
        }
        
    } 

    
        

    }

    
?>