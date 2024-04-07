   <?php
                        // include_once(__DIR__ . '/controllers/general_controller.php');
                        // $search_query = ''; // Initialize $search_query variable
                        // if (isset($_GET['search_query'])) {
                        //     $search_query = $_GET['search_query'];
                        //     $products = search_products($search_query);
                        // } else {
                        //     $products = fetch_all_products();
                        // }
                        // foreach ($products as $product): ?>
                        //     <?php
                        //     // Check if the product matches the search query
                        //     $title_match = strpos(strtolower($product['product_title']), strtolower($search_query)) !== false;
                        //     $desc_match = strpos(strtolower($product['product_desc']), strtolower($search_query)) !== false;
                        //     $keywords_match = strpos(strtolower($product['product_keywords']), strtolower($search_query)) !== false;
                        //     if ($title_match || $desc_match || $keywords_match):
                        //         ?>
                        <!-- //         <div class="col-lg-6 col-sm-6">
                        //             <div class="single_product_item">
                        //                 <div style="width: 100%; height: 250px;" class="img_container">
                        //                     <img style="width: 100%; height: 100%; object-fit: cover;" src="img/uploads/<?= $product["product_image"]; ?>" alt="<?php echo $product["product_title"]; ?>" class="img-fluid">
                        //                 </div>
                        //                 <h3><a href="single-product.php"><?php echo htmlspecialchars($product["product_title"]); ?></a></h3>
                        //                 <p>From $<?php echo htmlspecialchars($product["product_price"]); ?></p>
                        //             </div> -->
                        //         </div>
                        //     <?php
                        //     endif;
                        // endforeach;
                        // ?>



<?php
include_once(__DIR__ . '/controllers/general_controller.php');

// Fetch all products
$products = fetch_all_products();

// Initialize search query variable
$search_query = '';

// Check if a search query is present
if (isset($_GET['search_query'])) {
    $search_query = $_GET['search_query'];
}

    foreach ($products as $product): ?>
        <?php
        // Check if the product matches the search query, or if no search query is present
        $title_match = strpos(strtolower($product['product_title'] ?? ''), strtolower($search_query)) !== false;
        $desc_match = strpos(strtolower($product['product_desc'] ?? ''), strtolower($search_query)) !== false;
        
        // Check if 'product_keywords' key exists and handle null case
        $keywords_match = isset($product['product_keywords']) && strpos(strtolower($product['product_keywords']), strtolower($search_query)) !== false;
        
        // Display the product if it matches the search query, or if no search query is present
        if ($title_match || $desc_match || $keywords_match || $search_query === ''): ?>
            <div class="col-lg-6 col-sm-6">
                <div class="single_product_item">
                    <form action="actions/add_to_cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                        <div style="width: 100%; height: 250px;" class="img_container">
                            <img style="width: 100%; height: 100%; object-fit: cover;" src="img/uploads/<?= $product["product_image"] ?? ''; ?>" alt="<?php echo $product["product_title"] ?? ''; ?>" class="img-fluid">
                        </div>
                        <h3><a href="single-product.php"><?php echo htmlspecialchars($product["product_title"] ?? ''); ?></a></h3>
                        <p>From $<?php echo htmlspecialchars($product["product_price"] ?? ''); ?></p>
                        <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart</button>
                    </form>
                </div>
            </div>
        <?php endif;
    endforeach;
    ?>
    ?>
               
                    </div>