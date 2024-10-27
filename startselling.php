<?php
include("db_conn.php");
session_start();

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
  <link rel="stylesheet" href="css/startselling.css" <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
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

  <!--start selling-->
  <div class="ps-mission bg-cover" data-background="images/parallax/home-testimonial.jpg">
    <div class="ps-container">
      <h3>Welcome Vendor</h3>
      <h2>Your success is our ambition. <br /> Your defeat spurs us on to be better.</h2>
    </div>
  </div>

  <br>
  <br>
  <br>



  <!--content-->
  <div class="space">
    <h1>How to Start Selling on Greening BookPlanet</h1>
    <br>
    <table style="overflow-x:auto;" class="question">
      <tr>
        <td>
          <div class="space2">
            <h4><b>STEP 1 : Decide what type of books you want to sell</b> </h4>
            <br>
            <h5 class="pstyle">The simplest way to begin is generally to sell
              books you already have.
              In the process of procuring your books, it's essential to evaluate each one’s condition. Follow
              Greening BookPlanet's detailed condition guidelines when listing your books. Be sure to read over the
              category-specific guidelines for used books, as well as for niche items like collectible books. </h5>
          </div>
        </td>
      </tr>
    </table>
    <br>
    <table style="overflow-x:auto;" class="question">
      <tr>
        <td>
          <div class="space2">
            <h4><b>STEP 2 : Create your Greening BookPlanet seller account</b></h4>
            <br>
            <h5 class="pstyle">Register as a seller either look for navigation bar which you may click "Choose
              > Seller" , or just click the button below to start.
              <br><br>
              <button class="ps-btn" onclick="window.location='seller/terms.php';">Let's Get Started !</button>
            </h5>
          </div>
        </td>
      </tr>
    </table>
    <br>
    <table style="overflow-x:auto;" class="question">
      <tr>
        <td>
          <div class="space2">
            <h4><b>STEP 3 : How you will fulfill orders</b></h4>
            <br>
            <h5 class="pstyle">Merchant Fulfilled Network (MFN) – You store inventory, pack, and ship books independently.</h5>
          </div>
        </td>
      </tr>
    </table>
    <br>
    <table style="overflow-x:auto;" class="question">
      <tr>
        <td>
          <div class="space2">
            <h4><b>STEP 4 : Set your book pricing</b></h4>
            <br>
            <h5 class="pstyle">Book pricing depends on a variety of variables, including book type and condition. Monitor the prices
              other booksellers are asking for, and adjust your prices accordingly. </h5>
          </div>
        </td>
      </tr>
    </table>
    <br>
    <table style="overflow-x:auto;" class="question">
      <tr>
        <td>
          <div class="space2">
            <h4><b>STEP 5 : List your books</b></h4>
            <br>
            <h5 class="pstyle">1. After register then login to seller page.<br>
              2. Click on insert product.<br>
              3. Start filling information of the book into the form given.</h5>
          </div>
        </td>
      </tr>
    </table>
    <br>
    <table style="overflow-x:auto;" class="question">
      <tr>
        <td>
          <div class="space2">
            <h4><b>STEP 6 : Pack and ship your books</b></h4>
            <br>
            <h5 class="pstyle">Preparation is essential to getting your books to their destination securely. Remember, happy customers
              are repeat customers!</h5>
          </div>
        </td>
      </tr>
    </table>
    <br>
  </div>





  <br><br>

  <div class="ps-mission bg-cover" data-background="images/parallax/home-testimonial.jpg">
    <div class="ps-container">
      <div class="container">
        <div align="center">
          <h2 style="color:lightgreen"><strong>more information</strong></h2><br>
          <div>
            <!-- Button trigger modal 1-->
            <button type="button" class="h5style" data-toggle="modal" data-target="#exampleModalLong">
              <h5><a href="#">Why sell books on Greening BookPlanet?</a></h5>
            </button><br>
            <!-- Button trigger modal 2-->
            <button type="button" class="h5style" data-toggle="modal" data-target="#exampleModalLong2">
              <h5><a href="#">What types of books can you sell on Greening BookPlanet?</a></h5>
            </button><br>
            <!-- Button trigger modal 3-->
            <button type="button" class="h5style" data-toggle="modal" data-target="#exampleModalLong3">
              <h5><a href="#">Fulfilling orders with the MFN method</a></h5>
            </button><br>
            <!-- Button trigger modal 4-->
            <button type="button" class="h5style" data-toggle="modal" data-target="#exampleModalLong4">
              <h5><a href="#">7 quick tips for selling your books online</a></h5>
            </button><br>
          </div>


          <br>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 1-->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <h3>Why sell books on Greening BookPlanet?</h3>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>People love to read books. Even with all of today’s competing entertainment mediums, books are
            thankfully still in demand. While you may have other options to consider when it comes to selling
            your books online, here are a few benefits booksellers on Greening BookPlanet enjoy:</h5><br><br>

          1. Get started with just a few books (no need for a large inventory).<br>
          2. Choose from a wide variety of genre categories.<br>
          3. Sell books for cash on delivery(based on location) or online transfer or even with cash deposit machine physically.<br>
          4. Sell books multiple ways—by title, ISBN, weight, format & binding, language or by publication date.<br>
          5. You choose how to fulfill orders :<br>
          Merchant Fulfilled Network (MFN) – Is the DIY Route. List books on Greening BookPlanet, then pack and ship
          orders to customers yourself. (This is often referred to informally as Fulfillment by Merchant or FBM.)<br>

        </div>
        <div class="modal-footer">
          <button class="ps-btn" data-dismiss="modal">close</button>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2-->
  <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <h3>What types of books can you sell on Greening BookPlanet?</h3>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h5>You can sell common book formats such as hardcovers, paperbacks.Whether you want to resell non-fiction
            books you've already read, part with beloved comic books, list rare hardcover collectibles, or get rid
            of children's books, you don't need to look any further.</h5><br><br>

          <b>Sell used books online</b><br>
          Secondhand books are generally easier to find, cheaper to acquire, and could be more profitable if you
          find good deals locally or online. You can sell used books right off your shelf, but you can also find
          them at local used book stores, thrift shops, or estate sales. You can also check online marketplaces,
          local library sales, and even find books at your neighborhood yard sale.<br><br>

          <b>Sell used textbooks online</b><br>
          Do you have used college textbooks taking up space? If they’re in good condition, you can get them off
          your shelf and make a little cash by selling them on Greening BookPlanet. Be sure to list accurate
          details about the book's condition. Peak times for textbook sales are typically in the spring and
          fall of each year.<br>

          <b></b><br>
          A book's International Standard Book Number (ISBN) is a registration code you can find inside the dust
          jacket or on the barcode. If the book was printed before 1970, it might not have an ISBN. If this is
          the case, you can request an exemption.<br>
        </div>
        <div class="modal-footer">
          <button class="ps-btn" data-dismiss="modal">close</button>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal 3-->
  <div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <h3>Fulfilling orders with the MFN method</h3>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          1. Manage orders from your seller account.<br>
          2. Pack books securely.<br>
          3. Go to search send parcel of any courier (based on your preference) such as PosLaju, J&T, Abx, Dhl, Gdex, etc. <br>
          4. Login to the send parcel(register if haven't) *there will be need verification(email,phone number)<br>
          5. You'll able to enter information of the parcel and check shipping price at the send parcel websites .<br>
          6. Confirm the order .<br>
          7.Send your parcel by drop off and before send your parcel, make sure print the consignment note(shipment label).<br><br><br>

          <h3>IF COD</h3><br>
          1. You may pack and send the parcel on your own.<br>
        </div>
        <div class="modal-footer">
          <button class="ps-btn" data-dismiss="modal">close</button>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal 4-->
  <div class="modal fade" id="exampleModalLong4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <h3>7 quick tips for selling your books online</h3>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>To increase your chances of success in building an online business and selling your books, follow these best practices:</h5><br><br>

          <b>#1 - Be 100% honest about the condition of your books</b><br><br>
          Build trust with customers by being completely transparent about the condition of each book. Generally, you can
          choose from these categories:<br><br>

          1. Used - Like New: Item may have minor cosmetic defects (such as marks, wears, cuts, bends, or crushes) on the cover,
          spine, pages, or dust cover. Dust cover is intact and pages are clean and not marred by notes. Item may contain remainder
          marks on outside edges. Item may be missing bundled media.<br>
          2. Used - Very Good: Item may have minor cosmetic defects (such as marks, wears, cuts, bends, or crushes) on the cover,
          spine, pages, or dust cover. Shrink wrap, dust covers, or boxed set case may be missing. Item may contain remainder marks
          on outside edges, which should be noted in listing comments. Item may be missing bundled media.<br>
          3. Used - Good: All pages and cover are intact (including the dust cover, if applicable). Spine may show signs of wear.
          Pages may include limited notes and highlighting. May include "From the library of" labels. Shrink wrap, dust covers,
          or boxed set case may be missing. Item may be missing bundled media.<br>
          4. Used - Acceptable: All pages and the cover are intact, but shrink wrap, dust covers, or boxed set case may be missing.
          Pages may include limited notes, highlighting, or minor water damage but the text is readable. Item may be missing bundled
          media.<br><br>

          Unacceptable: Has missing pages and obscured or unreadable text. We also do not permit the sale of advance reading
          copies, including uncorrected proofs, of in-print or not-yet-published books.<br><br>

          <b>#2 - Take care when packing and shipping</b><br><br>
          Follow all shipping guidelines and pack books securely, so orders reach customers in excellent condition.<br><br>

          Books can get a fair bit of abuse during shipping, but several measures can help ensure orders arrive in tip-top shape:<br>
          1.Use multiple packing materials. Appropriate packaging could involve a combination of bags, Kraft paper, or bubble wrap.<br>
          2.Protect book corners, edges, and dust jackets.<br>
          3.When shipping more than one book, consider wrapping each one individually or using single book boxes for protection. 4.For multiple books, you can place pieces of flat cardboard between each book.
          Books should fit snugly in the padded envelope or box, so there’s little wiggle room.<br><br>

          <b>#3 - Always fulfill your orders on time</b><br><br>
          If you’re shipping items directly to customers, help instill trust and increase your chances for repeat sales
          by delivering products on time and in the best condition possible.<br><br>

          <b>#4 - Keep your prices competitive</b><br><br>
          Monitor prices in the categories and titles you list for sale in order to stay competitive and boost sales.<br>
        </div>
        <div class="modal-footer">
          <button class="ps-btn" data-dismiss="modal">close</button>

        </div>
      </div>
    </div>
  </div>





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
  <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js">
  </script>
  <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
  <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
  <script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
  <!-- Custom scripts-->
  <script type="text/javascript" src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  >
</body>

</html>