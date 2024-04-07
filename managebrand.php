<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/managebrand-style.css">
    <title>Manage Brand</title>
</head>
<body>
    <!-- Manage Brand Content -->
<div id="manageBrand" class="content-section">
    <h2>Manage Brands</h2>
    <div class="table-responsive">
        <table class="brand-table">
            <thead>
                <tr>
                    <th>Brand ID</th>
                    <th>Brand Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
           
            <tbody>
                <?php
                include_once(__DIR__ . '/controllers/general_controller.php');
                $brands = get_all_brands(); // Ensure this function call matches your setup

             foreach ($brands as $brand): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($brand["brand_id"]); ?></td>
                        <td><?php echo htmlspecialchars($brand["brand_name"]); ?></td>
                        <td>
                            <!-- Edit Form -->
                            <form action="actions/edit_brand_actions.php" method="POST" style="display: inline;">
                                <input type="hidden" name="brand_id" value="<?php echo htmlspecialchars($brand["brand_id"]); ?>">
                                <input type="hidden" name="brand_name" value="<?php echo htmlspecialchars($brand["brand_name"]); ?>">
                                <input type="submit" class="edit-btn" name="edit" value="edit">
                            </form>
                            
                            <!-- Delete Form -->
                            <form action="actions/delete_brand_actions.php" method="POST" style="display: inline;">
                                <input type="hidden" name="brand_id" value="<?php echo htmlspecialchars($brand["brand_id"]); ?>">
                                <input type="hidden" name="brand_name" value="<?php echo htmlspecialchars($brand["brand_name"]); ?>">
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

