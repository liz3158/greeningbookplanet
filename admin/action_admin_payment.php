<?php
session_start();
include_once 'config.php';$hostname = "http://localhost/GBP";
function bookprice($book_id){
  global $conn;
  
  $sqls = "SELECT * FROM book WHERE book_id = ".$book_id;
  $results = mysqli_query($conn,$sqls);
  
  while($y=mysqli_fetch_assoc($results)){
     return $y["book_price"];
  }
}
if(isset($_POST["submit"])){
  $order_id = $_POST["order_id"];
  $seller_id = $_POST["seller_id"];
  $newtempreceiptname = $_FILES["receipt"]["name"].rand(1000,9999999).".pdf";
  $receipt_path = "/receipts/". $newtempreceiptname;
  if (move_uploaded_file($_FILES['receipt']['tmp_name'], __DIR__.$receipt_path)) {
    // success
    $sqls = "UPDATE orders SET admin_bank_in_status = 'paid',admin_bank_in_receipt = 'admin".$receipt_path."' WHERE seller_id = '".$seller_id."' AND order_id = '".$order_id."' ;";

    $results = mysqli_query($conn,$sqls);
    echo "<script>location.href = 'admin_payment.php';</script>";
    
} else {
   // fail
   echo "<script>alert('something wrong has happen !');</script>";
}
 
}

?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GBP Admin Seller</title>

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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_user.php">
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
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
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

        <!-- Begin Page Content  啥都没-->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="row">

            <div class="col-lg-12">

              <!-- Default Card Example -->
              <div class="card mb-4">
                <div class="card-header">
                  Payment
                </div>
                <div class="card-body">
                  <div class="ps-section__header pt-0">

                    <?php
                      $order_id = $_GET['order_id'];
                      $sqls = "SELECT * FROM orders WHERE order_id = ".$_GET["order_id"];
                      $results = mysqli_query($conn,$sqls);
                      $seller_id = "";
                      $price = "";
                      $shippingPrice="";
                      $totalPrice="";

                      while($y=mysqli_fetch_assoc($results)){
                        $seller_id = $y["seller_id"];
                        $price = bookprice($y["book_id"]);
                        $shippingPrice= $y["shippingPrice"];
                        $totalPrice=$price+$shippingPrice;
                      }
                      
                      
                      $sqls = "SELECT * FROM seller WHERE seller_id = ".$seller_id;
                      $results = mysqli_query($conn,$sqls);        
                      while($y=mysqli_fetch_assoc($results)){
                        echo '
                        <form class="ps-contact__form" action="action_admin_payment.php?order_id='.$order_id.'" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Seller Id <sub>*</sub></label>
                        <input class="form-control" type="text" placeholder="" value="'.$y["seller_id"].'" name="seller_id" readonly>
                      </div>
                      <div class="form-group">
                        <label>Order ID <sub>*</sub></label>
                        <input class="form-control" type="text" placeholder=""  value="'.$_GET["order_id"].'" name="order_id" readonly>
                      </div>
                      <div class="form-group">
                        <label>Email <sub>*</sub></label>
                        <input class="form-control" type="text" placeholder="" value="'.$y["seller_email"].'" name="seller_email" readonly>
                      </div>
                   
                      <div class="form-group">
                        <label>Beneficiary Bank <sub>*</sub></label>
                        <input class="form-control" type="text" placeholder="" value="'.$y["seller_bank_name"].'" name="seller_bank_name" readonly>
                      </div>
                      <div class="form-group">
                        <label>Beneficiary Account No *<sub>*</sub></label>
                        <input class="form-control" type="text" placeholder=""  value="'.$y["seller_bank_acc"].'" name="seller_bank_acc" readonly>
                      </div>
                      <div class="form-group">
                      <label>Product Price <sub>*</sub></label>
                      <input class="form-control" type="text" placeholder="" value="RM '.$price.'" name="price" readonly>
                      </div>
                      <div class="form-group">
                        <label>Shipping Price <sub>*</sub></label>
                        <input class="form-control" type="text" placeholder="" value="RM '.$shippingPrice.'" name="price" readonly>
                      </div>
                      
                      <div class="form-group">
                      <label>Transfer Total <sub>*</sub></label>
                      <input class="form-control" type="text" placeholder="" value="RM '.$totalPrice.'" name="price" readonly>
                      </div>
                      <p>-For beneficiary information, please refer to the above information.<br>
                        -Please confirm that the information is entered correctly before completing the transfer.<br>
                        -Please upload the receipt after completing the transfer.
                      </p>
                      <a href="https://www.pbebank.com/" target="_blank">*Click to transfer to the
                        beneficiary*</a><br><br>
                      <div class="form-group">
                        <label>Receipt<sub>*</sub></label>
                        <input class="form-control" type="file" placeholder="" name="receipt">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success" value="Update/Save">
                      </div>
                    </form>
                        
                        
                        ';
                      }
                        
                    ?>
                  </div>
                </div>
              </div>

            </div>

          </div>


        </div>
        <!-- /.container-fluid -->

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