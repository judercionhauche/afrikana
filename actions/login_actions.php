<?php

echo "nofklefm"
// session_start();
// include_once(__DIR__ . '/../functions/auth_functions.php');

 // Assume this file contains your database connection settings
// Establish a connection to the database
// $conn = new mysqli($host, $username, $password, $database);

// Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// if (isset($_POST["submit"])) {
//     $username = $_POST['name'];
//     $password = $_POST['password']; // This should be hashed and checked against a hashed password in the database

//     // Proper validation and sanitation to prevent SQL injection
//     $username = $conn->real_escape_string($username);
//     $password = $conn->real_escape_string($password);
//     echo "jud";


   
    // if ($result->num_rows > 0) {
    //     $row = $result->fetch_assoc();

        // if (password_verify($password, $row['password'])) {
            // // Password is correct, now check if user is admin
            // $_SESSION['username'] = $username;
            // $_SESSION['user_role'] = $row['user_role'];

            // if (isAdmin()) {
            //     echo "kjednkjed";
            //     header("Location: ../admin.php"); // Redirect to the admin dashboard
            // } else {
            //     header("Location:../ index.php"); // Redirect to a regular user dashboard
            // }
            // exit();
        // }
    // }
    // // Login failed
    // echo "Login failed. You are not an admin.";
// }

// SQL to check the user's credentials (Use prepared statements to prevent SQL injection)
// Prepare and bind parameters
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ss", $username, $password); // 'ss' indicates two parameters of type string
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//     // User exists, fetch user role
//     $row = $result->fetch_assoc();
//     $_SESSION["username"] = $username; // Store username in session
//     $_SESSION["user_role"] = $row['user_role']; // Store user role in session

//     // Redirect user based on role
//     if ($_SESSION["user_role"] == "1") {
//         header("Location: index.php"); // Redirect to admin panel
//     } else {
//         header("Location: admin.php"); // Redirect to user dashboard
//     }
// } else {
//     // Authentication failed
//     echo "Invalid username or password.";
// }

// $stmt->close();
// $conn->close();
?>

