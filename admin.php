
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin-style.css">
</head>
<body>
    <div class="admin-container">
        <div id="sidebar">
            <button onclick="showDashboard()">Dashboard</button>
            <button onclick="window.location.href='addcategory.php'">Add Category</button>
            <button onclick="window.location.href='managecategory.php'">Manage Category</button>
            <button onclick="window.location.href='managebrand.php'">Manage Brand</button>
            <button onclick="window.location.href='addprod.php'">Add Product</button>
        </div>
        <div id="mainContent">
            <!-- Dynamic content will be injected here -->
        </div>
    </div>   
</body>
</html>
