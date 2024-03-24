<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once ("./controllers/general_controller.php");
$categories = get_all_categories();
$brands = get_all_brands();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addprod-style.css">
    <title>Add Product</title>
</head>
<body>
    
</body>
</html>
<!-- Add Product Content -->
<div id="addProduct" class="content-section">
    <h2>Add New Product</h2>
    <form action= "actions/addprod_actions.php" class= "addProductForm"  method ="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productCategory">Category:</label>
                <select id="productCategory" name="productCategory" required>
                    <option value="">Select a Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="productBrand">Brand:</label>
                <select id="productBrand" name="productBrand" required>
                    <option value="">Select a brand</option>
                    <?php foreach ($brands as $brand): ?>
                        <option value="<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="productDescription">Description:</label>
            <textarea id="productDescription" name="productDescription" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="productKeywords">Product Keywords:</label>
            <textarea id="productKeywords" name="productKeyWords" rows="1" required></textarea>
        </div>

            <div class="form-group">
                <label for="productPrice">Price (GHC):</label>
                <input type="number" id="productPrice" name="productPrice" step="0.01" required>
            </div>
        </div>
        <div class="form-group">
            <label for="productImages">Product Images:</label>
            <input type="file" id="productImages" name="image[]" multiple>
        </div>
        <button type="submit" name="submit" class="submit-btn">Add Product</button>
    </form>
</div>


