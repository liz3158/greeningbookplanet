<?php
include ("config.php");

        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

//表格提交信息，获取图片文件 
if(isset($_POST['submit'])){
    
   //表格填写的全部数据 
   $subcategory_id='';
   $category_id=  $_REQUEST['category_id'];
   $subcategory=$_REQUEST['subcategory'];
  
  
         
   
   // Performing insert query execution
   // here our table name is college
   //数据库指令（添加）
   $sql = "INSERT INTO subcategory  VALUES (
       '$subcategory_id'
       ,'$category_id'
       ,'$subcategory'
       )";

        //执行SQL命令（添加数据）  
        if(mysqli_query($conn, $sql)){
            
            echo "<script>alert('Congratulations!" 
                . " Subcategory data stored successfully.');
                location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
        
        } else{
            //echo "<script>alert('ERROR: Hush! Sorry $sql. mysqli_error($conn);');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
    }
        // Close connection
        mysqli_close($conn);
?>
<script>
    
function drawCreateSubCategory(){
    $.ajax({
    url: "create_s_c.php",
    data: {
        option:"readcategory"
    },
    cache: false,
    type: "POST",



    success: function (response) {
    
        var json = JSON.parse(response);
    
        console.table(json);
        console.log(json[0].category_id);
        var html = "";
        var html_form_top="";
        var html_form_mid="";
        var html_form_bot="";

        var html_table_top="";
        var html_table_mid="";
        var html_table_bot="";

        html_form_top+=    '<!-- Begin Page Content  啥都没-->'+
                        '<!-- Begin Page Content -->'+
                        '<div class="container-fluid">'+

                            '<!-- Page Heading -->'+
                            

                            '<div class="row">'+
                                '<div class="col-lg-12">'+
                                    '<!-- Default Card Example -->'+
                                    '<div class="card mb-4">'+
                                        '<div class="card-header">'+
                                            'Create Sub Category'+
                                        '</div>'+
                                        '<div class="card-body">'+
                                            '<div class="ps-section__header pt-0">'+  
                                                '<form class="ps-contact__form" action="create_sub_category.php" method="post" enctype="multipart/form-data">'+
                                                '<div class="form-group">'+
                                                    '<label>'+'Category Name '+ '<sub style="color: red;" >'+'*'+'</sub>'+'</label>'+
                                                    
                                                    '<select class="form-control" name="category_id" id="">';
        
                        
                        
        html_form_bot+= '</select></div>'+
                                                '<div class="form-group">'+
                                                    '<label>'+'Sub Category Name '+ '<sub style="color: red;" >'+'*'+'</sub>'+'</label>'+
                                                    '<input class="form-control" type="" placeholder="" name="subcategory">'+
                                                '</div>'+
                                                '<div class="form-group">'+
                                                    '<button class="ps-btn"  name="submit" value="submit">'+'Create'+'<i class="ps-icon-next">'+'</i>'+'</button>'+
                                                '</div>'+
                                                '</form>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'; 

        for(var x = 0;x<json.length;x++){
            
            var category_id= json[x].category_id;
            var category_name = json[x].category_name;
            html_form_mid += '<option value="'+category_id+'">'+category_name+'</option>';
            
        
            
        }

    

        html= html_form_top +html_form_mid  + html_form_bot ;
        $("#here").html(html);
        
    
        }

    ,error:function(response){}
    });
}
function getcategoryname(id){
    
    $.ajax({
        url: "create_s_c.php",
        data: {
            option:"readcategoryname",
            category_id:id
        },
        cache: false,
        async:false,
        type: "POST",
        success: function (response) {
        //alert(response);
            name = response;
            
        },
        error:function(err){}
    });

}
  var name = "";
function drawtable(){
    var html_table_top='<!-- DataTales Example -->'+
                    '<div class="card shadow mb-4">'+
                        '<div class="card-header py-3">'+
                            '<h6 class="m-0 font-weight-bold text-primary">'+'Subcategory DataTables'+'</h6>'+
                        '</div>'+
                        '<div class="card-body">'+
                            '<div class="table-responsive">'+
                                '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th>'+'No'+'</th>'+                                        
                                            '<th>'+'Subcategory'+'</th>'+
                                            '<th>'+'Category'+'</th>'+
                                            '<th>'+'Action'+'</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tfoot>'+
                                        '<tr>'+
                                            '<th>'+'No'+'</th>'+                                        
                                            '<th>'+'Subcategory'+'</th>'+
                                            '<th>'+'Category'+'</th>'+
                                            '<th>'+'Action'+'</th>'+
                                        '</tr>'+
                                    '</tfoot>'+
                                    '<tbody>';
    var html_table_bot='</tbody>'+
                                '</table>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<!-- /.container-fluid -->';
  var midtable = "";
    $.ajax({
        url: "create_s_c.php",
        data: {
            option:"readsubcategory"
        },
        cache: false,
        type: "POST",
        async:false,

        success: function (response) {
        
            var json = JSON.parse(response);
            /// subcategory_id,subcategory,name,"","",""
            // no,subcategory,category,"","",""
        for(var x = 0;x<json.length;x++){
            
            getcategoryname(json[x].category_id);
          //  alert("he"+categoryname);
            var numbercategory = json[x].subcategory_id;
            var subcategory_name = json[x].subcategory_name;
            var categoryname = name;
            midtable += '<tr>'+
						                    '<td>'+numbercategory+'</td>'+
                                            '<td>'+subcategory_name+'</td>'+
                                            '<td>'+categoryname+'</td>'+
                                            '<td align="center">'+
                                                '<a href="action_subcategory.php?subcategory_id='+numbercategory+'" class="btn btn-secondary btn-icon-split">'+
                                                    '<span class="icon text-white-50">'+
                                                        '<i class="fas fa-arrow-right"></i>'+
                                                    '</span>'+
                                                    '<span class="text">edit</span>'+
                                                '</a>'+
                                            '</td>'+ 
                                        '</tr>';
            }
            var html= html_table_top +midtable  + html_table_bot ;
           $("#here2").html(html);
        
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

    <title>GBP Admin Sub Category</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom styles for this page 表格CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/ps-icon/style.css">
    <!-- CSS Library-->
    
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="plugins/revolution/css/layers.css">
    
    <!-- Custom-->
    <link rel="stylesheet" href="css/style.css">
	
	<!--Favicon-->
	<link rel="icon" href="img/favicon.ico">

    <style>
        .q img{
            padding: 5px 5px;
            max-height:70px;
            max-width:70px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_user.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                    <div class="q">
                        <img src="img\GBP_LOGO_03.png" alt="" >
                      </div>
                    
                    
                </div>
                <div class="sidebar-brand-text mx-3">Greening BookPlanet <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Heading -->
            <div class="sidebar-heading">
               Manage
            </div>

            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="admin_user.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>User Account</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="admin_seller.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Seller Account</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="admin_payment.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Payment</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="create_category.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Create Category</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="create_sub_category.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sub Category</span></a>
            </li>
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../homepage.php">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Back to Homepage
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div id="here"></div>
                <div id="here2"></div>
            </div>
            <!-- End of Main Content -->

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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins 表格JS-->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts 表格JS-->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/functioncategory.js"></script>
    <script>

drawtable();
drawCreateSubCategory();
    </script>

</body>

</html>

