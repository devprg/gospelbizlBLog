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

  <title> Admin - Category </title>
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

         



     <div class="row">

     <!-- Categories table -->

        <div class="col-sm-4">

            <?php 

            if (isset($_POST["create_category"])) {

            // escape special character
            $cat_title = mysqli_real_escape_string($conn, $_POST["cat_title"]);
            $cat_date = date("d-m-y");

            if ($cat_title == "" || empty($cat_title)) {
            
            echo "<span class='badge badge-danger mb-4'> Please this field cannot be empty </span>";
            }
            else {

            $sql = "INSERT INTO categories (cat_title, cat_date) ";
            $sql .= "VALUES('{$cat_title}', now()) ";

            $create_category_query = mysqli_query($conn, $sql);

            if (!$create_category_query) {
                
                die("<span class='badge badge-warning mb-4'> Query failed adding category </span" . mysqli_error($conn));
            }

            else {
                echo "<span class='badge badge-info mb-4'> You have successfully added one category <i class='far fa-grin-tongue'></i> </span>";
            }  }  }

            ?>
            
            <!-- form -->
            <form action="" method="post">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <input type="text" name="cat_title" class="form-control" placeholder="Enter Category Title">
            </div>

            </div>

            <div class="input-group mb-3">
            <input type="date" name="cat_date" class="form-control mr-2"  >

            <div class="input-group-append">
            <button type="submit" name="create_category" class="btn btn-info"> <i class="fas fa-plus-circle"></i> Add Category</button>
            </div>
            </div>

            </form>




            
        <!-- form -->
        <form action="" method="post">
        <div class="input-group mb-3">

        <?php
        if(isset($_GET["edit_category"])) {
            $cat_id = $_GET["edit_category"];

           $sql = "SELECT * FROM categories WHERE cat_id = {$cat_id} ";
           $selec_all_category = mysqli_query($conn, $sql);

           while ($row = mysqli_fetch_assoc($selec_all_category)) {
               # code...
               $cat_id = $row["cat_id"];
               $cat_title = $row["cat_title"];

               ?>

    <div class="input-group-prepend">
        <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" name="cat_title" class="form-control" placeholder="Enter Category Title">
        </div>

               <?php  }  }
        
        ?>



    <?php
    if(isset($_POST["update_category"])) {
     $cat_id = $_GET["edit_category"];
     $the_cat_title = $_POST["cat_title"];

    $sql = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";

    $update_category = mysqli_query($conn, $sql);

    if(!$update_category) {
        die("query failed " . mysqli_error($conn));
    }
    else {
        "<h1> You have successfully updated one category</h1>";
    }  }
    
    ?>

        </div>

        <div class="input-group mb-3">
        <div class="input-group-append">
        <button type="submit" name="update_category" class="btn btn-info"> <i class="fas fas-edit"></i> Update Category</button>
        </div>
        </div>

        </form>


            <!-- ./col-sm-4 -->
            </div>








            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories Table </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive table-hover ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="bg-info text-light">
                        <th>Cat ID</th>
                        <th>Cat Title</th>
                        <th>Cat Image </th>
                        <th>Create Date </th>

                        <th>Edit </th>
                        <th>Delete </th>

                    </tr>
                    </thead>

                    <tbody>

            <?php 

            $sql = "SELECT * FROM categories ";
            $selec_all_category = mysqli_query($conn, $sql);

            // loop through
            while ($row = mysqli_fetch_assoc($selec_all_category)) {
                # code...
                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];
                $cat_image = $row["cat_title"];
                $cat_date = $row["cat_date"];

                echo "<tr>";

                echo "<td> {$cat_id} </td>";
                echo "<td> {$cat_title} </td>";
                echo "<td> <img scr=''> </td>";
                echo "<td> {$cat_date} </td>";

                echo "<td> <a href='categories.php?edit_category=$cat_id'> <span class='badge badge-success '>Edit <i class='fas fa-edit pl-1'></i></span> </a></td>";

            echo "<td> <a href='categories.php?delete=$cat_id'> <span class='badge badge-danger '>Delete <i class='fas fa-trash-alt pl-1'></i></span> </a></td>";

                echo "</tr>";

            ?> 

                <?php  }

            ?>

                    </tbody>
                </table>
                </div>
            </div>
            </div>



            <?php 

            if (isset($_GET['delete'])) {

            $delete_cat_id = $_GET["delete"];

            $sql = "DELETE * FROM categories WHERE cat_id = $delete_cat_id ";

            $delete_category = mysqli_query($conn, $sql);

            // redirect on the current page 
            header("Location: categories.php");

            if (!$delete_category) {
                die("<span class='badge badge-info mb-4'> Query failed deleting category <i class='far fa-grin-tongue'></i> </span>" . mysqli_error($conn));

            }

            else {

                echo "<span class='badge badge-info mb-4'> You have successfully added one category <i class='far fa-grin-tongue'></i> </span>";
            }
            }

            ?>

            
            
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
