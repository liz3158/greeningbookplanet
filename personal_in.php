<?php
session_start();

$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "db_bookplanet";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(-1);

isset($_SESSION['user_id']) && isset($_SESSION['user_email'])

?>


<?php

$user_email = $_SESSION['user_email'];
$query = "SELECT * FROM user WHERE user_email = '$user_email' ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {


        $user_name = $row['user_name'];
        $user_contactno = $row['user_contactno'];
        $user_email = $row['user_email'];
        $user_address = $row['user_address'];
        $user_state = $row['user_state'];
        $user_city = $row['user_city'];
        $user_zipcode = $row['user_zipcode'];
    }
}


?>

<?php
if (isset($_POST['update'])) {
    $user_name = $_POST['user_name'];
    $user_contactno = $_POST['user_contactno'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_state = $_POST['user_state'];
    $user_city = $_POST['user_city'];
    $user_zipcode = $_POST['user_zipcode'];
    $query = mysqli_query($conn, "UPDATE user SET user_name='$user_name',user_contactno='$user_contactno',user_email='$user_email',user_address='$user_address',user_state='$user_state',user_city='$user_city',user_zipcode='$user_zipcode' WHERE user_id='" . $_SESSION['user_id'] . "'");
    if ($query) {
        echo "<script>alert('Information has been updated');</script>";
    }
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
                                        while ($row1 = mysqli_fetch_array($result1)):; ?>
                                        <div class="mega-column">
                                            <h4 class="mega-heading"><?php echo $row1[1];?></h4>
                                            <ul class="mega-item">
                                            <?php
                                            $id = $row1[0];
                                            $result = mysqli_query($conn, "SELECT * FROM subcategory WHERE category_id='$id'");
                                            while ($row = mysqli_fetch_array($result)):; ?>
                                                <li><a href="product_listing.php?subcategory_id=<?php echo $row[0];?>"><?php echo $row[2];?></a></li>
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
    </div><br>

    <!--Personal information-->
    <form action="personal_in.php" method="post">
        <div class="container rounded bg-white mt-5 mb-5">
            <div align="center">
                <h1><b>Personal Information</b></h1>
            </div><br><br>
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="images/user.png"><span class="text-black-50"><?php echo $_SESSION['user_email']; ?></span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">

                    <div class="p-3 py-5">
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" id="name" name="user_name" value="<?php echo $user_name; ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Email Address</label><input type="text" class="form-control" id="email" name="user_email" value="<?php echo $user_email; ?>"></div>
                        </div>
                        <div class="row mt-3">

                            <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" name="user_contactno" value="<?php echo $user_contactno; ?>"></div>
                            <div class="col-md-12"><label class="labels">Address</label><textarea type="text" class="form-control" placeholder="enter address" id="address" name="user_address"><?php echo $user_address; ?></textarea></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter state" id="state" name="user_state" value="<?php echo $user_state; ?>"></div>
                    <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="enter city" id="city" name="user_city" value="<?php echo $user_city; ?>"></div><br>
                    <div class="col-md-12"><label class="labels">Zipcode</label><input type="text" class="form-control" placeholder="enter zipcode" id="zipcode" name="user_zipcode" value="<?php echo $user_zipcode; ?>"></div>
                </div>
                <div class="col-md-4">
                    <br>
                    <div class="mt-5 text-center"><button class="ps-btn" type="submit" name="update">Save Change</button></div>
                </div>

            </div>
        </div>
    </form>
    <br><br><br>


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
                                        while ($row2 = mysqli_fetch_array($result2)):; ?>
                                                <li><a href="#"><?php echo $row2[1];?></a></li>
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