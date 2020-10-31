<?php include "../includes/config.php"; ?>

<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin - Dashboard </title>
  
   <link rel="icon" href="../favicon.png" sizes="16x16 32x32" type="image/png"> 

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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



          <!-- admin header -->
        <?php include "admin-includes/top-nav.php" ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Hello admin author <small> <?php echo $_SESSION["username"] ?> </small> </h1>
          <p class="p3 mb-3 text-gray-500">Last logged in on <?php echo date("m-y-d"); ?>  </p>


<!-- Card deck -->
<div class="card-deck">

  <!-- Card -->
  <div class="card mb-4">

    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top" src="../imgs/edwin-m-morgan.jpg" alt="Card image cap" height="270px" style="object-fit:cover" >
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title">Edwin M. Morgan </h4>
      <!--Text-->
      <p class="card-text"> Co-Founder Gospelbiz Liberia & Adminstrator.</p>
      <button type="button" class="btn btn-light-blue btn-md">Read more</button>

    </div>

  </div>
  <!-- Card -->

  <!-- Card 
  <div class="card mb-4">

  
    <div class="view overlay">
       <img class="card-img-top" src="../imgs/edward-robertson.jpg"
        alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div> 

    <div class="card-body">

      <h4 class="card-title">Card title</h4>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
        content.</p>
      <button type="button" class="btn btn-light-blue btn-md">Read more</button>

    </div>

  </div>
 -->

  <!-- Card -->
  <div class="card mb-4">

    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top" src="../edward-robertson.jpg" alt="Card image cap" height="270px" style="object-fit:cover">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body">

      <!--Title-->
      <h4 class="card-title">Edward D. Robertson</h4>
      <!--Text-->
      <p class="card-text"> CEO & Developer of Gospelbiz Liberia .</p>
      <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
      <button type="button" class="btn btn-light-blue btn-md">Read more</button>

    </div>

  </div>
  <!-- Card -->

</div>
<!-- Card deck -->


<div class="row">




  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">

  <?php
  $sql = "SELECT * FROM categories ";
  $count_query = mysqli_query($conn, $sql);

  $count = mysqli_num_rows($count_query);
  
  ?>

    <div class="card border-left-primary shadow h-100 py-2 ">
      <div class="card-body bg-info">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Categories</div>
            <div class="h5 mb-0 font-weight-bold text-white-800" style="color: white"> <?php echo $count ?> </div>
            <a href="categories.php" style="color: white">View all categories </a>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-3x text-gray-800 py-2"></i>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Annual) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
  
  <?php
  $sql = "SELECT * FROM posts ";
  $count_query = mysqli_query($conn, $sql);

  $count = mysqli_num_rows($count_query);
  
  ?>

    <div class="card border-left-success shadow h-100 py-2 bg-danger">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Posts</div>
            <div class="h5 mb-0 font-weight-bold text-white-800" style="color: white"><?php echo $count ?> </div>
            <a href="posts.php" style="color: white">View all posts</a>
          </div>
          <div class="col-auto">
            <i class="fas fa-paste fa-3x text-gray-800 py-2"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tasks Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
  
  <?php
  $sql = "SELECT * FROM comments ";
  $count_comment_query = mysqli_query($conn, $sql);

  $count = mysqli_num_rows($count_comment_query);
  
  ?>
    <div class="card border-left-info shadow h-100 py-2 bg-success">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Comments </div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 py-2"> <?php echo $count ?> </div>
                <a href="">View all Comments</a>

              </div>
              <div class="col">
              </div>
            </div>
          </div>
          <div class="col-auto">
          <i class="fas fa-comments fa-3x text-gray-800"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">

  <?php
  $sql = "SELECT * FROM users ";
  $count_user_query = mysqli_query($conn, $sql);

  $count = mysqli_num_rows($count_user_query);
  
  ?>

    <div class="card border-left-warning shadow h-100 py-2 bg-warning">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Admins</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $count ?> </div>
            <a href="#">view all admins</a>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-edit fa-3x text-gray-800 py-2"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      


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
