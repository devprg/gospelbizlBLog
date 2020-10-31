

  <div class="col-sm-4">

  <!-- add posts -->


  <?php 

    if(isset($_GET["edit_user"])) {

    $edit_user_id = $_GET["edit_user"];

}

    // read the result / get the result from the database 

    $sql = "SELECT * FROM users WHERE user_id = {$edit_user_id} ";
    $select_all_user = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($select_all_user)) {

    // $post_category_id = $row["post_category"];

    $user_id = $row["user_id"];
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $user_password = $row["user_password"];
    $user_email = $row["user_email"];
    $user_image = $row["user_image"];
    
    $user_date = date("m-d-y");
    $user_role = $row["user_role"];
    

    // update query 
    if(isset($_POST["update_user"])) {

        // $post_category_id = $_POST["post_category_id"];
        $user_id = $_POST["user_id"];
        $first_name = $_POST["first_name"];
        $user_password = $_POST["user_password"];
        $user_email = $_POST["user_email"];
        $user_date = $_POST["user_date"];

        $user_image = $_POST["user_image"]["name"];
        $user_image_temp = $_POST["user_image"]["tmp_name"];


        move_uploaded_file($user_image_temp, "../imgs/$user_image");

        if(empty($user_image)) {
        
        $sql = "SELECT * FROM users WHERE user_id {$edit_user_id} ";
        $select_image_user = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($select_image_user)) {
            $user_image = $row["user_image"];
        }
    }


        // update query
        $sql = "UPDATE users SET ";
        $sql .= "first_name = '{$first_name}', ";
        $sql .= "last_name = '{$last_name}', ";
        $sql .= "user_password = '{$user_password}', ";
        $sql .= "user_date = now(), ";
        $sql .= "user_email = '{$user_email}', ";
        $sql .= "user_role = '{$user_role}', ";

        $sql .= "WHERE user_id = {$edit_user_id} ";

        $update_query = mysqli_query($conn, $sql);

        if(!$update_query) {
            die("Query failed " . mysqli_error($conn));
        }

        else {
            echo "<h1> You have succefully updated user </h1>";
        }

    }
    
    }

   ?>
	
	<form method="post" action="" enctype="multipart/form-data">

	 <div class="form-group">
    <label for="user">User Role</label>
	<br>

    <select name="post_category" value="<?php #echo $cat_title ?>">
   <option value="" id="option"> -- Please choose an option -- </option>
    	  
    	  <?php 

            $sql = "SELECT * FROM users ";
            $selec_all_users = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($selec_all_users)) {
              $user_id = $row["user_id"];
              $user_author = $row["user_author"];
              $first_name = $row["first_name"];
              $last_name = $row["last_name"];
              $user_password = $row["user_password"];
              $user_email = $row["user_email"];

              $user_date = $row["user_date"];
              $user_image = $row["user_image"];
              $user_role = $row["user_role"];


         echo "<option value='$user_id' id='category'> {$user_role} </option>";

             ?> 

          	<?php  }

            ?> 

    </select>
  </div>


 
  <div class="form-group"> 
    <label for="first_name">First Name </label>
    <input type="text" name="first_name" class="form-control" placeholder="Enter first name" value="<?php echo $first_name ?>">
  </div>

  <div class="form-group"> 
    <label for="last_name">Last Name </label>
    <input type="text" name="last_name" class="form-control" placeholder="Enter last name" value="<?php echo $last_name ?>">
  </div>

    <div class="form-group">
    <label for="user_image">Image </label>
    <img class='img-thumbnail' src="../imgs/<?php echo $user_image ?>" alt="">
    <input type="file" id="banner_image" name="user_image" class="form-control" >
  </div>

    <div class="form-group">
    <label for="user_email">Email </label>
    <input type="email" name="user_email" class="form-control" placeholder="Enter email" value="<?php echo $user_email ?> ">
  </div>

   <div class="form-group">
    <label for="user_password"> Password</label>
    <input type="text" id="hidden" name="user_password" class="form-control" placeholder="Enter user password" value="<?php echo $user_password ?> ">
  </div>

    <div class="form-group">
    <label for="user_role">Role</label>
    <input type="text" name="user_role" class="form-control" placeholder="Enter user role" value="<?php echo $user_role ?> ">
  </div>

  <div class="form-group">
    <label for="user_date"> Date</label>
    <input type="date" name="user_date" class="form-control" value="<?php echo $user_date ?> ">
  </div>

  <div class="form-group">
    <input type="submit" name="edit-user" class="btn btn-info" value="Update User">
  </div>



</form>

</div>
