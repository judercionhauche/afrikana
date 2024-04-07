<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/general_controller.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the brand ID and name are provided in the POST request
    if (isset($_POST['edit']) ){ 
       $brand_id= $_POST["brand_id"];
       $brand_name =$_POST["brand_name"];
        header('Location: ../edit_brand.php?brand_id='.$brand_id.'&brand_name='.$brand_name); 
      exit();

    }
    
    elseif (isset($_POST['brand_id']) && isset($_POST['brand_name'])) {
        $brand_id = $_POST['brand_id'];
        $brand_name = $_POST['brand_name'];

        $controller = new General_Class();
        $result = $controller->update_brand($brand_id, $brand_name);

        if ($result) {
            // Update successful
            $_SESSION['message'] = 'Brand updated successfully.';
            header('Location: ../managebrand.php'); 
        } else {
            // Update failed
            $_SESSION['error'] = 'Failed to update brand. Please try again.';
            header('Location: ../managebrand.php'); 
        }
    } else {
        // Required data not provided
        $_SESSION['error'] = 'Please provide all required data.';
        header('Location: ../managebrand.php'); 
    }
} else {
    // Not a POST request
    header('Location: ../managebrand.php'); 
}
?>
