<?php
// Start the session in every auth function call to ensure $_SESSION can be used
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['username']);
}

// Function to check if the logged-in user is an admin
function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

// Function to redirect a user to the login page if they are not logged in
function verifyLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php'); // Redirect to login page
        exit();
    }
}

// Function to stop a non-admin user from accessing a page
function verifyAdmin() {
    verifyLogin(); // First, make sure the user is logged in
    if (!isAdmin()) {
        // You can change this to redirect to a different page or show an error message
        die("Access denied: You do not have administrator access.");
    }
}
?>