<?php
include_once("../settings/db_cred.php");
include_once("../controllers/general_controller.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_data_product'])) {
    // Check if the search query is set
    if(isset($_POST['search_query'])) {
        $search_query = $_POST['search_query'];
        $products = search_products($search_query);
        // Redirect to the product list page with search results
        header("Location: ../product_list.php?search_query=" . urlencode($search_query));
        exit();
    } else {
        // Handle case when search query is not set
        // For example, redirect back to the product list page
        header("Location: ../product_list.php");
        exit();
    }
} else {
    // Handle other cases, if needed
    // For example, redirect back to the product list page
    header("Location: ../product_list.php");
    exit();
}
?>

