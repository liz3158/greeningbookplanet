<?php
session_start();

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "db_bookplanet";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}


// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(-1);

isset($_SESSION['user_id']) && isset($_SESSION['user_email']);


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
    <link rel="stylesheet" href="css/help.css">
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

    <!--get help-->
    <div class="ps-mission bg-cover" data-background="images/parallax/home-testimonial.jpg">
        <div class="ps-container">
            <h3>Hello Vendor</h3>
            <h2>What can we help you with?</h2>
        </div>
    </div>
    <br>
    <br>
    <div class="space">
        <h1>Frequently Encountered Problems</h1>
        <br>
        <table style="overflow-x:auto;" class="question">
            <tr>
                <td>
                    <div class="space2">
                        <h4><b>QUESTION :</b> How seller can get the payment?</h4>
                        <br>
                        <h5 class="pstyle"><b>ANSWER :</b> There are two payment method provided which are COD (Cash On Delivery) & CDM(Cash Deposit Machine) Or
                            Online Transfer. In the websites,there will provide admin's bank account information. For COD, seller
                            will get the paymet directly meanwhile using CDM, customer will pay to Admin(Owner) first. After that,
                            admin will pay to seller after parcel arrive to customer. </h5>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table style="overflow-x:auto;" class="question">
            <tr>
                <td>
                    <div class="space2">
                        <h4><b>QUESTION :</b> Can I sell books on Greening BookPlanet for free?</h4>
                        <br>
                        <h5 class="pstyle"><b>ANSWER :</b> Yes, there are no fees will be charged.</h5>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table style="overflow-x:auto;" class="question">
            <tr>
                <td>
                    <div class="space2">
                        <h4><b>QUESTION :</b>What types of books can you sell on Greening BookPlanet?</h4>
                        <br>
                        <h5 class="pstyle"><b>ANSWER :</b> You can sell common book formats such as hardcovers, paperbacks.Whether
                            you want to resell non-fiction books you've already read, part with beloved comic books,
                            list rare hardcover collectibles, or get rid of children's books, you don't need to look any further.</h5>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table style="overflow-x:auto;" class="question">
            <tr>
                <td>
                    <div class="space2">
                        <h4><b>QUESTION :</b> What is an acceptable condition for books?</h4>
                        <br>
                        <h5 class="pstyle"><b>ANSWER :</b> You can use specific definitions to describe the condition of a book on Amazon. This description helps manage
                            customer expectations. Reference these condition guidelines and requirements when listing a book.<br><br>

                            i. Used - Like New: Item may have minor cosmetic defects (such as marks, wears, cuts, bends, or crushes) on the cover, spine
                            pages, or dust cover. Dust cover is intact and pages are clean and not marred by notes. Item may contain remainder marks on
                            outside edges. Item may be missing bundled media.<br>
                            ii. Used - Very Good: Item may have minor cosmetic defects (such as marks, wears, cuts, bends, or crushes) on the cover, spine,
                            pages, or dust cover. Shrink wrap, dust covers, or boxed set case may be missing. Item may contain remainder marks on outside
                            edges, which should be noted in listing comments. Item may be missing bundled media.<br>
                            iii. Used - Good: All pages and cover are intact (including the dust cover, if applicable). Spine may show signs of wear.
                            Pages may include limited notes and highlighting. May include "From the library of" labels. Shrink wrap, dust covers, or
                            boxed set case may be missing. Item may be missing bundled media.<br>
                            iv. Used - Acceptable: All pages and the cover are intact, but shrink wrap, dust covers, or boxed set case may be missing.
                            Pages may include limited notes, highlighting, or minor water damage but the text is readable. Item may be missing
                            bundled media. </h5>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table style="overflow-x:auto;" class="question">
            <tr>
                <td>
                    <div class="space2">
                        <h4><b>QUESTION :</b> Should I sell my books on Greening BookPlanet?</h4>
                        <br>
                        <h5 class="pstyle"><b>ANSWER :</b> You’re not limited to selling your books from only one website. However, if you choose to sell via multiple
                            sales channels, be careful to stay on top of your inventory and manage sales accordingly. </h5>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table style="overflow-x:auto;" class="question">
            <tr>
                <td>
                    <div class="space2">
                        <h4><b>QUESTION :</b> Ready to get started?</h4>
                        <br>
                        <h5 class="pstyle"><b>ANSWER :</b> Sign Up As Seller Now - <a href="seller/login.php">Click Here</a></h5>
                    </div>
                </td>
            </tr>
        </table>
        <br>
    </div>
    <br>
    <br>

    <!--help content-->
    <div class="ps-mission bg-cover" data-background="images/parallax/home-testimonial.jpg">
        <div class="ps-container">
            <div class="container">
                <div align="center">
                    <h2 style="color:lightgreen"><strong>get help</strong></h2><br>
                    <div>
                        <!-- Button trigger modal 1-->
                        <button type="button" class="h5style" data-toggle="modal" data-target="#exampleModalLong">
                            <h5><a href="#">Order Status</a></h5>
                        </button><br>
                        <!-- Button trigger modal 2-->
                        <button type="button" class="h5style" data-toggle="modal" data-target="#exampleModalLong2">
                            <h5><a href="#">Shipping and Delivery</a></h5>
                        </button><br>
                        <!-- Button trigger modal 3-->
                        <button type="button" class="h5style" data-toggle="modal" data-target="#exampleModalLong3">
                            <h5><a href="#">Payment Option</a></h5>
                        </button><br>
                        <!-- Button trigger modal 4-->
                        <button type="button" class="h5style" data-toggle="modal" data-target="#exampleModalLong4">
                            <h5><a href="#">Confirm Order</a></h5>
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
                        <h3>Order Status</h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5>Order status can be classify to three status</h5><br><br>

                    1. <b>Order confirmed</b> - when buyer has complete the payment,  that confirms the receipt and acceptance of an order. <br>
                    2. <b>On the way</b> - the buyer package has start to delivered tho the buyer location, A package can remain in this status until
                     the buyer has received their package.<br>
                    3. <b>Complete order</b> - when the buyer has receive the package the buyer request to click the confirm order button, but before 
                    confirm order has make, buyer had to consider that the package or the product that you receive  is in the condition that
                     buyer could accept, after clicking the confirm order will be count as buyer is satisfied with the packaging.<br>


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
                        <h3>Shipping and Delivery</h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    

                    All transportation and delivery will be the responsibility of the seller. Our platform does not provide this service.
                     If the buyer needs more detailed transportation information, you can contact the seller. The seller information could 
                     find at the product detail page.<br><br>

                   
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
                        <h3>Payment option</h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                At our platform we had provide two ways for buyers to pay their product<br>
                1. online transfer <br>
                2. cash deposit machine (CDM)<br><br>

                <b>** our platform will only receive the receipt or pdf as a proof, our platform will not provide the link for auto online transfer,
                 the buyer will had to use the method as above in the payment option and print out or save the receipt and upload the receipt when
                  buyers is doing the check out.</b>

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
                        <h3>Confirm Order</h3>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                We will not be responsible for subsequent problems. If the buyer does not receive the goods,
                 you can contact the seller for information. If the seller ignores the buyer’s communication,
                  the buyer can notify us immediately and we will take measures as soon as possible
                </div>
                <div class="modal-footer">
                    <button class="ps-btn" data-dismiss="modal">close</button>

                </div>
            </div>
        </div>
    </div>


    <!-- Aditional Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">


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
    <script type="text/javascript" src="js/help.js"></script>
</body>

</html>