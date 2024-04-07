<?php
// In add_to_cart_actions.php

require_once('../controllers/general_controller.php'); 
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if(isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];
    } else {
        exit(); // Exit if customer ID is not set
    }

    if (isset($_POST['p_id']) && isset($_POST['qty']) && isset($_POST['customer_id'])) {
        $product_id = htmlspecialchars($_POST['p_id']);
        $quantity = htmlspecialchars($_POST['qty']);
       
        if ($customer_id) {
            $controller = new General_Class();
            $result = $controller->fetch_one_cart_item($product_id, $customer_id);
            // Check if the product is already in the cart

            if ($result) {
                // If the product is already in the cart, update the quantity
                $new_quantity = $result['qty'] + $quantity;
                $result = update_cart_item($result['p_id'],$customer_id, $new_quantity);
            }
             else {
                $result = add_to_cart($product_id, $customer_id, $quantity);
            }

            if ($result) {
                header("Location: ../cart.php");
                exit();
            } else {
                echo "Failed to update cart.";
            }
            
        } else {
            echo "Invalid customer ID.";
        }
    } else {
        echo "Product ID, quantity, or customer ID is missing.";
    }
} else {
    echo "Form submission method is not allowed.";
}
?>
