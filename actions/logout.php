<?php
// Start the session
session_start();
session_unset();

// Destroy all session data
session_destroy();


// Redirect to the login page or any other page as needed
header("Location: ../login.php?success=Logout Successful");
exit;
?>