<?php
include_once(__DIR__ . '/../controllers/general_controller.php');
include_once(__DIR__ . '/../settings/db_cred.php');

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cat_name = $_POST["cat_name"];

    // Call the add_category method from the controller
    if (add_category($cat_name)) {
        // If category is successfully added, redirect or show a success message
        header("Location: ../managecategory.php"); // Redirect to admin page with a success message
        exit();
    } else {
        // If there's an error adding the category, handle the error (e.g., display an error message)
        echo "Error adding category."; // Simple error message, consider improving for user experience
    }
} else {
    // If not POST method, redirect to the form page or show an error
    header("Location: ../index.php"); // Redirect back to the add category form
    exit();
}

?>
