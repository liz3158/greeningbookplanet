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
        <link rel="stylesheet" href="css/learnmore.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Custom-->
        <link rel="stylesheet" href="css/style.css">
        <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--WARNING: Respond.js doesn't work if you view the page via file://-->
        <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
        <!--Favicon-->
        <link rel="icon" href="images/favicon.ico">
        <!--测试css代码-->
        <link rel="stylesheet" type="text/css" href="css/home_product_card.css">
        <link rel="stylesheet" type="text/css" href="css\grid.css">
        <script src="https://kit.fontawesome.com/768ea81349.js">
        </script>

    </head>
    <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

    <!--测试css代码-->
    <style>
        @import url("grid.css");
    </style>


    <body class="ps-loading" onload="myFunction()">
        <div class="header--sidebar"></div>
        <header class="header">
            <div class="header__top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                            <p>Welcome To Greening BookPlanet Website! Hello,<?php echo $_SESSION['user_name']; ?></p>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                            <div class="header__actions"></span><a href="login.php">Login & Register</a>
                                <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status</a>
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
                                            <li class="menu-item"><a href="track_order.php">Track Order</a>
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

                        <div class="ps-cart"><a class="ps-cart__toggle" href="mycart.php"><span></span><i class="ps-icon-shopping-cart"></i></a></div>
                    </div>
                    <div class="menu-toggle"><span></span></div>
                </div>
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
        <main class="ps-main">

            <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
                <div class="ps-container">

                    <div class="ps-section__header mb-50">
                        <h3 class="ps-section__title" data-mask="#"></h3>
                        <ul class="ps-masonry__filter">
                            <li class="current"><a href="#" data-filter="*" onclick="display()">All <sup></sup></a></li>
                            <li><a href="#" data-filter=".nike" onclick="display_one(1)">Fiction <sup></sup></a></li>
                            <li><a href="#" data-filter=".adidas" onclick="display_two(2)">Non-Fiction <sup></sup></a></li>
                            <li><a href="#" data-filter=".men" onclick="display_three(3)">Textbook<sup></sup></a></li>
                            <li><a href="#" data-filter=".women" onclick="display_four(4,2,3)">Other <sup></sup></a></li>
                        </ul>
                    </div>
                    <div class="grid" id="grid">


                    </div>
                    <div id="loadMore">
                        <a href="#">Load More</a>
                    </div>
                </div>
            </div>
            </div>



            <!--about us section-->
            <div class="ps-home-testimonial bg--parallax pb-80" data-background="images/about.jpg">
                <div class="container">
                    <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                    </div>
                    <div class="ps-testimonial">
                        <div class="ps-testimonial__thumbnail"><a href="about.php"><img src="images/GBP_LOGO_04.png" alt=""><i class="fa fa-quote-left"></i></a></div>
                        <header>

                            <p>Who We Are</p>
                        </header>
                        <footer>
                            <p>“Welcome to our website, we provide...... “</p>
                        </footer>
                    </div>
                </div>
            </div>

            <!--seller and customer register section-->
            <div class="ps-section--offer">
                <div class="ps-column"><a class="ps-offer" href="login.php"><img src="images/customer.jpeg" alt=""></a></div>
                <div class="ps-column"><a class="ps-offer" href="startselling.php"><img src="images/seller.jpeg" alt=""></a></div>
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
        </main>
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
    function myFunction() {
        $(".moreBox").slice(0, 4).show();
    }
    $("#loadMore").on("click", function() {
        $(".moreBox:hidden").slice(0, 4).slideDown()
        if ($(".moreBox:hidden").length == 0) {
            $("#loadMore").fadeOut('slow')
        }
    })
