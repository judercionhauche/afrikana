<?php

// Start session
session_start(); 

// For header redirection
ob_start();

// Function to check for login
function isLoggedIn(){
    return !empty($_SESSION["customer_id"]);
}


// Corrected IsAdmin function
function IsAdmin(){
    return !empty($_SESSION["user_role"]) && $_SESSION["user_role"] === "2";
}

?>
