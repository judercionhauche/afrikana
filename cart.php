<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Afrikanah Wellness</title>
    <link rel="icon" href="img/Afrikanah.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <!-- icon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- magnific popup CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/nice-select.css">
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
`                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                            <a class="navbar-brand" href="index.php" style="position: absolute; left: 0; top: 5;"><img src="img/Afrikanah.png" alt="Logo" style="max-width: 150px; max-height: 90px;"></a>

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
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                       
                                        <a class="dropdown-item" href="checkout.php">product checkout</a>
                                        <a class="dropdown-item" href="cart.php">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.php">confirmation</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    
                                    
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
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here" name="search_data">
                    <button type="submit" class="btn" value= "search" name= "search_data_product">Search</button>
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
            <h2>cart list</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb part end-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once('controllers/general_controller.php');

              $cart_items = fetch_all_cart_items();
              $subtotal = 0;

              foreach ($cart_items as $item) :
                $subtotal += ($item['product_price'] * $item['qty']);

              ?>
                <tr>
                  <td>
                    <div class="media">
                      <div style="width: 140px; height: 110px; overflow: hidden; background-color: #ccc; display: inline-block;">
                        <img src="uploads/<?php echo htmlspecialchars($item["product_image"]); ?>" alt="Product Image" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                    </div>
                    <div class="media-body">
                      <p><?php echo $item['product_desc']; ?></p>
                    </div>
                  </td>
                  <td>
                    <h5><?php echo '' . $item['product_price']; ?></h5>
                  </td>
                  <td>
                    <div class="product_count" id="product_count_<?php echo $item['p_id']; ?>">
                      <span class="input-number-decrement" data-product-id="<?php echo $item['p_id']; ?>"> <i class="ti-minus"></i></span>
                      <input class="input-number" type="text" value="<?php echo $item['qty']; ?>" min="0" max="100">
                      <span class="input-number-increment" data-product-id="<?php echo $item['p_id']; ?>"> <i class="ti-plus"></i></span>
                    </div>
                  </td>
                  <td>
                    <h5><?php echo '$' . ($item['product_price'] * $item['qty']); ?></h5>
                  </td>
                  <td>
                    <form method="post" action="actions/update_cart_actions.php">
                      <input type="hidden" name="p_id" value="<?php echo htmlspecialchars($item["p_id"]); ?>">
                      <input type="hidden" name="qty" value="<?php echo htmlspecialchars($item["qty"]); ?>">
                      <input type="hidden" name="c_id" value="<?php echo htmlspecialchars($item["c_id"]); ?>">
                      <button type="submit" class="btn_1" name="edit" style="width: auto; padding: 5px 10px;">Update Cart</button>
                    </form>
                  </td>
                  <td>
                    <form method="post" action="actions/delete_cart_item.php">
                      <input type="hidden" name="p_id" value="<?php echo htmlspecialchars($item["p_id"]); ?>">
                      <input type="hidden" name="qty" value="<?php echo htmlspecialchars($item["qty"]); ?>">
                      <input type="hidden" name="c_id" value="<?php echo htmlspecialchars($item["c_id"]); ?>">
                      <button type="submit" class="btn_1" name="delete" style="width: auto; padding: 5px 10px; ">Remove item</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <tr>
      <td></td>
      <td></td>

    </tr>

    </tbody>
    </table>
    <div class="checkout_btn_inner float-right">
      <table>
        <tr>
          <td>
            <h5 style="margin-right: 10px;">Subtotal:</h5>
          </td>
          <td>
            <h5>GHC<?php echo $subtotal; ?></h5>
          </td>
        </tr>
      </table>
      <a class="btn_1" href="product_list.php">Continue Shopping</a>

      <a class="btn_1 checkout_btn_1" type ="submit" name="submi" href="checkout.php">Proceed to checkout</a>
    </div>
    </div>
    </div>
  </section>
  <!--================End Cart Area =================-->
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