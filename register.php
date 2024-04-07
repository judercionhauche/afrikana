<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Chore Management System</title>
    <link rel="stylesheet" href="css/signup-style.css">
</head>
<body>

    <div class="login-container">
        <div class="login-box">
            <h2>Signup</h2>
            <form action="actions/register_user_actions.php" method="POST" enctype="multipart/form-data"> <!-- Updated for file upload -->
            
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="full_Name" required>
            
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="Customer_Contact" required>
            
                <label for="email">Email:</label>
                <input type="email" id="email" name="Email" required>
            
                <label for="password">Password:</label>
                <input type="password" id="password" name="Password" required>
            
                <label for="password-retype">Retype Password:</label>
                <input type="password" id="password-retype" name="Retype_Password" required>

                <!-- New fields added below -->
                <label for="country">Customer Country:</label>
                <input type="text" id="country" name="Customer_Country" required>

                <label for="city">Customer City:</label>
                <input type="text" id="city" name="Customer_City" required>
            
                <button type="submit" id = "register" name="submit">Register</button>
                <p class="login">Already have an account? <a href="Signin.php">Login</a></p>
            </form>
        </div>
        <script src="js/register_val.js"></script>
    </div>
</body>
</html>
