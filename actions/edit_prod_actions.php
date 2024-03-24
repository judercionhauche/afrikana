<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/general_controller.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the brand ID and name are provided in the POST request
    if (isset($_POST['edit']) ){ 
        $product_id= $_POST["product_id"];
        $product_cat = $_POST["productCategory"];
        $product_brand = $_POST["productBrand"];
        $product_title = $_POST["productName"];
        $product_price = $_POST["productPrice"];
        $product_description = $_POST["productDescription"];
        $newImage = $_POST["image"];
        $product_keywords = $_POST["productKeyWords"];

        header('Location: ../edit_brand.php?brand_id='.$product_id.'&brand_name='.$product_title); // Adjust this to your needs
      exit();
    }
    
    elseif (isset($_POST['product_id']) && isset($_POST['productName'])&& isset($_POST['productCategory'])&& isset($_POST['productBrand'])&& isset($_POST['productPrice'])&& isset($_POST['productDescription'])&& isset($_POST['image'])&& isset($_POST['productKeyWords'])) {
        $product_id= $_POST["product_id"];
        $product_cat = $_POST["productCategory"];
        $product_brand = $_POST["productBrand"];
        $product_title = $_POST["productName"];
        $product_price = $_POST["productPrice"];
        $product_description = $_POST["productDescription"];
        $newImage = $_POST["image"];
        $product_keywords = $_POST["productKeyWords"];


        // Initialize the General_Controller and attempt to update the brand
        $controller = new General_Class();
        $result = $controller->update_prod($product_id,$product_cat,$product_brand,$product_title,$product_price,$product_description,$product_image,$product_keywords);

        if ($result) {
            // Update successful
            $_SESSION['message'] = 'Product updated successfully.';
            header('Location: ../managebrand.php'); // Adjust this to your needs
        } else {
            // Update failed
            $_SESSION['error'] = 'Failed to update Product. Please try again.';
            header('Location: ../managebrand.php'); // Adjust this to your needs
        }
    } else {
        // Required data not provided
        $_SESSION['error'] = 'Please provide all required data.';
        header('Location: ../managebrand.php'); // Adjust this to your needs
    }
} else {
    // Not a POST request
    header('Location: ../managebrand.php'); // Adjust this to your needs
}
?>
