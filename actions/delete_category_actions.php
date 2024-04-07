<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/general_controller.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the brand ID and name are provided in the POST request
    if (isset($_POST['delete']) ){ 
    // echo 'yuyyguiu';
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];

    // Initialize the General_Controller and attempt to update the brand
    $controller = new General_Class();
    $result = $controller->delete_category($category_id);

    if ($result) {
        // Update successful
        $_SESSION['message'] = 'category deleted successfully.';
        header('Location: ../managecategory.php'); // Adjust this to your needs
    } else {
        // Delete failed
        $_SESSION['error'] = 'Failed to update brand. Please try again.';
        header('Location: ../managecategory.php'); // Adjust this to your needs
    }

    }
  
} else {
    // Not a POST request
    header('Location: ../managecategory.php'); // Adjust this to your needs
}
?>
