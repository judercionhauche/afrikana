<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once(__DIR__ . '/../settings/core.php');
include_once(__DIR__ . '/../controllers/general_controller.php');

if(isset($_POST['submit'])) {
    if(isset($_POST['name']) && isset($_POST['password']) && !empty($_POST['name']) && !empty($_POST['password'])) {
        // Include your General_Class to access the login functionality
        include_once(__DIR__ . '/../classes/general_class.php');
        $username = $_POST['email'];
        $password = $_POST['password'];
        $generalClass = new General_Class();
        $login_result = $generalClass->check_login($username, $password);
        if($login_result) {
            $customer_id = $login_result['customer_id']; 
            $_SESSION['username'] = $username;
            $_SESSION['customer_id'] = $customer_id;
            $_SESSION['email'] = $username;
            $role = $generalClass->get_role_id($customer_email);
            $_SESSION['user_role'] = $role;
            if (isAdmin()){
                header("Location: ../../Admindashboard/index.php");
            }else{
                header("Location: ../index.php");
            }
            exit();
        } else {
          
            $_SESSION['login_error'] = "Invalid username or password";
            header("Location: ../login.php"); 
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Username and password are required";
        header("Location: ../login.php"); 
        exit();
    }
} else {
    header("Location: ../login.php"); 
    exit();
}
?>
