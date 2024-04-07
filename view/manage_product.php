<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/managebrand-style.css">
    <title>Manage Products</title>
</head>
<body>
    <!-- Manage Brand Content -->
<div id="manageCategory" class="content-section">
    <h2>Manage Products</h2>
    <div class="table-responsive">
        <table class="brand-table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product category</th>
                    <th>Product price</th>
                    <th>Product brand</th>
                    <th>Product image </th>
                    <th>Actions</th>
                </tr>
            </thead>
           
            <tbody>
                <?php
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                include_once ("../controllers/general_controller.php");

                $products = fetch_all_products(); // Ensure this function call matches your setup

             foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product["product_id"]); ?></td>
                        <td><?php echo htmlspecialchars($product["product_title"]); ?></td>
                        <td><?php echo htmlspecialchars($product["product_cat"]); ?></td>
                        <td><?php echo htmlspecialchars($product["product_price"]); ?></td>
                        <td><?php echo htmlspecialchars($product["product_brand"]); ?></td>
                        <td>
                            <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; background-color: #ccc; display: inline-block;">
                                <img src="../img/uploads/<?php echo htmlspecialchars($product["product_image"]); ?>" alt="Product Image" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </td>

                        <td>
                            <!-- Edit Form -->
                            <form action="actions/edit_prod_actions.php" method="POST" style="display: inline;">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product["product_id"]); ?>">
                                <input type="hidden" name="product_title" value="<?php echo htmlspecialchars($product["product_title"]); ?>">
                                <input type="hidden" name="product_cat" value="<?php echo htmlspecialchars($product["product_cat"]); ?>">
                                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product["product_price"]); ?>">
                                <input type="hidden" name="product_brand" value="<?php echo htmlspecialchars($product["product_brand"]); ?>">
                                <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($product["product_image"]); ?>">

                                <input type="submit" class="edit-btn" name="edit" value="edit">
                            </form>
                            
                            <!-- Delete Form -->
                            <form action="actions/delete_category_actions.php" method="POST" style="display: inline;">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product["product_id"]); ?>">
                            <input type="hidden" name="product_title" value="<?php echo htmlspecialchars($product["product_title"]); ?>">
                            <input type="hidden" name="product_cat" value="<?php echo htmlspecialchars($product["product_cat"]); ?>">
                            <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product["product_price"]); ?>">
                            <input type="hidden" name="product_brand" value="<?php echo htmlspecialchars($product["product_brand"]); ?>">
                            <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($product["product_image"]); ?>">
                            <button type="submit" class="delete-btn" name="delete" onclick="return confirm('Are you sure you want to delete this brand?');">Delete</button>
                            </form> 
                        </td>
                    </tr>
                <?php endforeach; ?>
                
             
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

