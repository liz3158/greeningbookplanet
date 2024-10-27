<?php
session_start();

if (isset($_SESSION['seller_id']) && isset($_SESSION['seller_email'])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GBP Seller Request List</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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

                <div id="here"></div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; GREENING BOOKPLANET 2021</span>
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

</body>

</html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>

<script>
    // alert("test");
$.ajax({
    url: "request_list_show.php",
    data: {

    },
    cache: false,
    type: "POST",



    success: function (response) {
       
        var json = JSON.parse(response);
       
        //console.table(json);
        //console.log(json[0].category_id);
        var html = "";

        var html_table_top="";
        var html_table_mid="";
        var html_table_bot="";

        html_table_top+=                '<!-- Begin Page Content  啥都没-->'+
                '<div class="container-fluid">'+

                    '<!-- DataTales Example -->'+
                    '<div class="card shadow mb-4">'+
                        '<div class="card-header py-3">'+
                            '<h6 class="m-0 font-weight-bold text-primary">'+'Book Request DataTables'+'</h6>'+
                        '</div>'+
                        '<div class="card-body">'+
                            '<div class="table-responsive">'+
                                '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th>'+'NO'+'</th>'+
                                            '<th>'+'Book Name'+'</th>'+
                                            '<th>'+'Book Author'+'</th>'+
                                            '<th>'+'Book Category'+'</th>'+
                                            '<th>'+'Language'+'</th>'+
                                            '<th>'+'Description'+'</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    
                                    '<tbody>';

        var length= json.length-1;
        for(var x =length ;x>=0;x--){
            
            // var category_id= json[x].category_id;
            // var name = json[x].name;
            // var description=json[x].description;
             
             var request_id=json[x].request_id;	
             var book_name=json[x].book_name;	
             var book_author=json[x].book_author;	
             var book_category=json[x].book_category;	
             var book_language=json[x].book_language;	
             var book_description=json[x].book_description; 

            html_table_mid +='<tr>'+
                                            '<td>'+request_id+'</td>'+
                                            '<td>'+book_name+'</td>'+
                                            '<td>'+book_author+'</td>'+
                                            '<td>'+book_category+'</td>'+
                                            '<td>'+book_language+'</td>'+
                                            '<td>'+book_description+'</td>'+
                                        '</tr>';
        }

        html_table_bot+='</tbody>'+
                                '</table>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+

                '</div>'+
                '<!-- /.container-fluid -->'+

            '</div>'+
            '<!-- End of Main Content -->';


        html=  html_table_top +html_table_mid  + html_table_bot;
        $("#here").html(html);
     
        }
    
    ,error:function(response){}
});
</script>
