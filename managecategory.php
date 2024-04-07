<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/managebrand-style.css">
    <title>Manage Category</title>
</head>
<body>
    <!-- Manage Brand Content -->
<div id="manageCategory" class="content-section">
    <h2>Manage Catgories</h2>
    <div class="table-responsive">
        <table class="brand-table">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
           
            <tbody>
                <?php
             include_once(__DIR__ . '/controllers/general_controller.php');

                $categories = get_all_categories(); // Ensure this function call matches your setup

             foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($category["cat_id"]); ?></td>
                        <td><?php echo htmlspecialchars($category["cat_name"]); ?></td>
                        <td>
                            <!-- Edit Form -->
                            <form action="actions/edit_category_actions.php" method="POST" style="display: inline;">
                                <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category["cat_id"]); ?>">
                                <input type="hidden" name="category_name" value="<?php echo htmlspecialchars($category["cat_name"]); ?>">
                                <input type="submit" class="edit-btn" name="edit" value="edit">
                            </form>
                            
                            <!-- Delete Form -->
                            <form action="actions/delete_category_actions.php" method="POST" style="display: inline;">
                                <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category["cat_id"]); ?>">
                                <input type="hidden" name="category_name" value="<?php echo htmlspecialchars($category["cat_name"]); ?>">
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

