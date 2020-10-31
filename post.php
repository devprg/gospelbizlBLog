<!-- include the header -->
<?php include "includes/header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         <?php 

          if(isset($_GET["p_id"])) {

          $the_post_id = $_GET["p_id"];
            

          $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";

          $select_post_query = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($select_post_query)) {

            $post_id = $row["post_id"];
            $post_title = $row["post_title"];
            $post_meta_desc = $row["post_meta_desc"];
            $post_image = $row["post_image"];
            $post_tags = $row["post_tags"];

          ?>

          <!-- meta tag for google search engine -->
        <title> <?php echo htmlentities($post_title) ?> </title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!">

        <!-- open graph for facebook -->
        <meta property="og:image:width" content="1280" />
        <meta property="og:image:height" content="1280" />
        <meta property="og:locale" content="en-US" />
        <meta property="og:url" content=""/>
        <meta property="og:type" content="Article" />
        <meta property="og:title" content=" Download &#x2B50; Music Mp3: - <?php echo htmlentities($post_title) ?> - gospelbizliberia"/>
        <meta property="og:description" content="<?php echo htmlentities($post_meta_desc) ?>" />
        <meta property="og:image" content="https://gospelbizliberia.com/imgs/<?php echo $post_image ?>" />
        <meta property="article:tag" content="<?php echo htmlentities($post_tags) ?>" />
        <meta property="article:section" content="Music" />

        <!-- twitter cards -->
        <meta name="twitter:card" content="“summary">
        <meta name="twitter:site" contents="@gospelbizliberia" />
        <meta name="twitter:creator" contents="@gospelbizliberia" />
        <meta property="twitter:url" content=""/>
        <meta property="twitter:title" content="Download Music Mp3: - <?php echo htmlentities($post_title) ?> - gospelbizliberia" />
        <meta property="twitter:description" content="<?php echo htmlentities($post_meta_desc) ?>."/>
        <meta property="twitter:image" content="https://gospelbizliberia.com/imgs/<?php echo $post_image ?>" />

    

        <?php } }

        ?>

    <link rel="icon" href="/favicon.png" sizes="16x16 32x32" type="image/png"> 

    <link rel="icon" href="/apple-touch-icon.png" sizes="16x16 32x32" type="image/png"> 


   <!-- Bootstrap core CSS -->
  <link href="/css/navbar.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="/css/blog-home.css" rel="stylesheet">
  <link href="/css/post.css" rel="stylesheet">

  <link href="/css/backtop.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/responsive-media-query.css">



<!-- post awesome fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >

  
  <!-- google fonts for the main title -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- jquery libary -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>
<body>

    <!-- ./ navbar blog -->
    <?php include "includes/navbar.php"; ?>
  


    
    <article class="container myPost"  id="wrapper">

    <!-- box -->
    <div class="box">
    <h1 class="header-title"> <i class="fas fa-star-of-david"></i> </h1>
    <!-- ./box -->
    </div>


    <!-- main-article -->
    <div class="main-article">
     

     <!-- post-col -->
      <div class="post-col">

      <?php
        
        if(isset($_GET["p_id"])) {
        
        $the_post_id = $_GET["p_id"];


        // post view sql
        $view_query = "UPDATE posts SET post_view_counts = post_view_counts + 1 WHERE post_id = $the_post_id ";
        $send_query = mysqli_query($conn, $view_query);

        // check if it was send
        if(!$send_query) {
          die("<p class='text-danger> Query Fialed  </p>'");
        }


        $sql = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";
        
        // get the result 
        $select_post_query = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($select_post_query)) {
        
            $post_id = $row["post_id"];
            $post_author = $row["post_author"];
            $post_title = $row["post_title"];
            $post_image = $row["post_image"];
            $post_content = $row["post_content"];
            $post_cdate = $row["post_cdate"];
            $post_audio = $row["post_audio"]; 
            $post_view_counts = $row["post_view_counts"]; 
            $post_view_counts = $row["post_view_counts"];  
            $post_fileSize = $row["post_fileSize"];  


            ?>


      <img id="post-image" class="lazy" data-src="/imgs/<?php echo $post_image ?> " alt="<?php echo $post_title ?>"> 
        

    <br>

      <h3 class="post-title"> <?php echo $post_title?> </h3>

      <div class="icon" class="pl-2 " > <i class="fas fa-calendar-alt ">
      </i> <?php echo $post_cdate ?>  <i class="fas fa-user"></i> GospelBiz Liberia 
      <a href="#comment" style="background: none!important;">  <i class="ml-2 fas fa-comment"></i>
          Comment ( 
         <?php 

         if(isset($_GET["p_id"])) {

          $the_post_id = $_GET["p_id"];

         $sql = "SELECT * FROM comments  WHERE comment_post_id = {$the_post_id} ";

         $select_post_comment_query = mysqli_query($conn, $sql);

         $rowCount = mysqli_num_rows($select_post_comment_query);

         echo  $rowCount;

       }
         ?>
         )

         </a>

          <br>
    </div>

    <br>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_inline_share_toolbox pl-2"></div>
            

  <img id="image" class="lazy" data-src="/imgs/<?php echo $post_image ?>" alt="">

  <!-- music text -->
  <div class="content pl-2 pt-3 pr-2"> <?php echo $post_content ?> </div>

   <p class="download pl-2">Play and Download Now</p>

   <p class="text-danger pl-2">
  <a href="/audios/<?php echo $post_audio ?>" download="<?php echo $post_title ?>">
   [Download]
  </a>

  </p>

    <br>

      <b class="pl-2 mt-4"><i class="far fa-eye"></i> <?php echo $post_view_counts ?> Views </b>


   <audio src="/audios/<?php echo $post_audio ?>" controls></audio>

    <!-- download music -->
    <div class="download-btn" id="sticky">
      <a href="/audios/<?php echo $post_audio ?>" download="<?php echo $post_title ?>">
      <h4 class="download-title">Download</h4>
      <p class="download-text"> <?php echo $post_title ?> <?php echo $post_fileSize ?> </p>
    
    </a>
    </div>


    <!-- tags -->
    <p class="tags"><i class="fas fa-tags"> Tagged</i> 

      <?php

    if(isset($_GET["p_id"])) {
        
        $the_post_id = $_GET["p_id"];

        $sql = "SELECT * FROM posts WHERE post_tags = {$the_post_id} ";
        
        // get the result 
        $select_post_query = mysqli_query($conn, $sql);

        echo $post_tags;
        
      }

       ?>

    </p>


     <?php }   }  else {

      header("Location: index");
     
     } ?>
   

   <!-- end main col -->

   </div>

            
