

  <div class="col-sm-4">

  <!-- add posts -->

  <?php 

  if (isset($_POST['add-post'])) {
    # code...
    $post_category_id = $_POST["post_category"];

    $post_author = $_POST["post_author"];
    $post_title = $_POST["post_title"];
    $post_content = $_POST["post_content"];

    $post_image = $_FILES["post_image"]["name"];
    $post_image_temp = $_FILES["post_image"]["tmp_name"];

    $post_audio = $_FILES["post_audio"]["name"];
    $post_audio_type = $_FILES["post_audio"]["type"];
    $post_audio_size = $_FILES["post_audio"]["size"];
    $post_audio_temp = $_FILES["post_audio"]["tmp_name"];


    $post_url = $_POST["post_url"];
    $post_cdate = date("m-d-y");
    $post_status = $_POST["post_status"];
    $post_tags = $_POST["post_tags"];
    $post_meta_desc = $_POST["post_meta_desc"];
    // $post_comment_counts = 4;
    $post_view_counts = $_POST["post_view_counts"];
    $post_fileSize = $_POST["post_fileSize"];

    move_uploaded_file($post_audio_temp, "../audios/$post_audio");

    move_uploaded_file($post_image_temp, "../imgs/$post_image");


    $sql = "INSERT INTO posts (post_category_id, post_author, post_title, post_content,
     post_image, post_cdate, post_status, post_audio, post_view_counts, post_url, post_fileSize,
      post_tags, post_meta_desc) ";

    // concatentation of query string
    $sql .= "VALUES ({$post_category_id}, '{$post_author}', '{$post_title}', '{$post_content}',
     '{$post_image}', now(), '{$post_status}', '{$post_audio}', '{$post_view_counts}', '{$post_url}',
      '{$post_fileSize}', '{$post_tags}', '{$post_meta_desc}' ) ";

    $create_posts = mysqli_query($conn, $sql);

     if (!$create_posts) {
       die("<span class='badge badge-warning mb-4'> Query failed adding post </span>" . mysqli_error($conn));
     }
     else {
       echo "<span class='badge badge-info mb-4'> You have successfully added one post. </span>";
     }

  }

   ?>
	
	<form method="post" action="" enctype="multipart/form-data">

	 <div class="form-group">
    <label for="category">Catogeories </label>
	<br>

    <select name="post_category" >
   <option value="" id="option"> -- Please choose an option -- </option>
    	  
    	  <?php 

            $sql = "SELECT * FROM categories ";
            $selec_all_category = mysqli_query($conn, $sql);

            // loop through
            while ($row = mysqli_fetch_assoc($selec_all_category)) {
              # code...
              $cat_id = $row["cat_id"];
              $cat_title = $row["cat_title"];

        echo "<option value='$cat_id' id='category'> {$cat_title} </option>";

             ?> 

          	<?php   }

            ?> 

    </select>
  </div>


  <div class="form-group">
    <label for="post_author">Author </label>
    <input type="text" name="post_author" class="form-control" placeholder="Enter author">
  </div>
 
  <div class="form-group"> 
    <label for="post_title">Title </label>
    <input type="text" name="post_title" class="form-control" placeholder="Enter title">
  </div>

  <div class="form-group">
    <label for="post_content">Content </label>
    <textarea type="text" name="post_content" class="form-control" id="body" cols="30" rows="10"></textarea>
  </div>

    <div class="form-group">
    <label for="post_image">Image </label>
    <input type="file" id="banner_image" name="post_image" class="form-control" placeholder="Enter image">
  </div>

    <div class="form-group">
    <label for="post_tags">Tags </label>
    <input type="text" name="post_tags" class="form-control" placeholder="Enter tags">
  </div>

   <div class="form-group">
    <label for="post_status"> Status</label>
    <input type="text" id="hidden" name="post_status" class="form-control" placeholder="Enter status">
  </div>

   <div class="form-group">
    <label for="post_view_counts">Views</label>
    <input type="text" name="post_view_counts" class="form-control" placeholder="Enter views">
  </div>

  <!--  <div class="form-group">
    <label for="post_comment_counts"> Comments</label>
    <input type="text" name="post_comment_counts" class="form-control" placeholder="Enter comments">
  </div> -->

    <div class="form-group">
    <label for="post_fileSize">File Size </label>
    <input type="text" name="post_fileSize" class="form-control" placeholder="Enter file size">
  </div>

  <div class="form-group">
    <label for="post_audio">Audio </label>
    <input type="file"  id="banner_image" name="post_audio" class="form-control" placeholder="Enter audio">
  </div>

  <div class="form-group">
    <label for="post_url">URL </label>
    <input type="text" name="post_url" class="form-control" placeholder="Enter URL">
  </div>

  <div class="form-group">
    <label for="post_meta_desc">Meta Description </label>
    <textarea type="text" name="post_meta_desc" class="form-control" id="editor" cols="30" rows="10"></textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="add-post" class="btn btn-info" value="Publish Post">
  </div>



</form>

</div>

