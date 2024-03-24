

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
</head>
<body>
    <?php
    $brand_name= $_GET['brand_name'];
    $brand_id= $_GET['brand_id'];

    ?>
<!-- edit_brand.php -->
<div id="editBrand" class="content-section">
    <h2>Edit Brand</h2>
    <form action="actions/edit_brand_actions.php" method="post" id="updateBrandForm">
        <input type="hidden" name="brand_id" value="<?php echo htmlspecialchars($brand_id); ?>">
        <div class="form-group">
            <label for="brandName">Brand Name:</label>
            <input type="text" id="brandName" name="brand_name" value="<?php echo htmlspecialchars($brand_name); ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="submit-btn">Update Brand</button>
        </div>
    </form>
</div>
<script src="js/validateBrandUpdateForm.js"></script>
</body>
</html>