</script>
<script>
    var user_id = "";
    var seller_id = "";
    $.ajaxSetup({
        cache: false
    })
    $.get('getsession.php', function(data) {
        var json = JSON.parse(data);
        //alert(json.user_id);


        user_id = json.user_id;

        $.ajax({
            url: "home_show.php",
            data: {
                option: "display"
            },
            cache: false,
            type: "POST",

            success: function(response) {

                    var json = JSON.parse(response);

                    console.table(json);
                    console.log(json[0].category_id);
                    var html_product_card = "";



                    for (var x = 0; x < json.length; x++) {
                        var book_id = json[x].book_id;
                        user_id = user_id;
                        //alert(user_id);
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


                        html_product_card += '<div class="card__container moreBox">' +
                            '<div class="card__top__section">' +
                            '<img src="seller/img_book/' + img1 + '">' +
                            '</div>' +
                            '<input type="hidden" class="book_id" name="book_id" value="' + book_id + '">' +
                            '<input type="hidden" class="user_id" name="user_id" value="' + user_id + '">' +
                            '<input type="hidden" class="seller_id" name="seller_id" value="' + seller_id + '">' +
                            '<input type="hidden" class="category_id" name="category_id" value="' + category_id + '">' +
                            '<input type="hidden" class="subcategory_id" name="subcategory_id" value="' + subcategory_id + '">' +
                            '<input type="hidden" class="name" name="name" value="' + book_name + '">' +
                            '<input type="hidden" class="author" name="author" value="' + book_author + '">' +
                            '<input type="hidden" class="book_condition" name="book_condition" value="' + book_condition + '">' +
                            '<input type="hidden" class="description" name="description" value="' + book_description + '">' +
                            '<input type="hidden" class="language" name="language" value="' + book_language + '">' +
                            '<input type="hidden" class="pages" name="pages" value="' + book_pages + '">' +
                            '<input type="hidden" class="formats" name="formats" value="' + book_formats + '">' +
                            '<input type="hidden" class="isbn" name="isbn" value="' + book_isbn + '">' +
                            '<input type="hidden" class="pub_date" name="pub_date" value="' + book_pub_date + '">' +
                            '<input type="hidden" class="quantity" name="quantity" value="' + book_quantity + '">' +
                            '<input type="hidden" class="price" name="price" value="' + book_price + '">' +
                            '<input type="hidden" class="ori_price" name="ori_price" value="' + book_ori_price + '">' +
                            '<input type="hidden" class="shipPlace" name="shipPlace" value="' + shipPlace + '">' +
                            '<input type="hidden" class="img1" name="img1" value="' + img1 + '">' +
                            '<input type="hidden" class="img2" name="img2" value="' + img2 + '">' +
                            '<input type="hidden" class="img3" name="img3" value="' + img3 + '">' +
                            '<input type="hidden" class="img4" name="img4" value="' + img4 + '">' +

                            '<div class="card__body__section">' +
                            '<p>' + book_name + '</p>' +
                            '<span>' + book_author + '</span>' +
                            '</div>' +
                            '<div>' +
                            '<div class="rating-section">' +
                            '<div class="">' +
                            '</div>' +
                            '<div class="c-price">' +
                            '<button onclick="add_to_wishlist(' + book_id + ')" data-toggle="tooltip" data-placement="bottom" title="Add to Wishlist" >' +
                            '<div>' +
                            '<i class="">' +
                            '<img src="images/icon/wishlist.png" width="30px" height="25px">' +
                            '</i>' +
                            '</div>' +
                            '</button>' +
                            '<button class="add_to_cardbtn" onclick="add_to_card(' + book_id + ')" name="add"  data-toggle="tooltip" data-placement="bottom" title="Add to Cart">' +
                            '<div>' +

                            '<i class="">' + '<img src="images/icon/add-cart.png" width="35px" height="25px"></i>' +
                            '</div>' +
                            '</button>' +

                            '<button class="add_to_cardbtn" name="add" >' +
                            '<div>' +
                            '<a href="product_detail.php?book_id=' + book_id + '"  data-toggle="tooltip" data-placement="bottom" title="Show Product Detail">' +
                            '<img src="images/icon/view-details.png" width="30px" height="25px">' +
                            '<a/>' +

                            '</div>' +
                            '</button>' +


                            '<span>RM' + book_price + '</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '' +
                            '</div>';

                    }

                    $("#grid").html(html_product_card);

                }

                ,
            error: function(response) {}
        });

        //////////qwqw
    });

    function display() {
        $.get('getsession.php', function(data) {
            var json = JSON.parse(data);
            //alert(json.user_id);


            user_id = json.user_id;
            var category = "";
            $.ajax({
                url: "home_show.php",
                data: {
                    option: "display"
                },
                cache: false,
                type: "POST",

                success: function(response) {

                        var json = JSON.parse(response);

                        console.table(json);
                        console.log(json[0].category_id);
                        var html_product_card = "";



                        for (var x = 0; x < json.length; x++) {
                            var book_id = json[x].book_id;
                            user_id = user_id;
                            //alert(user_id);
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


                            html_product_card += '<div class="card__container moreBox">' +
                                '<div class="card__top__section">' +
                                '<img src="seller/img_book/' + img1 + '">' +
                                '</div>' +
                                '<input type="hidden" class="book_id" name="book_id" value="' + book_id + '">' +
                                '<input type="hidden" class="user_id" name="user_id" value="' + user_id + '">' +
                                '<input type="hidden" class="seller_id" name="seller_id" value="' + seller_id + '">' +
                                '<input type="hidden" class="category_id" name="category_id" value="' + category_id + '">' +
                                '<input type="hidden" class="subcategory_id" name="subcategory_id" value="' + subcategory_id + '">' +
                                '<input type="hidden" class="name" name="name" value="' + book_name + '">' +
                                '<input type="hidden" class="author" name="author" value="' + book_author + '">' +
                                '<input type="hidden" class="book_condition" name="book_condition" value="' + book_condition + '">' +
                                '<input type="hidden" class="description" name="description" value="' + book_description + '">' +
                                '<input type="hidden" class="language" name="language" value="' + book_language + '">' +
                                '<input type="hidden" class="pages" name="pages" value="' + book_pages + '">' +
                                '<input type="hidden" class="formats" name="formats" value="' + book_formats + '">' +
                                '<input type="hidden" class="isbn" name="isbn" value="' + book_isbn + '">' +
                                '<input type="hidden" class="pub_date" name="pub_date" value="' + book_pub_date + '">' +
                                '<input type="hidden" class="quantity" name="quantity" value="' + book_quantity + '">' +
                                '<input type="hidden" class="price" name="price" value="' + book_price + '">' +
                                '<input type="hidden" class="ori_price" name="ori_price" value="' + book_ori_price + '">' +
                                '<input type="hidden" class="shipPlace" name="shipPlace" value="' + shipPlace + '">' +
                                '<input type="hidden" class="img1" name="img1" value="' + img1 + '">' +
                                '<input type="hidden" class="img2" name="img2" value="' + img2 + '">' +
                                '<input type="hidden" class="img3" name="img3" value="' + img3 + '">' +
                                '<input type="hidden" class="img4" name="img4" value="' + img4 + '">' +

                                '<div class="card__body__section">' +
                                '<p>' + book_name + '</p>' +
                                '<span>' + book_author + '</span>' +
                                '</div>' +
                                '<div>' +
                                '<div class="rating-section">' +
                                '<div class="">' +
                                '</div>' +
                                '<div class="c-price">' +
                                '<button onclick="add_to_wishlist(' + book_id + ')" data-toggle="tooltip" data-placement="bottom" title="Add to Wishlist" >' +
                                '<div>' +
                                '<i class="">' +
                                '<img src="images/icon/wishlist.png" width="30px" height="25px">' +
                                '</i>' +
                                '</div>' +
                                '</button>' +
                                '<button class="add_to_cardbtn" onclick="add_to_card(' + book_id + ')" name="add"  data-toggle="tooltip" data-placement="bottom" title="Add to Cart">' +
                                '<div>' +

                                '<i class="">' + '<img src="images/icon/add-cart.png" width="35px" height="25px"></i>' +
                                '</div>' +
                                '</button>' +

                                '<button class="add_to_cardbtn" name="add" >' +
                                '<div>' +
                                '<a href="product_detail.php?book_id=' + book_id + '"  data-toggle="tooltip" data-placement="bottom" title="Show Product Detail">' +
                                '<img src="images/icon/view-details.png" width="30px" height="25px">' +
                                '<a/>' +

                                '</div>' +
                                '</button>' +


                                '<span>RM' + book_price + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '' +
                                '</div>';



                        }

                        $("#grid").html(html_product_card);
                        $(".moreBox").slice(0, 4).show();
                        $("#loadMore").show();
                    }

                    ,
                error: function(response) {}
            });

            //////////qwqw
        });
    }


    function display_one(id) {
        $.get('getsession.php', function(data) {
            var json = JSON.parse(data);
            //alert(json.user_id);


            user_id = json.user_id;
            //alert(id);
            var category = "";
            $.ajax({
                url: "home_show.php",
                data: {
                    option: "display_one",
                    category_id: id
                },
                cache: false,
                type: "POST",

                success: function(response) {

                        var json = JSON.parse(response);

                        console.table(json);
                        console.log(json[0].category_id);
                        var html_product_card = "";



                        for (var x = 0; x < json.length; x++) {
                            var book_id = json[x].book_id;
                            user_id = user_id;
                            //alert(user_id);
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


                            html_product_card += '<div class="card__container moreBox">' +
                                '<div class="card__top__section">' +
                                '<img src="seller/img_book/' + img1 + '">' +
                                '</div>' +
                                '<input type="hidden" class="book_id" name="book_id" value="' + book_id + '">' +
                                '<input type="hidden" class="user_id" name="user_id" value="' + user_id + '">' +
                                '<input type="hidden" class="seller_id" name="seller_id" value="' + seller_id + '">' +
                                '<input type="hidden" class="category_id" name="category_id" value="' + category_id + '">' +
                                '<input type="hidden" class="subcategory_id" name="subcategory_id" value="' + subcategory_id + '">' +
                                '<input type="hidden" class="name" name="name" value="' + book_name + '">' +
                                '<input type="hidden" class="author" name="author" value="' + book_author + '">' +
                                '<input type="hidden" class="book_condition" name="book_condition" value="' + book_condition + '">' +
                                '<input type="hidden" class="description" name="description" value="' + book_description + '">' +
                                '<input type="hidden" class="language" name="language" value="' + book_language + '">' +
                                '<input type="hidden" class="pages" name="pages" value="' + book_pages + '">' +
                                '<input type="hidden" class="formats" name="formats" value="' + book_formats + '">' +
                                '<input type="hidden" class="isbn" name="isbn" value="' + book_isbn + '">' +
                                '<input type="hidden" class="pub_date" name="pub_date" value="' + book_pub_date + '">' +
                                '<input type="hidden" class="quantity" name="quantity" value="' + book_quantity + '">' +
                                '<input type="hidden" class="price" name="price" value="' + book_price + '">' +
                                '<input type="hidden" class="ori_price" name="ori_price" value="' + book_ori_price + '">' +
                                '<input type="hidden" class="shipPlace" name="shipPlace" value="' + shipPlace + '">' +
                                '<input type="hidden" class="img1" name="img1" value="' + img1 + '">' +
                                '<input type="hidden" class="img2" name="img2" value="' + img2 + '">' +
                                '<input type="hidden" class="img3" name="img3" value="' + img3 + '">' +
                                '<input type="hidden" class="img4" name="img4" value="' + img4 + '">' +

                                '<div class="card__body__section">' +
                                '<p>' + book_name + '</p>' +
                                '<span>' + book_author + '</span>' +
                                '</div>' +
                                '<div>' +
                                '<div class="rating-section">' +
                                '<div class="">' +
                                '</div>' +
                                '<div class="c-price">' +
                                '<button onclick="add_to_wishlist(' + book_id + ')" data-toggle="tooltip" data-placement="bottom" title="Add to Wishlist" >' +
                                '<div>' +
                                '<i class="">' +
                                '<img src="images/icon/wishlist.png" width="30px" height="25px">' +
                                '</i>' +
                                '</div>' +
                                '</button>' +
                                '<button class="add_to_cardbtn" onclick="add_to_card(' + book_id + ')" name="add"  data-toggle="tooltip" data-placement="bottom" title="Add to Cart">' +
                                '<div>' +

                                '<i class="">' + '<img src="images/icon/add-cart.png" width="35px" height="25px"></i>' +
                                '</div>' +
                                '</button>' +

                                '<button class="add_to_cardbtn" name="add" >' +
                                '<div>' +
                                '<a href="product_detail.php?book_id=' + book_id + '"  data-toggle="tooltip" data-placement="bottom" title="Show Product Detail">' +
                                '<img src="images/icon/view-details.png" width="30px" height="25px">' +
                                '<a/>' +

                                '</div>' +
                                '</button>' +


                                '<span>RM' + book_price + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '' +
                                '</div>';



                        }

                        $("#grid").html(html_product_card);
                        $(".moreBox").slice(0, 4).show();
                        $("#loadMore").show();

                    }

                    ,
                error: function(response) {}
            });
            /////////qwqw
        });
    }

    function display_two(id) {
        $.get('getsession.php', function(data) {
            var json = JSON.parse(data);
            //alert(json.user_id);


            user_id = json.user_id;

            var category = "";
            $.ajax({
                url: "home_show.php",
                data: {
                    option: "display_two",
                    category_id: id
                },
                cache: false,
                type: "POST",

                success: function(response) {

                        var json = JSON.parse(response);

                        console.table(json);
                        console.log(json[0].category_id);
                        var html_product_card = "";



                        for (var x = 0; x < json.length; x++) {
                            var book_id = json[x].book_id;
                            user_id = user_id;
                            //alert(user_id);
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


                            html_product_card += '<div class="card__container moreBox">' +
                                '<div class="card__top__section">' +
                                '<img src="seller/img_book/' + img1 + '">' +
                                '</div>' +
                                '<input type="hidden" class="book_id" name="book_id" value="' + book_id + '">' +
                                '<input type="hidden" class="user_id" name="user_id" value="' + user_id + '">' +
                                '<input type="hidden" class="seller_id" name="seller_id" value="' + seller_id + '">' +
                                '<input type="hidden" class="category_id" name="category_id" value="' + category_id + '">' +
                                '<input type="hidden" class="subcategory_id" name="subcategory_id" value="' + subcategory_id + '">' +
                                '<input type="hidden" class="name" name="name" value="' + book_name + '">' +
                                '<input type="hidden" class="author" name="author" value="' + book_author + '">' +
                                '<input type="hidden" class="book_condition" name="book_condition" value="' + book_condition + '">' +
                                '<input type="hidden" class="description" name="description" value="' + book_description + '">' +
                                '<input type="hidden" class="language" name="language" value="' + book_language + '">' +
                                '<input type="hidden" class="pages" name="pages" value="' + book_pages + '">' +
                                '<input type="hidden" class="formats" name="formats" value="' + book_formats + '">' +
                                '<input type="hidden" class="isbn" name="isbn" value="' + book_isbn + '">' +
                                '<input type="hidden" class="pub_date" name="pub_date" value="' + book_pub_date + '">' +
                                '<input type="hidden" class="quantity" name="quantity" value="' + book_quantity + '">' +
                                '<input type="hidden" class="price" name="price" value="' + book_price + '">' +
                                '<input type="hidden" class="ori_price" name="ori_price" value="' + book_ori_price + '">' +
                                '<input type="hidden" class="shipPlace" name="shipPlace" value="' + shipPlace + '">' +
                                '<input type="hidden" class="img1" name="img1" value="' + img1 + '">' +
                                '<input type="hidden" class="img2" name="img2" value="' + img2 + '">' +
                                '<input type="hidden" class="img3" name="img3" value="' + img3 + '">' +
                                '<input type="hidden" class="img4" name="img4" value="' + img4 + '">' +

                                '<div class="card__body__section">' +
                                '<p>' + book_name + '</p>' +
                                '<span>' + book_author + '</span>' +
                                '</div>' +
                                '<div>' +
                                '<div class="rating-section">' +
                                '<div class="">' +
                                '</div>' +
                                '<div class="c-price">' +
                                '<button onclick="add_to_wishlist(' + book_id + ')" data-toggle="tooltip" data-placement="bottom" title="Add to Wishlist" >' +
                                '<div>' +
                                '<i class="">' +
                                '<img src="images/icon/wishlist.png" width="30px" height="25px">' +
                                '</i>' +
                                '</div>' +
                                '</button>' +
                                '<button class="add_to_cardbtn" onclick="add_to_card(' + book_id + ')" name="add"  data-toggle="tooltip" data-placement="bottom" title="Add to Cart">' +
                                '<div>' +

                                '<i class="">' + '<img src="images/icon/add-cart.png" width="35px" height="25px"></i>' +
                                '</div>' +
                                '</button>' +

                                '<button class="add_to_cardbtn" name="add" >' +
                                '<div>' +
                                '<a href="product_detail.php?book_id=' + book_id + '"  data-toggle="tooltip" data-placement="bottom" title="Show Product Detail">' +
                                '<img src="images/icon/view-details.png" width="30px" height="25px">' +
                                '<a/>' +

                                '</div>' +
                                '</button>' +


                                '<span>RM' + book_price + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '' +
                                '</div>';



                        }

                        $("#grid").html(html_product_card);
                        $(".moreBox").slice(0, 4).show();
                        $("#loadMore").show();
                    }

                    ,
                error: function(response) {}
            });
            /////////qwqw
        });
    }


    function display_three(id) {
        $.get('getsession.php', function(data) {
            var json = JSON.parse(data);
            //alert(json.user_id);


            user_id = json.user_id;

            var category = "";
            $.ajax({
                url: "home_show.php",
                data: {
                    option: "display_three",
                    category_id: id
                },
                cache: false,
                type: "POST",

                success: function(response) {

                        var json = JSON.parse(response);

                        console.table(json);
                        console.log(json[0].category_id);
                        var html_product_card = "";



                        for (var x = 0; x < json.length; x++) {
                            var book_id = json[x].book_id;
                            user_id = user_id;
                            //alert(user_id);
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


                            html_product_card += '<div class="card__container moreBox">' +
                                '<div class="card__top__section">' +
                                '<img src="seller/img_book/' + img1 + '">' +
                                '</div>' +
                                '<input type="hidden" class="book_id" name="book_id" value="' + book_id + '">' +
                                '<input type="hidden" class="user_id" name="user_id" value="' + user_id + '">' +
                                '<input type="hidden" class="seller_id" name="seller_id" value="' + seller_id + '">' +
                                '<input type="hidden" class="category_id" name="category_id" value="' + category_id + '">' +
                                '<input type="hidden" class="subcategory_id" name="subcategory_id" value="' + subcategory_id + '">' +
                                '<input type="hidden" class="name" name="name" value="' + book_name + '">' +
                                '<input type="hidden" class="author" name="author" value="' + book_author + '">' +
                                '<input type="hidden" class="book_condition" name="book_condition" value="' + book_condition + '">' +
                                '<input type="hidden" class="description" name="description" value="' + book_description + '">' +
                                '<input type="hidden" class="language" name="language" value="' + book_language + '">' +
                                '<input type="hidden" class="pages" name="pages" value="' + book_pages + '">' +
                                '<input type="hidden" class="formats" name="formats" value="' + book_formats + '">' +
                                '<input type="hidden" class="isbn" name="isbn" value="' + book_isbn + '">' +
                                '<input type="hidden" class="pub_date" name="pub_date" value="' + book_pub_date + '">' +
                                '<input type="hidden" class="quantity" name="quantity" value="' + book_quantity + '">' +
                                '<input type="hidden" class="price" name="price" value="' + book_price + '">' +
                                '<input type="hidden" class="ori_price" name="ori_price" value="' + book_ori_price + '">' +
                                '<input type="hidden" class="shipPlace" name="shipPlace" value="' + shipPlace + '">' +
                                '<input type="hidden" class="img1" name="img1" value="' + img1 + '">' +
                                '<input type="hidden" class="img2" name="img2" value="' + img2 + '">' +
                                '<input type="hidden" class="img3" name="img3" value="' + img3 + '">' +
                                '<input type="hidden" class="img4" name="img4" value="' + img4 + '">' +

                                '<div class="card__body__section">' +
                                '<p>' + book_name + '</p>' +
                                '<span>' + book_author + '</span>' +
                                '</div>' +
                                '<div>' +
                                '<div class="rating-section">' +
                                '<div class="">' +
                                '</div>' +
                                '<div class="c-price">' +
                                '<button onclick="add_to_wishlist(' + book_id + ')" data-toggle="tooltip" data-placement="bottom" title="Add to Wishlist" >' +
                                '<div>' +
                                '<i class="">' +
                                '<img src="images/icon/wishlist.png" width="30px" height="25px">' +
                                '</i>' +
                                '</div>' +
                                '</button>' +
                                '<button class="add_to_cardbtn" onclick="add_to_card(' + book_id + ')" name="add"  data-toggle="tooltip" data-placement="bottom" title="Add to Cart">' +
                                '<div>' +

                                '<i class="">' + '<img src="images/icon/add-cart.png" width="35px" height="25px"></i>' +
                                '</div>' +
                                '</button>' +

                                '<button class="add_to_cardbtn" name="add" >' +
                                '<div>' +
                                '<a href="product_detail.php?book_id=' + book_id + '"  data-toggle="tooltip" data-placement="bottom" title="Show Product Detail">' +
                                '<img src="images/icon/view-details.png" width="30px" height="25px">' +
                                '<a/>' +

                                '</div>' +
                                '</button>' +


                                '<span>RM' + book_price + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '' +
                                '</div>';


                        }

                        $("#grid").html(html_product_card);
                        $(".moreBox").slice(0, 4).show();
                        $("#loadMore").show();

                    }

                    ,
                error: function(response) {}
            });
            /////////qwqw
        });
    }

    function display_four(id, id_2, id_3) {
        $.get('getsession.php', function(data) {
            var json = JSON.parse(data);
            //alert(json.user_id);


            user_id = json.user_id;

            var category = "";
            $.ajax({
                url: "home_show.php",
                data: {
                    option: "display_four",
                    category_id: id,
                    category_id_2: id_2,
                    category_id_3: id_3
                },
                cache: false,
                type: "POST",

                success: function(response) {

                        var json = JSON.parse(response);

                        console.table(json);
                        console.log(json[0].category_id);
                        var html_product_card = "";



                        for (var x = 0; x < json.length; x++) {
                            var book_id = json[x].book_id;
                            user_id = user_id;
                            //alert(user_id);
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


                            html_product_card += '<div class="card__container moreBox">' +
                                '<div class="card__top__section">' +
                                '<img src="seller/img_book/' + img1 + '">' +
                                '</div>' +
                                '<input type="hidden" class="book_id" name="book_id" value="' + book_id + '">' +
                                '<input type="hidden" class="user_id" name="user_id" value="' + user_id + '">' +
                                '<input type="hidden" class="seller_id" name="seller_id" value="' + seller_id + '">' +
                                '<input type="hidden" class="category_id" name="category_id" value="' + category_id + '">' +
                                '<input type="hidden" class="subcategory_id" name="subcategory_id" value="' + subcategory_id + '">' +
                                '<input type="hidden" class="name" name="name" value="' + book_name + '">' +
                                '<input type="hidden" class="author" name="author" value="' + book_author + '">' +
                                '<input type="hidden" class="book_condition" name="book_condition" value="' + book_condition + '">' +
                                '<input type="hidden" class="description" name="description" value="' + book_description + '">' +
                                '<input type="hidden" class="language" name="language" value="' + book_language + '">' +
                                '<input type="hidden" class="pages" name="pages" value="' + book_pages + '">' +
                                '<input type="hidden" class="formats" name="formats" value="' + book_formats + '">' +
                                '<input type="hidden" class="isbn" name="isbn" value="' + book_isbn + '">' +
                                '<input type="hidden" class="pub_date" name="pub_date" value="' + book_pub_date + '">' +
                                '<input type="hidden" class="quantity" name="quantity" value="' + book_quantity + '">' +
                                '<input type="hidden" class="price" name="price" value="' + book_price + '">' +
                                '<input type="hidden" class="ori_price" name="ori_price" value="' + book_ori_price + '">' +
                                '<input type="hidden" class="shipPlace" name="shipPlace" value="' + shipPlace + '">' +
                                '<input type="hidden" class="img1" name="img1" value="' + img1 + '">' +
                                '<input type="hidden" class="img2" name="img2" value="' + img2 + '">' +
                                '<input type="hidden" class="img3" name="img3" value="' + img3 + '">' +
                                '<input type="hidden" class="img4" name="img4" value="' + img4 + '">' +

                                '<div class="card__body__section">' +
                                '<p>' + book_name + '</p>' +
                                '<span>' + book_author + '</span>' +
                                '</div>' +
                                '<div>' +
                                '<div class="rating-section">' +
                                '<div class="">' +
                                '</div>' +
                                '<div class="c-price">' +
                                '<button onclick="add_to_wishlist(' + book_id + ')" data-toggle="tooltip" data-placement="bottom" title="Add to Wishlist" >' +
                                '<div>' +
                                '<i class="">' +
                                '<img src="images/icon/wishlist.png" width="30px" height="25px">' +
                                '</i>' +
                                '</div>' +
                                '</button>' +
                                '<button class="add_to_cardbtn" onclick="add_to_card(' + book_id + ')" name="add"  data-toggle="tooltip" data-placement="bottom" title="Add to Cart">' +
                                '<div>' +

                                '<i class="">' + '<img src="images/icon/add-cart.png" width="35px" height="25px"></i>' +
                                '</div>' +
                                '</button>' +

                                '<button class="add_to_cardbtn" name="add" >' +
                                '<div>' +
                                '<a href="product_detail.php?book_id=' + book_id + '"  data-toggle="tooltip" data-placement="bottom" title="Show Product Detail">' +
                                '<img src="images/icon/view-details.png" width="30px" height="25px">' +
                                '<a/>' +

                                '</div>' +
                                '</button>' +


                                '<span>RM' + book_price + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '' +
                                '</div>';


                        }

                        $("#grid").html(html_product_card);
                        $(".moreBox").slice(0, 4).show();
                        $("#loadMore").show();

                    }

                    ,
                error: function(response) {}
            });
            /////////qwqw
        });
    }

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