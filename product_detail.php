<?php
session_start();
include("db_conn.php");


ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(-1);

isset($_SESSION['user_id']) && isset($_SESSION['user_email'])

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


  <!--其他template css-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/price-range.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <!--其他template css-->

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
              <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="index.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status<i class="fa fa-angle-down"></i></a>
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

  <!--Product detail-->
  <div id="here">

  </div>
  <!--Product detail end-->


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
                  <li><a href="track_info.php">Order Status</a></li>
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

<script>
  var user_id = "";
  var seller_id = "";
  $.ajaxSetup({
    cache: false
  })
  $.get('getsession.php', function(data) {
    var json = JSON.parse(data);



    user_id = json.user_id;

    $.ajax({
      url: "product_detail_show.php",
      data: {
        option: "display",
        book_id: <?php echo $_GET["book_id"] ?>
      },
      cache: false,
      type: "POST",

      success: function(response) {

          var json = JSON.parse(response);
          console.table(json);
          console.log(json[0].category_id);
          var html_product_detail = "";



          for (var x = 0; x < json.length; x++) {
            var book_id = json[x].book_id;
            user_id = user_id;
            seller_id = json[x].seller_id;
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

            var seller_name = json[x].seller_name;
            var seller_contactno = json[x].seller_contactno;
            var seller_bank_acc = json[x].seller_bank_acc;
            var seller_email = json[x].seller_email;

            var category_name = json[x].category_name;
            var subcategory_name = json[x].subcategory_name;

            html_product_detail += '<!--Product detail-->' +

              '<div class="test">' +
              '<div class="container">' +
              '<div class="row">' +
              '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +

              '<!--照片显示-->' +
              '<div class="ps-product--detail pt-60">' +
              '<div class="ps-container">' +
              '<div class="row">' +
              '<div class="col-lg-10 col-md-12 col-lg-offset-1">' +
              '<!--其他的template-->' +
              '<div class="col-sm-6">' +

              '<div id="similar-product" class="carousel slide" data-ride="carousel">' +

              '<!-- Wrapper for slides -->' +
              '<div class="carousel-inner">' +
              '<div class="item active">' +
              '<a href="#">' + '<img src="seller/img_book/' + img1 + '" alt="">' + '</a>' +

              '</div>' +
              '<div class="item">' +
              '<a href="#">' + '<img src="seller/img_book/' + img2 + '" alt="">' + '</a>' +

              '</div>' +
              '<div class="item">' +
              '<a href="#">' + '<img src="seller/img_book/' + img3 + '" alt="">' + '</a>' +

              '</div>' +
              '<div class="item">' +
              '<a href="#">' + '<img src="seller/img_book/' + img4 + '" alt="">' + '</a>' +

              '</div>' +
              '</div>' +

              '<!-- Controls -->' +
              '<a class="left item-control" href="#similar-product" data-slide="prev">' +
              '<i class="fa fa-angle-left">' + '</i>' +
              '</a>' +
              '<a class="right item-control" href="#similar-product" data-slide="next">' +
              '<i class="fa fa-angle-right">' + '</i>' +
              '</a>' +
              '</div>' +

              '</div>' +
              '<!--其他的template end-->' +

              '<!--照片显示 end-->' +

              '<!--产品细节-->' +
              '<div class="ps-product__info">' +

              '<h1>' + book_name + '</h1>' +
              '<p class="ps-product__category">' + '<a href="#">' + 'Author Name : ' + book_author + '</a>' + '</p>' +
              '<h3 class="ps-product__price"> RM ' + book_price + '<del> RM' + book_ori_price + '</del>' + '</h3>' + '<br>' +
              '<div class="ps-product__block ps-product__size">' +
              '<h4>' + 'BOOK CONDITION' + '<a href="#">' + book_condition + '</a>' + '</h4>' +

              '</div>' +
              '<div class="ps-product__block ps-product__size">' +
              '<h4>' + 'PUBLICATION DATE' + '<a href="#">' + book_pub_date + '</a>' + '</h4>' +

              '</div>' +
              '<div class="ps-product__block ps-product__size">' +
              '<h4>' + 'SHIP PLACE' + '<a href="#">' + shipPlace + '</a>' + '</h4>' +

              '</div>' +
              '<div class="ps-product__block ps-product__size">' +
              '<h4>' + 'QUANTITY' + '<a href="#">' + book_quantity + '</a>' + '</h4>' +

              '</div>' +
              '<br>' +
              // '<div class="ps-product__shopping">'+'<a class="ps-btn mb-10" href="" >'+'Add to cart'+'<i class="ps-icon-next">'+'</i>'+'</a>'+
              '<div class="ps-product__actions">' + '<button onclick="add_to_wishlist(' + book_id + ')">' + '<i class="">' + '<img src="images/icon/wishlist.png" width="30px" height="25px">' + '</i>' + '</button>' +

              '<button onclick="add_to_card(' + book_id + ')" >' + '<i class="" >' +
              '<img src="images/icon/add-cart.png" width="35px" height="25px">' + '</i>' + '</button>' + '</div>' +
              '</div>' +
              '</div>' +
              '<div class="clearfix">' + '</div>' +
              '<div class="ps-product__content mt-50">' +
              '<ul class="tab-list" role="tablist">' +
              '<li class="active">' + '<a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">' + 'Overview' + '</a>' + '</li>' +

              '<li>' + '<a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">' + 'Contact' + '</a>' + '</li>' +
              '</ul>' +
              '</div>' +
              '<div class="tab-content mb-60">' +
              '<div class="tab-pane active" role="tabpanel" id="tab_01">' +
              '<table class="table">' +
              '<thead>' +
              '<tr>' +
              '<th scope="col">' + 'Language' + '</th>' +
              '<th scope="col">' + book_language + '</th>' +
              '</tr>' +
              '</thead>' +
              '<tbody>' +
              '<tr>' +
              '<th scope="row">' + 'Category' + '</th>' +
              '<td colspan="2">' + category_name + '</td>' +
              '</tr>' +
              '<tr>' +
              '<th scope="row">' + 'Subcategory' + '</th>' +
              '<td colspan="2">' + subcategory_name + '</td>' +
              '</tr>' +
              '<tr>' +
              '<th scope="row">' + 'Book page' + '</th>' +
              '<td>' + book_pages + ' pages</td>' +
              '</tr>' +
              '<tr>' +
              '<th scope="row">' + 'ISBN-13/ISBN-10​' + '</th>' +
              '<td>' + book_isbn + '</td>' +
              '</tr>' +
              '<tr>' +
              '<th scope="row">' + 'Formats' + '</th>' +
              '<td colspan="2">' + book_formats + '</td>' +
              '</tr>' +

              '</tbody>' +
              '</table>' +
              '<p>' + book_description + '</p>' +

              '</div>' +

              '<div class="tab-pane" role="tabpanel" id="tab_02">' +
              '<div>' +
              '<table class="table">' +
              '<thead>' +
              '<tr>' +
              '<th scope="col">' + 'Seller Information' + '</th>' +
              '</tr>' +
              '</thead>' +
              '<tbody>' +
              '<tr>' +
              '<th scope="row">' + 'Name' + '</th>' +
              '<td>' + seller_name + '</td>' +
              '</tr>' +
              '<tr>' +
              '<th scope="row">' + 'Email' + '</th>' +
              '<td>' + seller_email + '</td>' +
              '</tr>' +
              '<tr>' +
              '<th scope="row">' + 'Contact Number' + '</th>' +
              '<td colspan="2">' + seller_contactno + '</td>' +
              '</tr>' +
              '</tbody>' +
              '</table>' +
              '</div>' +

              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<!--Product detail end-->';


          }

          $("#here").html(html_product_detail);

        }

        ,
      error: function(response) {}
    });

    //////////qwqw
  });

  function add_to_card(bookid) {

    $.ajax({
      url: "add_to.php",
      data: {
        option: "add_to_cart",
        book_id: bookid,
        user_id: user_id,
        seller_id: seller_id,

      },
      cache: false,
      type: "POST",

      success: function(response) {
          alert(response);
          if (response == "Successfully added to cart") {
            //alert("Done Add to Cart. Please browse your localhost php my admin to view the updated data");

          }

        }

        ,
      error: function(response) {
        alert(response);
      }
    });



  }

  function add_to_wishlist(bookid) {

    $.ajax({
      url: "add_to.php",
      data: {
        option: "add_to_wishlist",
        book_id: bookid,
        user_id: user_id,
        seller_id: seller_id,

      },
      cache: false,
      type: "POST",

      success: function(response) {
          alert(response);
          if (response == "Successfully added to wishlist") {
            //alert("Done Add to Cart. Please browse your localhost php my admin to view the updated data");

          }

        }

        ,
      error: function(response) {
        alert(response);
      }
    });

  }
</script>