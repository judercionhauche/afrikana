<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('controllers/general_controller.php');
$categories = get_all_categories();
$brands = get_all_brands();
$customer_id = $_SESSION['customer_id'];
$email = $_SESSION['customer_email'];

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
} else {
    $customer_id = $_SESSION['customer_id'];
    $items = fetch_items_by_c_id($customer_id);

    $order_id = get_last_inserted_order_id(); 
    // Insert order details into the database
    foreach ($items as $item) {
        $product_id = $item['p_id'];
        $qty = $item['qty'];

        // Insert order details into the database
        $insert = create_order_details($order_id, $product_id, $qty);

        if (!$insert) {
            echo "Failed to insert order details for product ID: $product_id";
            // Handle the error as needed
        } else {

        }
    }
}
?>


<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Afrikanah Store</title>
    <link rel="icon" href="img/favicon.png">
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                  <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    product
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                    <a class="dropdown-item" href="product_list.php"> product list</a>
                    <a class="dropdown-item" href="single-product.php">product details</a>

                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                  <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <h2>checkout</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb part end-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      <div class="returning_customer">
        <div class="check_title">
          <h2>
            Returning Customer?
            <a href="#">Click here to login</a>
          </h2>
        </div>
        <p>
          If you have shopped with us before, please enter your details in the
          boxes below. If you are a new customer, please proceed to the
          Billing & Shipping section.
        </p>
        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
          <div class="col-md-6 form-group p_star">
            <input type="text" class="form-control" id="name" name="name" value=" " />
            <span class="placeholder" data-placeholder="Username or Email"></span>
          </div>
          <div class="col-md-6 form-group p_star">
            <input type="password" class="form-control" id="password" name="password" value="" />
            <span class="placeholder" data-placeholder="Password"></span>
          </div>
          <div class="col-md-12 form-group">
            <button type="submit" value="submit" class="btn_3">
              log in
            </button>
            <div class="creat_account">
              <input type="checkbox" id="f-option" name="selector" />
              <label for="f-option">Remember me</label>
            </div>
            <a class="lost_pass" href="#">Lost your password?</a>
          </div>
        </form>
     
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" name="name" />
                <span class="placeholder" data-placeholder="First name"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="name" />
                <span class="placeholder" data-placeholder="Last name"></span>
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="number" />
                <span class="placeholder" data-placeholder="Phone number"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="compemailany" />
                <span class="placeholder" data-placeholder="Email Address"></span>
              </div>
              <div class="col-md-12 form-group p_star">
    <div class="dropdown">
        </select>
       
    </div>
</div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="country" name="country" />
                <span class="placeholder" data-placeholder="Country"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add2" name="add2" />
                <span class="placeholder" data-placeholder="Address line 02"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="city" name="city" />
                <span class="placeholder" data-placeholder="Town/City"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                          
              </div>
         </form>
         <div>
         <button class="btn_3" onclick="payWithPaystack()" style="margin-top: 20px;">Proceed to Payment</button>
             </div>  
         </div>
<div class="col-lg-4">
    <div class="order_box">
        <h2>Your Order</h2>
        <ul class="list">
            <li>
                <a href="#">Product
                    <span>Total</span>
                </a>
            </li>
            <?php foreach ($items as $item): ?>
            <li>
                <a href="#">
                    <?php echo $item['product_title']; ?>
                    <span class="middle">x <?php echo $item['qty']; ?></span>
                    <span class="last"><?php echo $item['product_price'] * $item['qty']; ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <ul class="list list_2">
            <li>
                <a href="#">Subtotal
                    <span>$<?php
                    $subtotal = array_sum(array_column($items, 'product_price')) * array_sum(array_column($items, 'qty'));
                    echo number_format($subtotal, 2);
                    ?></span>
                </a>
            </li>
            <li>
                <a href="#">Shipping
                    <span>Free</span>
                </a>
            </li>
            <li>
                <a href="#">Total
                    <span>$<?php echo number_format($subtotal, 2); ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>
</div>
  </section>
  <!--================End Checkout Area =================-->

  <!--::footer_part start::-->
  <footer class="footer_part">
    <div class="footer_iner section_bg">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-8">
            <div class="footer_menu">
              <div class="footer_logo">
                <a href="index.php"><img src="img/Afrikanah.png" alt="#"></a>
              </div>
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
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script>
  <!--::footer_part end::-->
  function payWithPaystack() {
  var handler = PaystackPop.setup({
    key: 'pk_test_ab49a5d290b88ba99712d41d80b66b14ae01a751', // Replace with your public key
    email:'<?php echo htmlspecialchars($email); ?>', // the amount value is multiplied by 100 to convert to the lowest currency unit
    amount:  <?php echo number_format($subtotal, 2)*100; ?>, // the amount value is multiplied by 100 to convert to the lowest currency unit
    currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
    ref: '' + Math.floor(Math.random() * 1000000 + 1), // Replace with a reference you generated
    callback: function(response) {
      //this happens after the payment is completed successfully
      var reference = response.reference;
      // window.location.href = "confirmation.php?ref=" + reference;
      window.location.href = "actions/success.php?ref=" + reference;

      // alert('Payment complete! Reference: ' + reference);
    },
    onClose: function() {
      alert('Transaction was not completed, window closed.');
    },
  });
  handler.openIframe();
}
</script>
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