<?php
session_start();

// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(-1);

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
  $user_id = $_SESSION['user_id'];
  //echo($user_id);
  include("db_conn.php");

  if ($conn === false) {
    die("ERROR: Could not connect. "
      . mysqli_connect_error());
  }

?>

  <!DOCTYPE html>
  <!--[if IE 7]><html class="ie ie7"><![endif]-->
  <!--[if IE 8]><html class="ie ie8"><![endif]-->
  <!--[if IE 9]><html class="ie ie9"><![endif]-->
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Greening BookPlanet</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="css/style.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!--Favicon-->
    <link rel="icon" href="images/favicon.ico">
  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

  <body class="ps-loading">
    <div class="header--sidebar"></div>
    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
              <p>Welcome To Greening BookPlanet Website! Hello, <?php echo $_SESSION['user_name']; ?></p>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
              <div class="header__actions"></span><a href="login.php">Login & Register</a>
                <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="index.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose<i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="login.php">User</a></li>
                    <li><a href="seller/login.php">Seller</a></li>
                    <li><a href="admin/login.php">Admin</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="col-lg-4 col-md-4 col-sm-16 col-xs-16 ">
              <header><a class="ps-logo" href="homepage.php"><img src="images/GBP_LOGO.png" alt=""></a></header>
            </div>
          </div>
          <div class="navigation__column center">
            <ul class="main-menu menu">
              <li class="menu-item menu-item-has-children dropdown"><a href="#">My Account</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="personal_in.php">Personal Information</a></li>
                  <li class="menu-item"><a href="change_password.php">Change Password</a></li>
                  <li class="menu-item menu-item-has-children dropdown"><a href="#">My Purchase</a>
                    <ul class="sub-menu">
                      <li class="menu-item menu-item-has-children dropdown"><a href="track_order.php">Track Order</a>
                      </li>
                      <li class="menu-item"><a href="order_history.php">Order History</a></li>
                    </ul>
                  </li>
                  <li class="menu-item"><a href="logout.php">Sign Out</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Category</a>
                <div class="mega-menu">
                  <div class="mega-wrap">
                    <div class="mega-column">

                    </div>
                    <?php $result1 = mysqli_query($conn, "SELECT * FROM category");
                    while ($row1 = mysqli_fetch_array($result1)) :; ?>
                      <div class="mega-column">
                        <h4 class="mega-heading"><?php echo $row1[1]; ?></h4>
                        <ul class="mega-item">
                          <?php
                          $id = $row1[0];
                          $result = mysqli_query($conn, "SELECT * FROM subcategory WHERE category_id='$id'");
                          while ($row = mysqli_fetch_array($result)) :; ?>
                            <li><a href="product_listing.php?subcategory_id=<?php echo $row[0]; ?>"><?php echo $row[2]; ?></a></li>
                          <?php endwhile; ?>
                        </ul>
                      </div>
                    <?php endwhile; ?>
                  </div>
                </div>
              </li>
              <li class="menu-item"><a href="wishlist.php">Wishlist</a></li>
              <li class="menu-item"><a href="startselling.php">Start Selling</a></li>
              <li class="menu-item menu-item-has-children dropdown"><a href="#">Contact Us</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="request.php">Request Book</a></li>
                  <li class="menu-item"><a href="contact_us.php">Contact Us</a></li>
                </ul>
              </li>

            </ul>
          </div>
          <div class="navigation__column right">
            <div class="ps-cart"><a class="ps-cart__toggle" href="mycart.php"><span></span><i class="ps-icon-shopping-cart"></i></a>
            </div>
            <div class="menu-toggle"><span></span></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Trusted Seller</strong> : Get Good Quality Used Books</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Start Selling</strong> : Share Your Books To People More Needed</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Request Book</strong> : We May Help You To Find Book For You</p>
      </div>
    </div>

    <!--my cart-->

    <div id="here"></div>

    <!--Footer-->
    <div class="ps-footer bg--cover" data-background="images/cube.jpeg">
      <div class="ps-footer__content">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
              <aside class="ps-widget--footer ps-widget--info">
                <header><a class="ps-logo" href="homepage.php"><img src="images/GBP_LOGO.png" alt=""></a>
                  <h3 class="ps-widget__title">Address</h3>
                </header>
                <footer>
                  <p><strong>Politeknik Mukah, KM7.5, Jalan Oya, 96400 Mukah,Sarawak.</strong></p>
                </footer>
              </aside>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
              <aside class="ps-widget--footer ps-widget--link">
                <header>
                  <h3 class="ps-widget__title"></h3>
                </header>
                <footer>
                  <ul class="ps-list--link">
                    <li><a href="startselling.php">Start Selling</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="signup.php">SignUp For Email</a></li>
                    <li><a href="logout.php">Sign Out</a></li>

                  </ul>
                </footer>
              </aside>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
              <aside class="ps-widget--footer ps-widget--link">
                <header>
                  <h3 class="ps-widget__title">Get Help</h3>
                </header>
                <footer>
                  <ul class="ps-list--line">
                    <li><a href="track_info">Order Status</a></li>
                    <li><a href="help.php">Shipping and Delivery</a></li>
                    <li><a href="help.php">Payment Options</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                  </ul>
                </footer>
              </aside>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
              <aside class="ps-widget--footer ps-widget--link">
                <header>
                  <h3 class="ps-widget__title">Our Books</h3>
                </header>
                <footer>
                  <ul class="ps-list--line">
                    <?php $result2 = mysqli_query($conn, "SELECT * FROM category");
                    while ($row2 = mysqli_fetch_array($result2)) :; ?>
                      <li><a href="#"><?php echo $row2[1]; ?></a></li>
                    <?php endwhile; ?>
                  </ul>
                </footer>
              </aside>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-footer__copyright">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
              <p>&copy; <a href="index.php">GREENING BOOKPLANET</a>, Inc. All rights Reserved.</p>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- JS Library-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script type="text/javascript" src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="plugins/gmap3.min.js"></script>
    <script type="text/javascript" src="plugins/imagesloaded.pkgd.js"></script>
    <script type="text/javascript" src="plugins/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="plugins/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="plugins/slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="plugins/elevatezoom/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
    <script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="js/main.js"></script>
  </body>

  </html>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>
