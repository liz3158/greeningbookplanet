<?php
include_once 'config.php';

// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(-1);

$category_id = $_GET['category_id'];
$result = mysqli_query($conn, "SELECT * FROM category WHERE category_id='$category_id'");
$data = mysqli_fetch_array($result);
$category_name = $data['category_name'];
$category_description = $data['category_description'];




?>

<!DOCTYPE html>
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
                  Category Modify
                </div>
                <div class="card-body">
                  <div class="ps-section__header pt-0">


                    <form class="ps-contact__form" action="update_c.php" method="post">
                      <div class="form-group">
                        <label>Category<sub style="color: red;">*</sub></label>
                        <input class="form-control" type="text" id="category_name" name="category_name" value="<?php echo $category_name; ?>"></input>
                      </div>
                      <div class="form-group">
                        <label>Description<sub style="color: red;">*</sub></label>
                        <textarea class="form-control" rows="6" id="category_description" name="category_description" ><?php echo $category_description?></textarea>
                      </div>
                      <input type="hidden" value="<?php echo $category_id?>" name="category_id"></input>

                      <div class="form-group">

                        <button class="btn btn-success btn-icon-split" type="submit">
                          <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                          </span>
                          <span class="text"  name="update" id="update">Save</span>
                        </button>
                        <a href="delete_c.php?category_id=<?php echo $category_id ?>" class="btn btn-danger btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                          </span>
                          <span class="text" name="delete" id="delete">Delete</span>
                        </a>
                      </div>
                    </form>
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

