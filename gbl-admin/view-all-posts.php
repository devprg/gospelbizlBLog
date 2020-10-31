 <!-- Begin Page Content -->
        <div class="container-fluid">

          
          <!-- DataTales -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Posts Table</h6>
            </div>



            <div class="card-body">
              <div class="table-responsive">


                <form action="" method="post"> 

                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                  <div id="bulkOptionsContainer">
                    <select name="" id="" class="form-control">
                      <option value="">Select Option</option>
                      <option value="">Publish</option>
                      <option value="">Draft</option>
                      <option value="">Delete</option>

                    </select>

                  </div>

                  <div class="col-xs-4 py-3">
                    <input type="submit" name="submit" value="Apply" class="btn btn-success">
                    <a class="btn btn-primary" href="posts.php?source=add-post">Add New</a>

                  </div>

                  <thead>
                    <tr class="bg-info text-light">

                      <th> <input type="checkbox" id="selectAllBoxes" ></th>

                      <th>ID</th>
                      <th>Post Category</th>
                      <th>Post Title</th>
                      <th>Author</th>
                      <th>Content</th>
                      <th>Image</th>
                      <th>CDate</th>
                      <th>Views</th>
                      <th>Tags</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>

                   <?php 

            $sql = "SELECT * FROM posts ";
            $select_all_posts = mysqli_query($conn, $sql);

            // loop through
            while ($row = mysqli_fetch_assoc($select_all_posts)) {
              # code...
              $post_id = $row["post_id"];
              $post_category_id = $row["post_category_id"];
              $post_title = $row["post_title"];
              $post_author = $row["post_author"];
              $post_content = substr($row["post_content"],0, 70);
              $post_image = $row["post_image"];
              $post_cdate = $row["post_cdate"];
              $post_view_counts = $row["post_view_counts"];
              $post_tags = $row["post_tags"];

            ?>
             <?php 
                
       



            $sql = "SELECT * FROM categories WHERE cat_id =  $post_category_id ";
            $selec_all_category = mysqli_query($conn, $sql);

            // loop through
            while ($row = mysqli_fetch_assoc($selec_all_category)) {
              # code...
              $cat_id = $row["cat_id"];
              $cat_title = $row["cat_title"];

              echo  "<tr>";

              echo "<td> <input class='checkBoxes' name='checkBoxArray[]' id='selectAllBoxes' type='checkbox' value='$post_id'> </td>"; 

              echo "<td> {$post_id} </td>"; 

              echo "<td> {$cat_title} </td>"; 
              echo "<td> {$cat_title} </td>"; 

              echo "<td> {$post_author} </td>";  
              echo "<td> {$post_content} </td>";  
              echo "<td> <img class='img-thumbnail' src='../imgs/$post_image'  > </td>"; 

              echo "<td> {$post_cdate} </td>";  
              echo "<td> {$post_view_counts} </td>";  
              echo "<td> {$post_tags} </td>"; 

          echo "<td> <a href='posts.php?source=edit-posts&p_id=$post_id'> <span class='badge badge-success '>Edit <i class='fas fa-edit pl-1'></i></span> </a></td>";

            echo "<td> <a href='posts.php?delete={$post_id}'> <span class='badge badge-danger '>Delete <i class='fas fa-trash-alt pl-1'></i></span> </a></td>";

            echo "</tr>";

            }

           ?> 

            <?php   }   ?> 
                   
            </tfoot>


                  <!-- delete category -->

                  <?php
                        
                  if(isset($_GET["delete"])) {
                    echo "HIOEANLDS";
                  }   
                        
                  ?>
                 
                </table>


                <!-- ./form -->
                 </form>

              </div>
            </div>

         

        </div>
        <!-- /.container-fluid -->