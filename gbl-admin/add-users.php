

<div class="col-sm-4">


  <?php
  
  if(isset($_POST["create_user"])) {
    
    $user_id = $_POST["user_id"];
    $user_name = $_POST["user_name"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user_password = $_POST["user_password"];

    $user_image = $_FILES["user_image"]["name"];
    $user_image_temp = $_FILES["user_image"]["tmp_name"];

    $user_email = $_POST["user_email"];
    $user_date = date("m-d-y");
    $user_role = $_POST["user_role"];


   move_uploaded_file($user_image_temp, "../imgs/$user_image");


    $sql = "INSERT INTO users (user_name, first_name, last_name, user_image,
    user_password, user_email, user_role, user_date )";

    $sql .= "VALUES ('{$user_name}', '{$first_name}', '{$last_name}', '{$user_image}',
    '{$user_password}', '{$user_email}', '{$user_role}', now() ) ";

    $create_user_query = mysqli_query($conn, $sql);
    if(!$create_user_query) {
      die("Query failed " . mysqli_error($conn));
    }
    else {
        echo  "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Hey! </strong> You have succesfully added one user. <a href='users.php> {$user_name}</a>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      
    }

  }
  
  
  ?>

  <form action="" method="post" enctype="multipart/form-data">

      <div class="form-group">

      <select name="user_role" id="" > 

    <option value="subscriber"> <?php echo $user_role; ?> </option>

      <?php

      if($user_role == 'admin') {

        echo "<option value='subscriber'> Subscriber </option>";

      } else {

      echo "<option value='admin'> Admin </option>";
      }

      ?>
  
      </select>
      </div>

  <div class="form-group">
    <label for="user_name"> Username</label>
    <input type="text" name="user_name" class="form-control" placeholder="Enter user name">
  </div>

  <div class="form-group">
    <label for="first_name"> First Name</label>
    <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
  </div>

  
  <div class="form-group">
    <label for="last_name"> Last Name</label>
    <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
  </div>
 
    <div class="form-group">
    <label for="user_email">Email </label>
    <input type="email" name="user_email" class="form-control" placeholder="Enter email">
  </div>

   <div class="form-group">
    <label for="user_password"> password</label>
    <input type="text" id="hidden" name="user_password" class="form-control" placeholder="Enter password">
  </div>
  <div class="form-group">
    <label for="user_image">Image </label>
    <input type="file"  id="banner_image" name="user_image" class="form-control" >
  </div>

  <div class="form-group">
    <label for="user_date"> date</label>
    <input type="date" id="hidden" name="user_date" class="form-control" >
  </div>

  <div class="form-group">
    <input type="submit" name="create_user" class="btn btn-info" value="Create User">
  </div>

</form>

</div>



