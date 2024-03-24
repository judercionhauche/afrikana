<?php

// Start session
session_start(); 

// For header redirection
ob_start();

// Function to check for login
function isLoggedIn(){
    return !empty($_SESSION["username"]);
}

// Function to check for role (admin, customer, etc)

// Other core functionalities

// Corrected IsAdmin function
function IsAdmin(){
    // Use '==' for loose comparison or '===' for strict comparison
    return !empty($_SESSION["user_role"]) && $_SESSION["user_role"] === "1";
}

// Possible other functions and code


?>
