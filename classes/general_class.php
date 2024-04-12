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


class General_Class extends db_connection {
    // Method to add a new category
    public function add_category($cat_name) {
        $sql = "INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name')";
        return $this->db_query($sql); 
    }
   
    public function check_user_by_email($email) {
        // Sanitize the email input to prevent SQL injection
        $escaped_email = mysqli_real_escape_string($this->db_conn(), $email);
    
        // Prepare the SQL query to check if a user with the given email exists
        $sql = "SELECT COUNT(*) AS count FROM customer WHERE customer_email = '$escaped_email'";
        
        // Execute the query
        $result = mysqli_query($this->db_conn(), $sql);
    
        // Check if the query was successful
        if ($result) {
            // Fetch the result row
            $row = mysqli_fetch_assoc($result);
            
            // Check if a row was returned
            if ($row && $row['count'] > 0) {
                return true; // User with the given email exists
            }
        }
        
        return false; // User with the given email does not exist or query failed
    }
    
    
    public function register_user($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $user_role) {
        $hashed_password = password_hash($customer_pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO customer (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, user_role) VALUES ('$customer_name', '$customer_email', '$hashed_password', '$customer_country', '$customer_city', '$customer_contact', '$user_role')";
        return $this->db_query($sql);
    }
    public function add_brand($brand_name) {
        $sql = "INSERT INTO `brands` (`brand_name`) VALUES ('$brand_name')";
        return $this->db_query($sql); 
    }
    public function create_order_details($oder_id,$product_id,$qty) {
        $sql = "INSERT INTO `orderdetails` (`order_id`,`product_id`,`qty`) VALUES ('$oder_id','$product_id','$qty')";
        return $this->db_query($sql); 
    }
    public function create_order($customer_id, $invoice_no, $order_date, $order_status) {
        $sql = "INSERT INTO `orders` (`customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$customer_id', '$invoice_no', '$order_date', '$order_status')";
        return $this->db_query($sql); 
    }
    public function add_payment($amount, $customer_id, $order_id, $currency,$payment_date) {
        $sql = "INSERT INTO `payment` (`amt`, `customer_id`, `order_id`, `currency`,`payment_date`) VALUES ('$amount','$customer_id', '$order_id', '$currency', '$payment_date')";
        return $this->db_query($sql); 
    }
  
   
    public function add_prod($product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords) {
        $sql = "INSERT INTO `products` (`product_cat`,`product_brand`,`product_title`,`product_price`,`product_desc`,`product_image`,`product_keywords`) VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_description','$product_image','$product_keywords')";
        return $this->db_query($sql); 
    }
    public function update_brand($brand_id, $brand_name) {
        // Check if $brand_id is empty
        if (empty($brand_id)) {
            return false; // Return false if $brand_id is empty
        }
            if (!$this->db_connect()) {
            return false; // Return false if connection fails
        }
            $escaped_brand_name = mysqli_real_escape_string($this->db, $brand_name);
            $sql = "UPDATE `brands` SET `brand_name` = '$escaped_brand_name' WHERE `brand_id` = $brand_id";
            return $this->db_query($sql); 
    }
    public function get_last_inserted_order_id() {
        // Prepare the SQL statement to retrieve the last inserted order_id
        $sql = "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1";
        
        // Execute the query
        $result = $this->db_fetch_one($sql);
        
        // Check if a row was returned and if order_id is set
        if ($result && isset($result['order_id'])) {
            return $result['order_id']; // Return the fetched order_id
        } else {
            return false; // Return false if no row was returned or order_id is not set
        }
    }
    
    
    public function update_prod($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_description, $product_image, $product_keywords) {
        // Check if $product_id is empty
        if (empty($product_id)) {
            return false; // Return false if $product_id is empty
        }
    
        if (!$this->db_connect()) {
            return false; // Return false if connection fails
        }
    
        // Escape user inputs to prevent SQL injection
        $escaped_product_cat = mysqli_real_escape_string($this->db, $product_cat);
        $escaped_product_brand = mysqli_real_escape_string($this->db, $product_brand);
        $escaped_product_title = mysqli_real_escape_string($this->db, $product_title);
        $escaped_product_description = mysqli_real_escape_string($this->db, $product_description);
        $escaped_product_image = mysqli_real_escape_string($this->db, $product_image);
        $escaped_product_keywords = mysqli_real_escape_string($this->db, $product_keywords);
    
        // Construct SQL query to update product
        $sql = "UPDATE `products` SET 
                `product_cat` = '$escaped_product_cat', 
                `product_brand` = '$escaped_product_brand', 
                `product_title` = '$escaped_product_title', 
                `product_price` = $product_price, 
                `product_description` = '$escaped_product_description', 
                `product_image` = '$escaped_product_image', 
                `product_keywords` = '$escaped_product_keywords' 
                WHERE `product_id` = $product_id";
    
        // Execute the query
        return $this->db_query($sql);
    }
    
    
    public function update_category($category_id, $category_name) {
        // Check if $category_id is empty
        if (empty($category_id)) {
            return false; // Return false if $category_id is empty
        }
            if (!$this->db_connect()) {
            return false; // Return false if connection fails
        }
            $escaped_category_name = mysqli_real_escape_string($this->db, $category_name);
        
        // Prepare the SQL statement
        $sql = "UPDATE `categories` SET `cat_name` = '$escaped_category_name' WHERE `cat_id` = $category_id"; 
        // Execute the query
        return $this->db_query($sql); 
    }

    public function update_cart($product_id, $qty) {
        // Check if $product_id is empty
        if (empty($product_id)) {
            return false; // Return false if $product_id is empty
        }
    
        if (!$this->db_connect()) {
            return false; // Return false if connection fails
        }
    
        $escaped_product_id = (int)$product_id; 
        $escaped_qty = (int)$qty; 
    
        // Prepare the SQL statement
        $sql = "UPDATE `cart` SET `qty` = '$escaped_qty' WHERE `p_id` = '$escaped_product_id'"; 
    
        // Execute the query
        return $this->db_query($sql); 
    }

    public function fetch_all_cart_items() {
        $sql = "SELECT cart.*, products.product_desc, products.product_price,products.product_image FROM cart
                INNER JOIN products ON cart.p_id = products.product_id";
     
        $result = $this->db_fetch_all($sql); 
        if ($result) {
            return $result; 
        } else {
            return []; 
        }
    }
    public function fetch_items_by_c_id($c_id) {
        $sql = "SELECT cart.*, products.product_title, products.product_price 
                FROM cart 
                INNER JOIN products ON cart.p_id = products.product_id 
                WHERE cart.c_id = $c_id";
        $result = $this->db_fetch_all($sql); 
        if ($result) {
            return $result; 
        } else {
            return []; 
        }
    }

    public function fetch_items_by_order_id($order_id) {
        // Prepare the SQL statement
        $sql = "SELECT orderdetails.*, products.product_title, orderdetails.qty,products.product_price
                FROM orderdetails
                INNER JOIN products ON orderdetails.product_id = products.product_id
                WHERE orderdetails.order_id = $order_id";

        $result = $this->db_fetch_all($sql); 
        if ($result) {
            return $result; 
        } else {
            return []; 
        }
        }
    
        public function fetch_order_details() {
            // Prepare the SQL statement with ORDER BY and LIMIT to select the last 10 orders
            $sql = "SELECT orders.*, payment.amt, customer.customer_name
                    FROM orders
                    INNER JOIN payment ON orders.customer_id = payment.customer_id
                    INNER JOIN `customer` ON orders.customer_id = customer.customer_id
                    ORDER BY orders.order_id ASC
                    LIMIT 10"; // Add ORDER BY and LIMIT to select the last 10 orders
        
            $result = $this->db_fetch_all($sql); 
            if ($result) {
                return $result; 
            } else {
                return []; 
            }
        }
        
    public function fetch_product_by_category($cat_id) {
        $sql = "SELECT * FROM products WHERE `product_cat`= $cat_id" ;
        $result = $this->db_fetch_all($sql); 
        if ($result) {
            return $result; 
        } else {
            return []; 
        }
            
    }
    public function select_last_inserted_order() {
        // Prepare the SQL statement
        $sql = "SELECT MAX(order_id) AS last_order_id FROM orderdetails";
        
        // Execute the query
        $result = $this->db_fetch_one($sql);
        
        // Check if a row was returned
        if ($result) {
            return $result['last_order_id'];
        } else {
            return null; // Return null if no order is found
        }
    }
    
    public function delete_brand($brand_id) {
        $sql = "DELETE FROM brands WHERE brand_id = $brand_id";
        return $this->db_query($sql); 
    } 
    public function delete_cart_item($p_id, $c_id) {
        $sql = "DELETE FROM cart WHERE p_id = $p_id AND c_id = $c_id";
        return $this->db_query($sql); 
    }
    
    public function delete_category($category_id) {
        $sql = "DELETE FROM categories WHERE cat_id = $category_id";
        return $this->db_query($sql); 
    } 


    public function fetch_all_brands() {
        $sql = "SELECT brand_id, brand_name FROM brands"; 
        $result = $this->db_fetch_all($sql); // Ensure db_query executes the SQL and returns the result set
        if ($result) {
            return $result; // Adjust this method to fetch and return all rows of the result
        } else {
            return []; // Return an empty array if the query fails
        }
    }
    public function get_all_categories() {
        $sql = "SELECT cat_id, cat_name FROM categories"; // Assuming the table name is 'categories' and columns are 'category_id' and 'category_name'
        $result = $this->db_fetch_all($sql); // Assuming db_fetch_all() fetches all rows from the database
        if ($result) {
            return $result; // Return the result if successful
        } else {
            return []; // Return an empty array if the query fails or returns no results
        }
    }
    
    public function fetch_all_products() {
        $sql = "SELECT *  FROM products"; 
        $result = $this->db_fetch_all($sql); // Ensure db_query executes the SQL and returns the result set
        if ($result) {
            return $result; // Adjust this method to fetch and return all rows of the result
        } else {
            return []; // Return an empty array if the query fails
        }
            
    } 
    public function fetch_order_by_id($order_id) {
        $sql = "SELECT *  FROM orders WHERE `order_id`=$order_id"; 
        $result = $this->db_fetch_all($sql); // Ensure db_query executes the SQL and returns the result set
        if ($result) {
            return $result; // Adjust this method to fetch and return all rows of the result
        } else {
            return []; // Return an empty array if the query fails
        }
            
    } 
    public function fetch_one_product($product_id) {
        $sql = "SELECT *  FROM products WHERE `product_id`= $product_id " ; 
        $result = $this->db_fetch_one($sql); // Ensure db_query executes the SQL and returns the result set
        if ($result) {
            return $result; // Adjust this method to fetch and return all rows of the result
        } else {
            return []; // Return an empty array if the query fails
        }
            
    } 
    public function fetch_one_cart_item($p_id) {
        $sql = "SELECT *  FROM cart WHERE `p_id`= $p_id " ; 
        $result = $this->db_fetch_one($sql); 
        if ($result) {
            return $result; 
        } else {
            return []; 
        }
            
    } 
public function update_cart_item($p_id, $c_id, $qty) {
    if (empty($p_id) || empty($c_id) || !is_numeric($qty) || $qty <= 0) {
        return false; 
    }

    if (!$this->db_connect()) {
        return false; 
    }

    // Prepare the SQL statement to increment the quantity
    $sql = "UPDATE `cart` SET `qty` = '$qty' WHERE `p_id` = '$p_id' AND `c_id` ='$c_id'"; 

    // Execute the query
    return $this->db_query($sql); 
}

    
    
    

    public function search_products($query) {
        $sql = "SELECT * FROM products WHERE product_title LIKE '%$query%' OR product_desc LIKE '%$query%' OR product_keywords LIKE '%$query%'";
        return $this->db_fetch_all($sql);
    }
    public function select_trending_products() {
        $sql = "SELECT 
        od.product_id,
        p.product_title,
        p.product_price,
        p.product_image,
        SUM(od.qty) AS total_quantity
    FROM 
        orderdetails od
    INNER JOIN 
        products p ON od.product_id = p.product_id
    GROUP BY 
        od.product_id, p.product_title, p.product_price
    ORDER BY 
        total_quantity DESC
    LIMIT 6;
    ";
        return $this->db_fetch_all($sql);
    }
   
    public function add_to_cart($product_id,$customer_id,$qty) {
        $sql = "INSERT INTO `cart` (`p_id`,`c_id`,`qty`) VALUES ('$product_id','$customer_id','$qty')";
        return $this->db_query($sql); 
    }

    public function check_login($customer_email, $customer_pass) {
        $email = mysqli_real_escape_string($this->db_conn(), $customer_email);
        $password = mysqli_real_escape_string($this->db_conn(), $customer_pass);

        $sql = "SELECT * FROM customer WHERE customer_email = '$email'";
        $result = $this->db_fetch_one($sql);
    
        // Check if a row was returned
        if ($result) {
            $hashed_password = $result['customer_pass'];
            // Verify the password
            if (password_verify($password, $hashed_password)) {
                //return true;
                return $result;
            } else {
                // Passwords don't match, return false (login failed)
                return false;
            }
        } else {
            return false;
        }
    }
    public function get_role_id($customer_email) {
        $email = mysqli_real_escape_string($this->db_conn(), $customer_email);
        $sql = "SELECT * FROM customer WHERE customer_email = '$email'";
        $result = $this->db_fetch_one($sql);
    
        // Check if a row was returned
        if ($result) {
            return $result['user_role'];
            // Verify the password
        } else {
            return 1;
        }
    }
    
    public function clear_cart($customer_id) {
        // Check if $customer_id is empty
        if (empty($customer_id)) {
            return false; // Return false if $customer_id is empty
        }
    
        if (!$this->db_connect()) {
            return false; // Return false if connection fails
        }
    
        // Prepare the SQL statement to delete cart items for the given customer ID
        $sql = "DELETE FROM cart WHERE c_id = '$customer_id'";
            return $this->db_query($sql); 
    }
    
    public function count_customers() {
        // Prepare the SQL statement to count the payments
        $sql = "SELECT COUNT(*) AS customer_count FROM customer";
        
        // Execute the query
        $result = $this->db_fetch_one($sql);
        
        // Check if the query executed successfully
        if ($result !== false && isset($result['customer_count'])) {
            // Return the count of payments
            return $result['customer_count'];
        } else {
            // Return 0 if there are no payments or an error occurred
            return 0;
        }
    }
    
    public function sum_customers() {
        $sql = "SELECT COUNT(*) AS total_customers FROM customers";
        $result = $this->db_fetch_one($sql);
        if ($result) {
            return $result['total_customers'];
        } else {
            return 0;
        }
    }
    
    public function count_payments() {
        // Prepare the SQL statement to count the payments
        $sql = "SELECT COUNT(*) AS payment_count FROM payment";
        
        // Execute the query
        $result = $this->db_fetch_one($sql);
        
        // Check if the query executed successfully
        if ($result !== false && isset($result['payment_count'])) {
            // Return the count of payments
            return $result['payment_count'];
        } else {
            // Return 0 if there are no payments or an error occurred
            return 0;
        }
    }
    
    public function count_orders() {
        $sql = "SELECT COUNT(*) AS order_count FROM orders";
        $result = $this->db_fetch_one($sql);
        if ($result) {
            return $result['order_count'];
        } else {
            return 0;
        }
    }
    public function sum_payments() {
        $sql = "SELECT SUM(amt) AS total_payments FROM payment";
        $result = $this->db_fetch_one($sql);
        if ($result) {
            return $result['total_payments'];
        } else {
            return 0;
        }
    }
    
    }
    
?>