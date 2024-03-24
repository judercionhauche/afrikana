
<?php

//connect to the user account class
include_once(__DIR__ . '/../classes/general_class.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

 function add_category($cat_name){
 $categories=new General_Class ();
 return $categories->add_category($cat_name);
 }

 function add_brand($brand_name){
    $categories=new General_Class ();
    return $categories->add_brand($brand_name);
    }
   
function add_user_ctr($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $customer_image, $user_role) {
    $customer = new General_Class();
    return $customer->register_user($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $customer_image, $user_role);
}

function get_all_categories() {
    $generalClass = new General_Class();
    return $generalClass->get_all_categories();
}


function add_prod($product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords){
    $products=new General_Class();
    return $products->add_prod($product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords);
    }
function get_all_brands() {
    $generalClass = new General_Class();
    return $generalClass->fetch_all_brands();
}
function update_brand($brand_id, $brand_name) {
        $brand = new General_Class();
        return $brand->update_brand($brand_id, $brand_name);
    }
function update_prod($product_id,$product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords) {
        $brand = new General_Class();
        return $brand->update_prod($product_id,$product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords);
    }
 function delete_brand($brand_id) {
        $brand = new General_Class();
        return $brand->delete_brand($brand_id);
    }
function fetch_all_products() {
        $generalClass = new General_Class();
        return $generalClass->fetch_all_products();
    }
 //Call the method defined in general_class
//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }

//--INSERT--//

//--SELECT--//

//--UPDATE--//

//--DELETE--//
?>