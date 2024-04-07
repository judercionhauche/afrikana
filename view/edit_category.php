

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <?php
    $category_name= $_GET['category_name'];
    $category_id= $_GET['category_id'];

    ?>
<!-- edit_brand.php -->
<div id="editBrand" class="content-section">
    <h2>Edit Category</h2>
    <form action="../actions/edit_category_actions.php" method="post" id="updateCategoryForm">
        <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category_id); ?>">
        <div class="form-group">
            <label for="brandName">Category Name:</label>
            <input type="text" id="catName" name="category_name" value="<?php echo htmlspecialchars($category_name); ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="submit-btn">Update Category</button>
        </div>
    </form>
</div>
<script src="js/validateBrandUpdateForm.js"></script>
</body>
</html>


