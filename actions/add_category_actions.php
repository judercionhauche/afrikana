<?php
include_once(__DIR__ . '/../controllers/general_controller.php');
include_once(__DIR__ . '/../settings/db_cred.php');

// Assuming the isLoggedIn() and isAdmin() functions are defined in the 'auth_functions.php' file or similar
// Make sure to include or require that file here if it's necessary for user validation
// For this example, I'll assume these functions are globally accessible


// Check if the user is logged in and is an admin
// Replace 'isLoggedIn' and 'isAdmin' with the actual functions you have for checking login and admin status
// if (!isLoggedIn() || !isAdmin()) {
//     // User is not logged in or not an admin, redirect to login page or show an error message
//     header('Location: ../index.php'); // Redirect to login page
//     exit(); // Stop script execution
// }

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize the POST data to prevent XSS or SQL Injection
    // $cat_name = filter_input(INPUT_POST, 'cat_name', FILTER_SANITIZE_STRING);
    $cat_name = $_POST["cat_name"];


    // Call the add_category method from the controller
    if (add_category($cat_name)) {
        // If category is successfully added, redirect or show a success message
        header("Location: ../product.php"); // Redirect to admin page with a success message
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
