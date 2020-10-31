

  <div class="col-md-12">
       <table class="table table-responsive table-hover table-bordered">
  <thead class="">
    <tr class="bg-info text-light  ">
      <th scope="col"> Comment ID</th>
      <th scope="col"> Post ID </th>
      <th scope="col"> Author </th>
      <th scope="col"> Email</th>
      <th scope="col"> Status </th>
      <th scope="col"> Content</th>
      <th scope="col"> In Response  </th>
      <th scope="col"> Approve</th>
      <th scope="col"> Unapprove </th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  $sql = "SELECT * FROM comments ";
  $select_all_comments = mysqli_query($conn, $sql);

  // loop through
  while ($row = mysqli_fetch_assoc($select_all_comments)) {
    # code...
    $comment_id = $row["comment_id"];
    $comment_post_id = $row["comment_post_id"];
    $comment_author = $row["comment_author"];
    $comment_email = $row["comment_email"];
    $comment_status = $row["comment_status"];
    $comment_content = $row["comment_content"];

    echo "<tr>";  
    echo "<td> {$comment_id} </td>";  
    echo "<td> {$comment_post_id} </td>";  
    echo "<td> {$comment_author} </td>";  
    echo "<td> {$comment_email} </td>";  
    echo "<td> {$comment_status} </td>"; 
    echo "<td> {$comment_content} </td>";  

    $sql = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    $select_all_posts = mysqli_query($conn, $sql); 

      // loop through
  while ($row = mysqli_fetch_assoc($select_all_posts)) {
    # code...
    $post_title = $row["post_title"];
    $post_id = $row["post_id"];

    echo "<td> <a href='../post.php?p_id=$post_id'>$post_title</a>  </td>";  

  }
  echo "<td> <a href='comments.php?approve=$comment_id'> <span class='badge badge-primary '>approve <i class='fas fa-check pl-1'></i></span> </a></td>";

    echo "<td> <a href='comments.php?unapprove=$comment_id'> <span class='badge badge-success '>unapprove <i class='fas fa-times pl-1'></i></span> </a></td>";

    echo "<td> <a href='comments.php?delete=$comment_id'> <span class='badge badge-danger '>Delete <i class='fas fa-trash-alt pl-1'></i></span> </a></td>";

    echo "</tr>"; 

  }
  
  ?>

  </tbody>


        <?php
        if(isset($_GET["delete"])) {

        $delete_comment_id = $_GET["delete"];

        $sql = "DELETE FROM comments WHERE comment_id =  {$delete_comment_id} ";
        $delete_comment_query = mysqli_query($conn, $sql);

        if(!$delete_comment_query) {
          die("Query Failed " . mysqli_error($conn));
        } 
        else {
          header("Location: comments.php");
        }

        }
          ?>



          
       <!-- unapproving comments -->

        <?php
        if(isset($_GET["unapprove"])) {

        $update_comment_id = $_GET["unapprove"];

        $sql = "UPDATE comments SET comment_status =  'unapproved' WHERE comment_id = {$update_comment_id} ";
        $update_comment_query = mysqli_query($conn, $sql);

        if(!$update_comment_query) {
          die("Query Failed " . mysqli_error($conn));
        } 
        else {
          header("Location: comments.php");
        }

        }
          ?>



      <!-- approving comment -->

               
      <?php
        if(isset($_GET["approve"])) {

        $update_comment_id = $_GET["approve"];

        $sql = "UPDATE comments SET comment_status =  'approved' WHERE comment_id = {$update_comment_id} ";
        $update_comment_query = mysqli_query($conn, $sql);

        if(!$update_comment_query) {
          die("Query Failed " . mysqli_error($conn));
        } 
        else {
          header("Location: comments.php");
        }

        }
          ?>




</table>

<!-- ./ column -->
</div>

        </div>
        <!-- /.container-fluid -->

      <!-- </div> -->
      <!-- End of Main Content -->