<script>
  var user_id = "";

  $.ajaxSetup({
    cache: false
  })
  $.get('getsession.php', function(data) {
    var json = JSON.parse(data);

    user_id = json.user_id;
    // alert(user_id);

    $.ajax({
      url: "mycart_show.php",
      data: {
        option: "display_mycart",
        user_id: user_id
      },
      cache: false,
      type: "POST",

      success: function(response) {
        // alert(response);
        var json = JSON.parse(response);

        console.table(json);

        var html_mycart = "";
        var html_mycart_top = "";
        var html_mycart_mid = "";
        var html_mycart_bot = "";

        html_mycart_top += '<div class="ps-content pt-80 pb-80">' +
          '<div class="ps-container">' +
          '<div class="ps-cart-listing">' +
          '<table class="table ps-cart__table">' +
          '<thead>' +
          '<tr>' +
          '<th>' + 'All Products' + '</th>' +
          '<th>' + 'Name' + '</th>' +
          '<th>' + 'Price' + '</th>' +
          '<th>' + 'View' + '</th>' +
          '<th>' + 'Action' + '</th>' +
          '</tr>' +
          '</thead>' +
          '<tbody>';
        var totalprice = 0.0;
        for (var x = 0; x < json.length; x++) {
          var cart_id = json[x].cart_id;
          var book_id = json[x].book_id;
          user_id = user_id;
          var seller_id = json[x].seller_id;
          var category_id = json[x].category_id;
          var subcategory_id = json[x].subcategory_id;
          var book_name = json[x].book_name;
          var book_author = json[x].book_author;
          var book_condition = json[x].book_condition;
          var book_description = json[x].book_description;
          var book_language = json[x].book_language;
          var book_pages = json[x].book_pages;
          var book_formats = json[x].book_formats;
          var book_isbn = json[x].book_isbn;
          var book_pub_date = json[x].book_pub_date;
          var book_quantity = json[x].book_quantity;
          var book_price = json[x].book_price;
          var book_ori_price = json[x].book_ori_price;
          var shipPlace = json[x].shipPlace;
          var img1 = json[x].img1;
          var img2 = json[x].img2;
          var img3 = json[x].img3;
          var img4 = json[x].img4;
          totalprice += parseFloat(book_price) * parseInt(book_quantity);
          html_mycart_mid += '<tr>' +
            '<td>' + '<a class="ps-product__preview" href="product_detail.php?book_id=' + book_id + '">' + '<img class="mr-15" src="seller/img_book/' + img1 + '" alt="" width="150" height="200">' + '</a>' + '</td>' +
            '<td>' + '<a class="ps-product__preview" href="product_detail.php?book_id=' + book_id + '">' + book_name + '</a>' + '</td>' +
            '<td>RM ' + (parseFloat(book_price) * parseInt(book_quantity)).toFixed(2) + '</td>' +
            '<td>' + '<a class="ps-product-link" href="product_detail.php?book_id=' + book_id + '">' + 'View Product' + '</a>' + '</td>' +

            '<td>' +
            '<a class="ps-remove" href="delete_cart.php?cart_id=' + cart_id + '">' + '</a>' +
            '</td>' +
            '</tr>';



        }
        html_mycart_bot += '</tbody>' +
          '</table>' +

          '<div class="ps-cart__actions">' +
          '<div class="ps-cart__promotion">' +

          '<div class="form-group">' +
          '<button class="ps-btn ps-btn--gray" type="button" onclick="history.back()">' + 'Continue Shopping' + '</button>' +
          '</div>' +

          '</div>' +

          '<div class="ps-cart__total">' +
          '<h3>' + 'Total Price: ' + '<span>RM ' + totalprice.toFixed(2) + '</span>' + '</h3>' + '<a class="ps-btn" href="check_out.php">' + 'Process to checkout' + '<i class="ps-icon-next">' + '</i>' + '</a>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '</div>';

        htmlmycart = html_mycart_top + html_mycart_mid + html_mycart_bot;

        $("#here").html(htmlmycart);

      },
      error: function(response) {

      }
    });
  });
</script>