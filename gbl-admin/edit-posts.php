
  <div class="col-sm-4">

  <!-- add posts -->

  <?php
    
    if(isset($_GET["p_id"])) {

      $edit_post_id = $_GET["p_id"];

    }

    
    $sql = "SELECT * FROM posts WHERE post_id = {$edit_post_id} ";

    $select_all_post = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($select_all_post)) {

      $post_id = $row["post_id"];
      $post_title = $row["post_title"];
      $post_content = $row["post_content"];
      $post_author = $row["post_author"];
      $post_image = $row["post_image"];
      $post_cdate = $row["post_cdate"];
      $post_tags = $row["post_tags"];
      $post_status = $row["post_status"];
      $post_meta_desc = $row["post_meta_desc"];
      $post_audio = $row["post_audio"];
      $post_fileSize = $row["post_fileSize"];
      $post_url = $row["post_url"];
      $post_comment_counts = $row["post_comment_counts"];
      $post_view_counts = $row["post_view_counts"];

  } 

  if(isset($_POST["update_post"])) {

    $post_category_id = $_POST["post_category"];
    $post_author = $_POST["post_author"];
    $post_title = $_POST["post_title"];
    $post_content = $_POST["post_content"];

    $post_image = $_FILES["post_image"]["name"];
    $post_image_tmp = $_FILES["post_image"]["tmp_name"];

    $post_cdate = date("m-d-y");

    $post_tags = $_POST["post_tags"];
    $post_status = $_POST["post_status"];
    $post_meta_desc = $_POST["post_meta_desc"];

    $post_audio = $_FILES["post_audio"]["name"];
    $post_audio_size = $_FILES["post_audio"]["size"];
    $post_audio_type = $_FILES["post_audio"]["type"];
    $post_audio_tmp = $_FILES["post_audio"]["tmp_name"];

    $post_fileSize = $_POST["post_fileSize"];
    $post_url = $_POST["post_url"];
    // $post_comment_counts = $_POST["post_comment_counts"];
    // $post_view_counts = $_POST["post_view_counts"];


    // move files to desire destination 
    move_uploaded_file($post_image_tmp, "../imgs/$post_image");

    // move audio file to the desire destination || dir
    move_uploaded_file($post_audio_tmp, "../audios/$post_audio");

    if(empty($post_image)) {

      $select_image = mysqli_query($conn, $sql);
    
         while($row = mysqli_fetch_assoc($select_image)) {
                $post_image = $row["post_image"];

        }
      }


// end 

    
      if(empty($post_audio)) {

        $select_audio = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_assoc($select_audio)) {
                  $post_audio = $row["post_audio"];

          }
        }

// end 


          // update query

          $sql = "UPDATE posts SET ";
          $sql .= "post_category_id = '{$post_category_id}', ";
          $sql .= "post_author = '{$post_author}', ";
          $sql .= "post_title = '{$post_title}', ";
          $sql .= "post_content = '{$post_content}', ";
          $sql .= "post_image = '{$post_image}', ";
          $sql .= "post_audio = '{$post_audio}', ";
          $sql .= "post_cdate = now(), ";
          $sql .= "post_tags = '{$post_tags}', ";
          $sql .= "post_status = '{$post_status}', ";
          // $sql .= "post_veiw_counts = '{$post_veiw_counts}', ";
          // $sql .= "post_comment_counts = '{$post_comment_counts}', ";
          $sql .= "post_meta_desc = '{$post_meta_desc}', ";
          $sql .= "post_fileSize = '{$post_fileSize}' ";
          $sql .= "WHERE post_id = {$edit_post_id} ";

          $update_post_query = mysqli_query($conn, $sql);

          if(!$update_post_query) {
            die("Query failed" . mysqli_error($conn));
          }

          else {
            echo  "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Hey! </strong> You have succesfully updated one post. <a href='/post/$post_id'>$post_title</a>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
          
          }

  }
  // <a href='../post.php?post_id=$post_id'>$post_title</a>
  
  ?>



	<form method="post" action="" enctype="multipart/form-data">

	 <div class="form-group">
    <label for="category">Catogeories </label>
	<br>

    <select name="post_category" >
   <option id="option" value="<?php echo $cat_title ?>" > -- Please Select Category -- </option>
    	  
    	  <?php 

            $sql = "SELECT * FROM categories ";
            $selec_all_category = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($selec_all_category)) {
              $cat_id = $row["cat_id"];
              $cat_title = $row["cat_title"];

         echo "<option value='$cat_id' id='category'> {$cat_title} </option>";

             ?> 

          	<?php  }

            ?> 

    </select>
  </div>


  <div class="form-group">
    <label for="post_author">Author </label>
    <input type="text" name="post_author" class="form-control" placeholder="Enter author" value="<?php echo $post_author ?> ">
  </div>
 
  <div class="form-group"> 
    <label for="post_title">Title </label>
    <input type="text" name="post_title" class="form-control" placeholder="Enter title" value="<?php echo $post_title ?>">
  </div>

  <div class="form-group">
    <label for="post_content">Content </label>
    <textarea type="text" name="post_content" class="form-control" id="body" cols="30" rows="10" >
    <?php echo $post_content ?> </textarea>
  </div>

    <div class="form-group">
    <label for="post_image">Image </label>
    <img class='img-thumbnail' src="../imgs/<?php echo $post_image ?>" alt="">
    <input type="file" id="banner_image" name="post_image" class="form-control" placeholder="Enter image" >
  </div>

    <div class="form-group">
    <label for="post_tags">Tags </label>
    <input type="text" name="post_tags" class="form-control" placeholder="Enter tags" value="<?php echo $post_tags ?> ">
  </div>

   <div class="form-group">
    <label for="post_status"> Status</label>
    <input type="text" id="hidden" name="post_status" class="form-control" placeholder="Enter status" value="<?php echo $post_status ?> ">
  </div>

   <div class="form-group">
    <label for="post_view_counts">Views</label>
    <input type="text" name="post_view_counts" class="form-control" placeholder="Enter views" value="<?php echo $post_view_counts ?> ">
  </div>

  <!--  <div class="form-group">
    <label for="post_comment_counts"> Comments</label>
    <input type="text" name="post_comment_counts" class="form-control" placeholder="Enter comments" value="<?php #echo $post_title ?>>
  </div> -->

    <div class="form-group">
    <label for="post_fileSize">File Size </label>
    <input type="text" name="post_fileSize" class="form-control" placeholder="Enter file size" value="<?php echo $post_fileSize ?> ">
  </div>

  <div class="form-group">
    <label for="post_audio">Audio </label> <br>
   <audio controls="" src="../audios/<?php echo $post_audio ?> "></audio>
    <input type="file" id="banner_image" name="post_audio" class="form-control"   >
  </div>

  <div class="form-group">
    <label for="post_url">URL </label>
    <input type="url" name="post_url" class="form-control" placeholder="Enter URL" value="<?php echo $post_url ?>" >
  </div>

  <div class="form-group">
    <label for="post_meta_desc">Meta Description </label>
    <textarea type="text" name="post_meta_desc" class="form-control" id="editor" cols="30" rows="10">
    <?php echo $post_meta_desc ?>
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="update_post" class="btn btn-info" value="Update Post">
  </div>



</form>

</div>


