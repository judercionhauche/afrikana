<?php
// Include necessary files and classes
include_once(__DIR__ . '/../settings/core.php');
include_once(__DIR__ . '/../controllers/general_controller.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $full_Name = trim($_POST['full_Name']);
    $phone = trim($_POST['Customer_Contact']);
    $email = trim($_POST['Email']);
    $password = trim($_POST['Password']);
    $country = trim($_POST['Customer_Country']);
    $city = trim($_POST['Customer_City']);
    $user_role = 1;

    $customer = new General_Class();

    // Check if the email already exists
    $emailExists = $customer->check_user_by_email($email);

    if ($emailExists) {
        // Email already exists, return error message
        $response = array("success" => false, "message" => "Email already exists in the database");
        echo json_encode($response);
        exit();
    } else {
        // Call the controller function to add a new user
        $registrationResult = $customer->register_user($full_Name, $email, $password, $country, $city, $phone, $user_role);

        if ($registrationResult) {
            // Registration successful
            $response = array("success" => true, "message" => "Signup successful!");
            echo json_encode($response);
            exit();
        } else {
            // Registration failed
            $response = array("success" => false, "message" => "Error occurred during registration");
            echo json_encode($response);
            exit();
        }
    }
}
?>
