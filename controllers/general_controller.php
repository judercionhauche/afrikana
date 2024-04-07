
<?php

//connect to the user account class
include_once(__DIR__ . '/../classes/general_class.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

 function add_category($cat_name){
 $categories=new General_Class ();
 return $categories->add_category($cat_name);
 }
 function check_user_by_email($email){
    $categories=new General_Class ();
    return $categories->add_category($email);
    }
 function add_brand($brand_name){
    $categories=new General_Class ();
    return $categories->add_brand($brand_name);
    }
function count_payments(){
    $categories=new General_Class ();
    return $categories->count_payments();
    }
function sum_payments(){
    $categories=new General_Class ();
    return $categories->sum_payments();
    }
function fetch_order_details(){
    $categories=new General_Class ();
    return $categories->fetch_order_details();
    }
function count_customers(){
    $categories=new General_Class ();
    return $categories->count_customers();
    }
    function count_orders(){
        $categories=new General_Class ();
        return $categories->count_orders();
        }
function register_user($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact,  $user_role) {
    $customer = new General_Class();
    return $customer->register_user($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $user_role);
}

function get_all_categories() {
    $generalClass = new General_Class();
    return $generalClass->get_all_categories();
}
function fetch_order_by_id($order_id) {
    $generalClass = new General_Class();
    return $generalClass->fetch_order_by_id($order_id);
}


function select_last_inserted_order() {
    $generalClass = new General_Class();
    return $generalClass->select_last_inserted_order();
}
function get_last_inserted_order_id() {
    $generalClass = new General_Class();
    return $generalClass->get_last_inserted_order_id();
}

function add_prod($product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords){
    $products=new General_Class();
    return $products->add_prod($product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords);
    }
function get_all_brands() {
    $generalClass = new General_Class();
    return $generalClass->fetch_all_brands();
}
function select_trending_products() {
    $generalClass = new General_Class();
    return $generalClass->select_trending_products();
}
function create_order_details($order_id,$product_id,$qty) {
    $generalClass = new General_Class();
    return $generalClass->create_order_details($order_id,$product_id,$qty);
}
function update_brand($brand_id, $brand_name) {
        $brand = new General_Class();
        return $brand->update_brand($brand_id, $brand_name);
    }
function update_category($category_id, $category_name) {
    $category = new General_Class();
    return $category->update_category($category_id, $category_name);
}
function update_cart_item($p_id,$c_id,$qty) {
    $category = new General_Class();
    return $category->update_cart_item($p_id,$c_id, $qty);
}
function update_cart($product_id, $qty) {
    $cart = new General_Class();
    return $cart->update_cart($product_id, $qty);
}
function create_order($customer_id, $invoice_no,$order_date,$order_status) {
    $cart = new General_Class();
    return $cart->create_order($customer_id, $invoice_no,$order_date,$order_status);
}
function add_payment($amount, $customer_id, $order_id, $currency,$payment_date
) {
    $cart = new General_Class();
    return $cart->add_payment($amount, $customer_id, $order_id, $currency,$payment_date
);
}

function update_prod($product_id,$product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords) {
        $brand = new General_Class();
        return $brand->update_prod($product_id,$product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords);
    }

 function delete_brand($brand_id) {
        $brand = new General_Class();
        return $brand->delete_brand($brand_id);
    }
function delete_category($category_id) {
    $brand = new General_Class();
    return $brand->delete_category($category_id);
}
function delete_cart_item($c_id,$p_id) {
    $cart = new General_Class();
    return $cart->delete_cart_item($c_id,$p_id);
}
function fetch_all_products() {
        $generalClass = new General_Class();
        return $generalClass->fetch_all_products();
    }
function fetch_all_cart_items() {
    $generalClass = new General_Class();
    return $generalClass->fetch_all_cart_items();
}

    function fetch_one_product($product_id) {
        $generalClass = new General_Class();
        return $generalClass->fetch_one_product($product_id);
    }
    function fetch_items_by_c_id($c_id) {
        $generalClass = new General_Class();
        return $generalClass->fetch_items_by_c_id($c_id);
    }
    function fetch_items_by_order_id($order_id) {
        $generalClass = new General_Class();
        return $generalClass->fetch_items_by_order_id($order_id);
    }
    function fetch_product_by_category($cat_id) {
        $generalClass = new General_Class();
        return $generalClass->fetch_product_by_category($cat_id);
    }
    function fetch_one_cart_item($p_id) {
        $generalClass = new General_Class();
        return $generalClass->fetch_one_cart_item($p_id);
    }
 
function search_products($query) {
        $generalClass = new General_Class();
        return $generalClass->search_products($query);
    }
function add_to_cart($product_id,$customer_id,$qty){
        $categories=new General_Class ();
        return $categories->add_to_cart($product_id,$customer_id,$qty);
}
function check_login($customer_email, $customer_pass) {
    $customer = new General_Class();
    return $customer->check_login($customer_email, $customer_pass);
}
function clear_cart($customer_id) {
    $cart = new General_Class();
    return $cart->clear_cart($customer_id);
}
?>