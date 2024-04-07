<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/general_controller.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the brand ID and name are provided in the POST request
    if (isset($_POST['edit']) ){ 
       $category_id= $_POST["category_id"];
       $category_name =$_POST["category_name"];
        header('Location: ../view/edit_category.php?category_id='.$category_id.'&category_name='.$category_name); // Adjust this to your needs
      exit();
    // echo 'yuyyguiu';

    }
    
    elseif (isset($_POST['category_id']) && isset($_POST['category_name'])) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];

        // Initialize the General_Controller and attempt to update the brand
        $controller = new General_Class();
        $result = $controller->update_category($category_id, $category_name);

        if ($result) {
            // Update successful
            $_SESSION['message'] = 'Category updated successfully.';
            header('Location: ../managecategory.php'); // Adjust this to your needs
        } else {
            // Update failed
            $_SESSION['error'] = 'Failed to update brand. Please try again.';
            header('Location: ../managecategory.php'); // Adjust this to your needs
        }
    } else {
        // Required data not provided
        $_SESSION['error'] = 'Please provide all required data.';
        header('Location: ../managecategory.php'); // Adjust this to your needs
    }
} else {
    // Not a POST request
    header('Location: ../managecategory.php'); // Adjust this to your needs
}
?>
