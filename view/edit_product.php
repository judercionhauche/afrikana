<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once ("../controllers/general_controller.php");
$categories = get_all_categories();
$brands = get_all_brands();
$products = fetch_all_products();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/addprod-style.css">
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
                <input type="text" id="productName" name="productName" value= "<?php echo  $products['product_title'] ; ?>"required>
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
            <textarea id="productDescription" name="productDescription" rows="4" value= "<?php echo  $products['product_desc'] ; ?>"required></textarea>
        </div>
        <div class="form-group">
            <label for="productKeywords">Product Keywords:</label>
            <textarea id="productKeywords" name="productKeyWords" rows="1" value= "<?php echo  $products['product_keywords'] ; ?>"required><?php echo  $products['product_keywords'] ; ?></textarea>
        </div>

            <div class="form-group">
                <label for="productPrice">Price (GHC):</label>
                <input type="number" id="productPrice" name="productPrice" step="0.01" value= "<?php echo  $products['product_price'] ; ?>"required>
            </div>
        </div>
        <div class="form-group">
            <label for="productImages">Product Images:</label>
            <img src="<?php echo $products['product_image']; ?>" alt="Product Image">
            <input type="file" id="image" name="image" accept="image/*">
            <input type="hidden" name="edit" value="">
            <input type="hidden" name="product_id" value="<?php echo $products["product_id"]; ?>">
        </div>
        <button type="submit" name="submit" class="submit-btn">Add Product</button>
    </form>
</div>


