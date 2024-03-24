
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addprod-style.css">
    <title>add category</title>
</head>
<body>
    
</body>
</html>
<!-- Add Category Content -->
<div id="addCategory" class="content-section">
    <h2>Add New Category</h2>
    <form action="actions/add_category_actions.php" method="post" id="addCategoryForm">
        <div class="form-group" >
            <label for="categoryName">Category Name:</label>
            <input type="text" id="categoryName" name="cat_name" required>
        </div>
        <div class="form-group">
        <button type="submit" class="submit-btn">Add Category</button>
    </form>
</div>
<script src="js/validateCategoryForm.js"></script>