<!-- ./main-article  -->
</div>




<!-- related post -->
    
  <!-- bottom-article -->

   <section class="bottom-article">
    
     <div class="box">
    <h1 class="header-title">Related Posts </h1>
    </div>

    <br>


      <?php 

       if(isset($_GET["p_id"])) {
        
        $the_post_id = $_GET["p_id"];

        $sql = "SELECT * FROM posts WHERE post_tags = {$the_post_id} ";
        
        // get the result 
        $select_relatedPost = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($select_relatedPost)) {
          # code...

          $post_id = $row["post_id"];
          $post_title = $row["post_title"];
          $post_image = $row["post_image"];
          $post_content = $row["post_content"];
          // $post_content = $row["post_content"];


        
          ?>
    <div class="bottom-col">

     <a href="post/<?php echo $post_id ?> "> 
    
      <img src="imgs/<?php echo $post_image ?>" alt="">

      <h3 class="bottom-caption"> <?php echo $post_title ?></h3>
    
    <div class="icon" > <i class="fas fa-calendar-alt "></i> <?php echo $post_date ?> <i class="fas fa-user"></i> GospelBiz Liberia </div>
    </a>

    </div>
      
    <?php  }  }  ?>


  <br>
  <br>



    <h1 class="comment-heading bg-color ">Leave a comments</h1>

  <!-- undone  -->
    <section class="comment container"></div>

  <!-- comment -->
  <div class="comment-box" id="comment"> 
    
    <!-- form -->
    <form action="" method="POST">

      <div class="form-group">
        <label for="formGroupExampleInput2"> Body</label>
        <textarea type="text" name="comment_content" class="form-control" id="body" cols="30" rows="6"></textarea>
      </div>

      <div class="form-group">
        <label for="author">  Name</label>
        <input type="text" name="comment_author" class="form-control" id="author" >
        </div>

        <div class="form-group">
        <label for="lname"> Email</label>
        <input type="email" name="comment_email" class="form-control" id="email" >
        </div>

        <span class="text-muted col-md-3">
        By Clicking 'Post Your Comment', you agree to our <a href="">terms of services,
          privacy policy and cookie policy.
        </a> 
       </span>
       <br>

       <input type="submit" name="create_comment" value="Post Your Comment" class="btn btn-primary pt-2 mt-4">
      <!-- ./ form -->
      </form>
  </div>

    </section>


    <figure class="comment-content mt-4">


      <?php 

      if(isset($_POST["create_comment"])) {

        $the_post_id = $_GET["p_id"];

        $comment_author = $_POST["comment_author"];
        $comment_content = $_POST["comment_content"];
        $comment_email = $_POST["comment_email"];
        // $comment_date = $_POST["comment_date"];


        $sql = "INSERT INTO comments (comment_post_id, comment_author, comment_content, comment_status, 
        comment_email,  comment_date ) ";

        $sql .= "VAlUES ($the_post_id, '{$comment_author}', '{$comment_content}', 'unapprove', 
        '{$comment_email}', now() ) ";

        $create_comment_query = mysqli_query($conn, $sql);

        if(!$create_comment_query) {

          die("<p class='text-danger'>  Creating comment failed </p> " . mysqli_error($conn));
        }


      }

       ?>


      <div class="comment-details">


        <?php 

        $sql = "SELECT * FROM comments WHERE comment_post_id = $the_post_id Order By comment_id DESC";

        $select_comment_query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($select_comment_query)) {
          # code...
        $comment_author = $row["comment_author"];
        $comment_content = $row["comment_content"];
        $comment_email = $row["comment_email"];
        $comment_date = $row["comment_date"];


        ?>  

     <img id="comment-img" class="rounded-circle mt-4" src="/imgs/placeholder-person.jpg" alt="<?php echo $comment_author ?>">
     <div class="comment-author"> <?php echo $comment_author ?></div>
    <div class="comment-date text-muted"> <?php echo $comment_date ?></div>
    <div class="comment-body"> <?php echo $comment_content ?>
    </div>


      <?php  }  ?>


      </div>
    </figure>


  </section>







    <?php include "includes/blog-sidebar.php"; ?>




<!-- end wrapper -->
</article>



  <!-- foter -->
    <?php include "includes/footer.php"; ?>

    <!-- ./footer -->


    <script src="/js/lazyload.js"></script>

    
 
</body>
</html>
