<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/managecategory-style.css">
    <title>Manage Category</title>
</head>
<body>
    
</body>
</html>

<!-- Manage Category Content -->
<div id="manageCategory" class="content-section">
    <h2>Manage Categories</h2>
    <table id="categoryTable">
        <thead>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example row -->
            <tr>
                <td>1</td>
                <td>Electronics</td>
                <td>Electronic gadgets and devices</td>
                <td>
                    <button class="edit-btn" onclick="editCategory(1)">Edit</button>
                    <button class="delete-btn" onclick="deleteCategory(1)">Delete</button>
                </td>
            </tr>
            <!-- More rows will be dynamically inserted here -->
        </tbody>
    </table>
</div>
