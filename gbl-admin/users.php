<?php include "../includes/config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin - Users </title>
   <link rel="icon" href="../favicon.png" sizes="16x16 32x32" type="image/png"> 


  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/admin-style.css" rel="stylesheet"> 

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <!-- sidebar  -->
   <?php include "admin-includes/admin-sidebar.php"; ?>

   <!-- ./ sidebar -->



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->




          <!-- admin header -->
        <?php include "admin-includes/top-nav.php" ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="row">

        <?php 
        
        if(isset($_GET["source"])) {

        $source = $_GET["source"];

        } else {

            $source = "";
        }
        switch($source) {

            case "add-user":
            include "add-users.php";
            break;


            case "edit_user":
              include "edit-users.php";
              break;

            default:
            include "view-all-users.php";
            break;

        }
        
        ?>


        <!-- ./row -->

        </div>


        </div>
        <!-- /.container-fluid -->

     
      


      <!-- footer -->
  <?php include "admin-includes/admin-footer.php"; ?>
    <!-- ./footer -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- ./ admin footer -->
  <?php include "admin-includes/admin-external-links.php"; ?>

</body>

</html>
