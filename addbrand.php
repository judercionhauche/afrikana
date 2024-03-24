
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addbrand-style.css">
    <title>add category</title>
</head>
<body>
    
</body>
</html>
<!-- Add Category Content -->
<div id="addbrand" class="content-section">
    <h2>Add New Category</h2>
    <form action="actions/add_brand_actions.php" method="post" id="addBrandForm">
        <div class="form-group" >
            <label for="brandName">Brand Name:</label>
            <input type="text" id="brandName" name="brand_name" required>
        </div>
        <div class="form-group">
        <button type="submit" class="submit-btn">Add Brand</button>
    </form>
</div>
<script src="js/ValidateBrandForm.js"></script>

