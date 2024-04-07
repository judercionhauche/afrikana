<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/general_controller.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the brand ID and name are provided in the POST request
    if (isset($_POST['delete']) ){ 
    $p_id = $_POST['p_id'];
    $customer_id = $_POST['c_id'];

    $controller = new General_Class();
    $result = $controller->delete_cart_item($p_id,$customer_id);

    if ($result) {
        // Update successful
        $_SESSION['message'] = 'Item deleted successfully.';
        header('Location: ../cart.php'); 
    } else {
        // Delete failed
        $_SESSION['error'] = 'Failed to delete item. Please try again.';
        header('Location: ../cart.php'); 
    }

    }
  
} else {
    // Not a POST request
    header('Location: ../cart.php'); 
}
?>
