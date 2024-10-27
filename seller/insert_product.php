<?php
session_start();

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "db_bookplanet";

$connect = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$connect) {
	echo "Connection failed!";
}

if (isset($_SESSION['seller_id']) && isset($_SESSION['seller_email'])) {


        //Form update code
        if(isset($_POST['submit'])){
    
            // $typelist=array("image/jpeg","image/jpg","image/png","image/gif"); 
            
            // if(!in_array($img1["type"],$typelist)){
            //     die("上传文件类型非法!".$img1["type"]);
            //     echo "<script>alert('<h3>data stored in a database successfully." 
            //             . " Please browse your localhost php my admin" 
            //             . " to view the updated data</h3>y');
            //             location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
            // }
        
        
            //表格的name
            $image1=$_FILES['img1']['name'];
            $image2=$_FILES['img2']['name'];
            $image3=$_FILES['img3']['name'];
            $image4=$_FILES['img4']['name'];
        
            //目标路径
            $target1="img_book/".basename($image1);
            $target2="img_book/".basename($image2);
            $target3="img_book/".basename($image3);
            $target4="img_book/".basename($image4);
        
            //表格填写的全部数据 
            $book_id = '';
            $seller_id=$_SESSION['seller_id'];
            $category_id=$_POST['category_id'];
            $subcategory_id=$_POST['subcategory_id'];;
            $book_name =  $_POST['book_name'];
            $book_author=$_POST['author'];
            $book_condition = $_POST['book_condition'];
            $book_description=$_POST['description'];
            $book_language=$_POST['language'];
            $book_pages=$_POST['pages'];
            $book_formats=$_POST['format'];
            $book_isbn=$_POST['isbn'];
            $book_pub_date=$_POST['pub_date'];
            // $book_quantity=$_POST['quantity'];
            $book_quantity=1;
            $book_price=$_POST['price'];
            $book_ori_price=$_POST['ori_price'];
            $shipPlace=$_POST['shipPlace'];
            $img1=$image1;
            $img2=$image2;
            $img3=$image3;
            $img4=$image4;
            $book_status ="onShop"; 
            
            // Performing insert query execution
            // here our table name is college
            //数据库指令（添加）
            $sql = "INSERT INTO book (book_id, seller_id, category_id, subcategory_id, book_name, book_author,book_condition , book_description, book_language, book_pages, book_formats, book_isbn, book_pub_date, book_quantity,book_price, book_ori_price, shipPlace, img1, img2, img3, img4, book_status) 
            VALUES ('','$seller_id','$category_id','$subcategory_id','$book_name','$book_author','$book_condition ','$book_description','$book_language','$book_pages','$book_formats','$book_isbn','$book_pub_date','$book_quantity','$book_price','$book_ori_price','$shipPlace','$img1','$img2','$img3','$img4','$book_status')";
            $result = mysqli_query($connect, $sql);

        
                //保存图片文件到目标路径
                if(move_uploaded_file($_FILES['img1']['tmp_name'],$target1))
                {
                    //echo "<script>alert('save img1 to file!');</script>";
                }
        
                if(move_uploaded_file($_FILES['img2']['tmp_name'],$target2))
                {
                    //echo "<script>alert('save img2 to file!');</script>";
                }
        
                if(move_uploaded_file($_FILES['img3']['tmp_name'],$target3))
                {
                    //echo "<script>alert('save img3 to file!');</script>";
                }
        
                if(move_uploaded_file($_FILES['img4']['tmp_name'],$target4))
                {
                    //echo "<script>alert('save img4 to file!');</script>";
                }
                   
                //执行SQL命令（添加数据）  
                if($result){
                    
                    echo "<script>alert('data stored in a database successfully." 
                        . " Please browse your localhost php my admin" 
                        . " to view the updated data');
                        location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
                
                } else{
                    //echo "<script>alert('ERROR: Hush! Sorry $sql. mysqli_error($conn);');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($connect);
                }
            }
                // Close connection
                mysqli_close($connect);
?>
<script>
function getsubcategory(){
    
    $.ajax({
        url: "insert_product_show.php",
        data: {
            option:"readsubcategory",
            
            
        },
        cache: false,
        async:false,
        type: "POST",
        success: function (response) {
        //alert(response);
            //name = response;
            var json = JSON.parse(response);
            console.table(json);
            //var c_id = document.getElementById("category_id");
            var c_id = "";
            var subcategory_lock="";
            try{
                c_id = document.getElementById("category_id").value;
            }catch(e){}
             
            
             
                for(var x = 0;x<json.length;x++){
                    //alert("hi");
                    //have run looping
                if(json[x].category_id==c_id){
                    var category_id=json[x].category_id;
                    var subcategory_id = json[x].subcategory_id;
                    var subcategory_name = json[x].subcategory_name;

                    subcategory_lock += '<option value="'+subcategory_id+'">'+subcategory_name+'</option>'; 

                }

                
            }
           // alert(subcategory_lock);
            $("#subcategory_id").html(subcategory_lock);

         
        },
        error:function(err){}
    });

}
  var name = "";
  
function drawCreateProduct(){
    $.ajax({
    url: "insert_product_show.php",
    data: {
        option:"readcategory"
    },
    cache: false,
    type: "POST",



    success: function (response) {
    
        var json = JSON.parse(response);
    
        //console.table(json);
        //console.log(json[0].category_id);
        var html = "";
        var html_form_top="";
        var html_form_mid="";
        var html_form_bot="";
        var html_form_sub_mid="";
        var html_form_sub_bot="";

        html_form_top+='<div class="container-fluid">'+

                '<!-- Default Card Example -->'+
                '<div class="card mb-4">'+
                    '<div class="card-header">'+
                        'Insert Product'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<div class="ps-section__header pt-0">'+

                        '<form class="ps-contact__form" action="insert_product.php" method="post" enctype="multipart/form-data">'+
                                '<div class="form-group">'+
                                    '<label>'+'Book Name '+ '<sub style="color: red;">'+'*</sub>'+'</label>'+
                                    '<input class="form-control" type="text" placeholder="" name="book_name" id="book_name" required>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label>'+'Book Condition '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                    '<select class="form-control" name="book_condition" id="book_condition" required>'+
                                            '<option value="Like New">'+'Like New'+'</option>'+
                                            '<option value="Very Good">'+'Very Good'+'</option>'+
                                            '<option value="Good">'+'Good'+'</option>'+
                                            '<option value="Acceptable">'+'Acceptable'+'</option>'+
                                    '</select>'+
                                    
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label>'+'Category '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                    '<select class="form-control" name="category_id" id="category_id" onchange="getsubcategory()" required>';
        
                        
        for(var x = 0;x<json.length;x++){
            
            var category_id= json[x].category_id;
            var category_name = json[x].category_name;
            html_form_mid += '<option value="'+category_id+'">'+category_name+'</option>';
            
            
            
        }                
        html_form_bot+= '</select>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Subcategory '+'<sub style="color: red;">'+'*</sub>'+'</label>'+

                                        '<select class="form-control" name="subcategory_id" id="subcategory_id" required>';

                                            
        
                                        
        
            // getsubcategory();

            
    
        html_form_sub_bot=       '</select>'+
                                    '</div>'+
                                    
                                    '<div class="form-group">'+
                                        '<label>'+'Publisher/ Author​ '+ '<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="text" placeholder="" name="author" id="author" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Publication Date​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="date" placeholder="" name="pub_date" id="pub_date" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Format/Binding​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<select class="form-control" name="format" id="format" required>'+
                                            '<option value="Hardcover">'+'Hardcover'+'</option>'+
                                            '<option value="Paperback">'+'Paperback'+'</option>'+
                                            '<option value="Folio">'+'Folio'+'</option>'+
                                            '<option value="Bunkobon">'+'Bunkobon'+'</option>'+
                                            '<option value="Chapbook">'+'Chapbook'+'</option>'+
                                            '<option value="Quarto">'+'Quarto'+'</option>'+
                                            '<option value="Block Book">'+'Block Book'+'</option>'+
                                            '<option value="Pamphlet">'+'Pamphlet'+'</option>'+
                                            '<option value="Quarto">'+'Quarto'+'</option>'+
                                        '</select>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'ISBN-13/ISBN-10​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="" placeholder="" name="isbn" id="isbn" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Book Pages '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="number" placeholder="" name="pages" id="pages" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Language​​​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<select class="form-control" name="language" id="language" required>'+
                                            '<option value="Bahasa Melayu">'+'Bahasa Melayu'+'</option>'+
                                            '<option value="Chinese">'+'Chinese'+'</option>'+
                                            '<option value="English">'+'English'+'</option>'+
                                        '</select>'+
                                    '</div>'+
                                    // '<div class="form-group">'+
                                    //     '<label>'+'Quantity​​​ '+'<sub style="color: red;"> '+'*</sub>'+'</label>'+
                                    //     '<input class="form-control" type="text" placeholder="" name="quantity" id="quantity">'+
                                    // '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Selling Price​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="text" placeholder="" name="price" id="price" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Purchased Price​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="text" placeholder="" name="ori_price" id="ori_price" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Shipping place '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="text" name="shipPlace" id="shipPlace" required>'+
                                    '</div>'+
                                    '<div class="form-group mb-25">'+
                                        '<label>'+'Description '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<textarea class="form-control" rows="6" name="description" id="description" required>'+'</textarea>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<input type="hidden" name="size" value="1000000000" id="itemImage">'+
                                        '<label>'+'Front Cover​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="file" placeholder="" name="img1" id="img1" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Back Cover ​'+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="file" placeholder="" name="img2" id="img2" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Content​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="file" placeholder="" name="img3" id="img3" required>'+
                                    '</div>'+
                                    '<div class="form-group">'+
                                        '<label>'+'Additional​ '+'<sub style="color: red;">'+'*</sub>'+'</label>'+
                                        '<input class="form-control" type="file" placeholder="" name="img4" id="img4" required>'+
                                    '</div>'+

                                    '<div class="form-group">'+
                                        '<a href="" class="btn btn-success btn-icon-split">'+
                                            '<span class="icon text-white-50">'+
                                                '<i class="fas fa-check">'+'</i>'+
                                            '</span>'+
                                            
                                            '<span class="text">'+'<input type="submit" name="submit" value="submit" class="btn btn-success btn-icon-split">'+'</span>'+
                                            
                                        '</a>'+
                                    '</div>'+
                                '</form>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+

                '</div>'; 

        html= html_form_top +html_form_mid  + html_form_bot + html_form_sub_mid + html_form_sub_bot;
        
        $("#here").html(html);
    
        }

    ,error:function(response){}
    });
}


</script>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GBP Seller Insert Product</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom styles for this page 表格的css-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!--Favicon-->
	<link rel="icon" href="img/favicon.ico">

    <style>
        .q img {
            padding: 5px 5px;
            max-height: 70px;
            max-width: 70px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="today_order.php">
                <div class="sidebar-brand-icon rotate-n-15">

                    <div class="q">
                        <img src="img\GBP_LOGO_03.png" alt="">
                    </div>


                </div>
                <div class="sidebar-brand-text mx-3">Greening BookPlanet <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Order
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Order Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">?:</h6>-->
                        <a class="collapse-item" href="today_order.php">Today's Orders</a>
                        <!-- <a class="collapse-item" href="pending_order.php">Pending Order</a> -->
                        <a class="collapse-item" href="delivered_order.php">Delivered Order</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Product
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="insert_product.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Insert Product</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="manage_product.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Manage Product</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Request
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="request_list.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Book Request List</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello, <?php echo $_SESSION['seller_name']; ?></span>
                                    <img class="img-profile rounded-circle" src="img/user.png">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="../homepage.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Back to User
                                    </a>
                                    <a class="dropdown-item" href="change_password.php">Change Password</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content  啥都没-->
                <div id="here"></div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; GREEENING BOOKPLANET 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
    <script>
        drawCreateProduct();
    </script>
</body>

</html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>