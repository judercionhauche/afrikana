
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('controllers/general_controller.php');
$categories = get_all_categories();
$brands = get_all_brands();
$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
$order_id = isset($_SESSION['customer_id']) ? select_last_inserted_order() : null;
$items = $order_id ? fetch_items_by_order_id($order_id) : [];

// If customer_id is not set or there are no items in the order, display appropriate message
if (!$customer_id || empty($items)) {
$messagE = "You have not bought anything yet.";
} else {
    $order_id1 = get_last_inserted_order_id(); 
    $order_by_id = fetch_order_by_id($order_id1);
    
}
?>

<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Afrikanah Wellness</title>
    <link rel="icon" href="uploads/Afrikanah.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php" style="position: absolute; left: 0; top: 5;"><img src="img/Afrikanah.png" alt="Logo" style="max-width: 150px; max-height: 90px;"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">about</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        product
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="product_list.php"> product list</a>
                                        <a class="dropdown-item" href="single-product.php">product details</a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.php"> 
                                            login
                                            
                                        </a>
                                        <a class="dropdown-item" href="checkout.php">product checkout</a>
                                        <a class="dropdown-item" href="cart.php">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.php">confirmation</a>
                                        <a class="dropdown-item" href="elements.php">elements</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.php"> blog</a>
                                        <a class="dropdown-item" href="single-blog.php">Single blog</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href="cart.php">
                                <i class="flaticon-shopping-cart-black-shape"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>confirmation</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================ confirmation part start =================-->
  <section class="confirmation_part section_padding">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="confirmation_tittle">
                <?php if ($customer_id): ?>
                    <span>Thank you. Your order has been received. Your cart is empty</span>
                <?php else: ?>
                    <span>Please log in to see your receipt or order items.</span>
                <?php endif; ?>
            </div>
        </div>
            <?php if ($customer_id && !empty($items)): ?>
            <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                    <h4>order info</h4>
                    <ul>
                    <?php foreach ($order_by_id as $order):                        
                        ?>
                        

                        <li>
                        <p>Invoice number</p><span>: <?php echo $order['invoice_no']; ?></span>
                        </li>
                        <li>
                        <p>Order Date</p><span>: <?php echo $order['order_date']; ?></span>
                        </li>
                       
                        <li>
                            <p>Payment Method</p><span>: Mobile Money payment</span>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>         
            </div>
            <?php endif; ?>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="order_details_iner">
                    <h3>Order Details</h3>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item): ?>
                                <tr>
                                    <td colspan="2"><span><?php echo $item['product_title']; ?></span></td>
                                    <td>x<?php echo $item['qty']; ?></td>
                                    <td><span>$<?php echo $item['product_price'] * $item['qty']; ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                    <td colspan="3">Subtotal</td>
                        <?php $subtotal = array_sum(array_column($items, 'product_price')) * array_sum(array_column($items, 'qty')); ?>
                        <td><span>$<?php echo number_format($subtotal, 2); ?></span></td>
                    </tr>
                    <tr>

                                <td colspan="3">Shipping</td>
                                <td><span>Free</span></td>
                            </tr>
                        </tbody>
                        <tfoot>
                          
                        </tfoot>
                    </table>
                    <div class="col-lg-12">
                <button onclick="window.print()" style="background-color: purple; color: #fff; border: none; padding: 10px 20px; cursor: pointer;">Print Confirmation</button>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <!--================ confirmation part end =================-->

    <!--::footer_part start::-->
    <footer class="footer_part">
    
        <div class="footer_iner section_bg">
            
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <div class="footer_menu">
                            <div class="footer_logo">
                            </div>
                            <a href="index.php"><img src="img/Afrikanah.png" alt="#"></a>

                            <div class="footer_menu_item">
                                <a href="index.php">Home</a>
                                <a href="about.php">About</a>
                                <a href="product_list.php">Products</a>
                                <a href="#">Pages</a>
                                <a href="blog.php">Blog</a>
                                <a href="contact.php">Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="social_icon">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="row">
    
        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright_part">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                            <div class="copyright_link">
                                <a href="#">Turms & Conditions</a>
                                <a href="#">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/mixitup.min.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>