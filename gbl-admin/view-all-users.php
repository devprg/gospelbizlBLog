

  <div class="col-md-12">
       <table class="table table-responsive table-hover table-bordered">
  <thead class="table ">
    <tr class="bg-info text-light">
      <th scope="col"> User ID</th>
      <th scope="col">Username</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Email</th>
      <th scope="col">User Password</th>
      <th scope="col">USer Role</th>
      <th scope="col">Date</th>
      <th scope="col">Image</th>
      <th scope="col">Admin</th>
      <th scope="col">Subscriber</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  $sql = "SELECT * FROM users ";
  $selec_all_users = mysqli_query($conn, $sql);

  // loop through
  while ($row = mysqli_fetch_assoc($selec_all_users)) {
    # code...
    $user_id = $row["user_id"];
    $user_name = $row["user_name"];
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $user_email = $row["user_email"];
    $user_password = $row["user_password"];
    $user_role = $row["user_role"];
    $user_image = $row["user_image"];
    $user_date = $row["user_date"];

    echo "<tr>";  
    echo "<td> {$user_id} </td>";  
    echo "<td> {$user_name} </td>";  
    echo "<td> {$first_name} </td>";  
    echo "<td> {$last_name} </td>";  
    echo "<td> {$user_email} </td>";  
    echo "<td> {$user_password} </td>"; 
    echo "<td> {$user_role} </td>";  
    echo "<td> {$user_date} </td>";  

    echo "<td> <img class='img-thumbnail' src='../imgs/$user_image'  > </td>"; 

    echo "<td> <a href='users.php?change_to_admin=$user_id'> <span class='badge badge-success '>Admin <i class='far fa-check-circle pl-1'></i></span> </a></td>";

    echo "<td> <a href='users.php?change_to_sub=$user_id'> <span class='badge badge-danger '>Subscriber <i class='fas fa-times pl-1'></i></span> </a></td>";

    echo "<td> <a href='users.php?source=edit_user&edit_user=$user_id'> <span class='badge badge-success '>Edit <i class='fas fa-edit pl-1'></i></span> </a></td>";

    echo "<td> <a href='users.php?delete=$user_id'> <span class='badge badge-danger '>Delete <i class='fas fa-trash-alt pl-1'></i></span> </a></td>";

    echo "</tr>";  

  }
  
  ?>

  </tbody>


      <!-- deleting users -->

      <?php 
      
      if(isset($_GET["delete"])) {

      $delete_user_id = $_GET['delete'];

      $sql = "DELETE FROM users WHERE user_id = {$delete_user_id} ";

      $delete_user_query = mysqli_query($conn, $sql);

      if(!$delete_user_query) {
        die("Query failed " . "\n" . mysqli_error($conn));
      }
      else {

        // redirect this on the current page
        header("Location: users.php");
      }

      }
      
      ?>
      



      <!-- approving admin  -->
      
      <?php 
      
      if(isset($_GET["change_to_admin"])) {

      $the_user_id = $_GET['change_to_admin'];

      $sql = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id} ";

      $change_to_admin_query = mysqli_query($conn, $sql);

        // redirect this on the current page
        header("Location: users.php");

      }
      
      ?>



      <!-- change subscribe -->

      <?php 
      
      if(isset($_GET["change_to_sub"])) {

      $the_user_id = $_GET['change_to_sub'];

      $sql = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id} ";

      $change_to_sub_query = mysqli_query($conn, $sql);

        header("Location: users.php");

      }
      
      ?>
</table>

<!-- ./ column -->
</div>

        </div>
        <!-- /.container-fluid -->

      <!-- </div> -->
      <!-- End of Main Content -->
