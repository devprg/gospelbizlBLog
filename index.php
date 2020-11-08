<!-- include the header -->
<?php include "includes/header.php"; ?>

<!DOCTYPE html>
<html lang="en-US">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <title> GospelBizliberia - Home </title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!">

        <!-- open graph for facebook -->
        <meta property="og:image:width" content="1280" />
        <meta property="og:image:height" content="1280" />
        <meta property="og:locale" content="en-US" />
        <meta property="og:url" content=""/>
        <meta property="og:type" content="Article" />
        <meta property="og:title" content="GospelBizliberia - Home"/>
        <meta property="og:description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!" />
        <meta property="og:image" content="https://gospelbizliberia.com/favicon.png" />
        <meta property="article:tag" content="GospelBizliberia - Article" />
        <meta property="article:section" content="Music" />

        <!-- twitter cards -->
        <meta name="twitter:card" content="“summary">
        <meta name="twitter:site" contents="@gospelbizliberia" />
        <meta name="twitter:creator" contents="@gospelbizliberia" />
        <meta property="twitter:url" content=""/>
        <meta property="twitter:title" content="GospelBizliberia - Home" />
        <meta property="twitter:description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!"/>
        <meta property="twitter:image" content="https://gospelbizliberia.com/favicon.png" />

         <link rel="icon" href="favicon.png" sizes="16x16 32x32" type="image/png"> 
         <link rel="icon" href="apple-touch-icon.png" sizes="16x16 32x32" type="image/png"> 


        <!-- Bootstrap core CSS -->
        <link href="css/navbar.css" rel="stylesheet">
        <link href="css/media-query.css" rel="stylesheet">
        <link href="css/backtop.css" rel="stylesheet">
        <link href="css/blog-home.css" rel="stylesheet">
        <link href="css/whatsapp.css" rel="stylesheet">

        <link href="css/modal.css" rel="stylesheet">



          <!-- responsive media query -->
          <link rel="stylesheet" href="css/responsive-media-query.css">

        <!-- lightslider css -->
        <link href="css/lightslider.css" rel="stylesheet">

        <!-- slider csss -->
        <link rel="stylesheet" href="css/slider.css">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >

        <!-- google fonts for the main title -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

        <!-- jquery libary -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>


      <!-- text fonts  -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

      <!-- editor -->
      <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>

</head>
<body >


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header bg-muted">
        <h5 class="modal-title text-center" id="exampleModalLabel">Welcome to our letternews </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
        
  <div class="container" id="landing-page">

    <div class="hero-image">
   
   <h1 class="landing-page-title">Get In Touch With Our Marketing Team</h1>

   <div class="landing-page-text">Please subscribe to the GospelBiz Liberia newsletter for music, videos, news, articles and new
    products offerings.
   </div>

    <form action="" method="post">
      <div class="input-group-prepend">
        <input type="text " class="form-control" placeholder="Enter your email address...">
        <input type="submit" class="btn btn-primary" value="Subscribe">
      </div>

      <small class="text-light">Your email is protect with us don't worry.</small>
    </form>

<!-- ./hero image  -->
  </div>


   <!-- ./container -->
  </div>


      </div>
      <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      <!-- </div> -->
    </div>
  </div>
</div>




  <!-- ./ navbar blog -->
    <?php include "includes/navbar.php"; ?>
    


  <!-- ./ carousel images -->
    <?php include "includes/carousel.php" ?>





              <!-- main contain -->
    <article class="container"  id="wrapper">


    <div class="box">
    <h1 class="header-title">Latest Posts</h1>
    </div>

    <div class="main-article">

     <div class="main-col">

  
       <?php
        
        $sql = "SELECT * FROM posts WHERE post_category_id = 1 order by post_id DESC limit 1";
        
        // get the result 
        $select_postCategory = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($select_postCategory)) {
        
            $post_id = $row["post_id"];
            $post_author = $row["post_author"];
            $post_title = $row["post_title"];
            $post_image = $row["post_image"];
            $post_content = substr($row["post_content"],0, 100);

            // $post_cdate = $row["post_cdate"];
            // $post_view_counts = $row["post_view_counts"];

            ?>

        <a href="post/<?php echo $post_id?>" > 
        <img class="lazy" data-src="imgs/<?php echo $post_image ?> " alt="<?php echo $post_title ?>">

        <h2 class="main-title"> <?php echo $post_title ?> </h2>
         <div class="main-text"> <?php echo $post_content?>... </div>

      <!-- end main col -->
      </a>
            <?php  } ?>

      </div>



     <div class="main-col">

     <?php
        
        $sql = "SELECT * FROM posts WHERE post_category_id = 3 order by post_id DESC limit 1";
        
        // get the result 
        $select_postCategory = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($select_postCategory)) {
        
            $post_id = $row["post_id"];
            $post_author = $row["post_author"];
            $post_title = $row["post_title"];
            $post_image = $row["post_image"];
              $post_content = substr($row["post_content"],0, 100);
            // $post_cdate = $row["post_cdate"];
            // $post_view_counts = $row["post_view_counts"];

        ?>

        <a href="post/<?php echo $post_id?>" > 

          <img class="lazy" data-src="imgs/<?php echo $post_image ?> " alt="<?php echo $post_title ?>">

          <h2 class="main-title"> <?php echo $post_title ?> </h2>
         <div class="main-text"> <?php echo $post_content?>... </div>

        <!-- end main col -->
        </a>

            <?php  } ?>
   
    </div>



    <div class="main-col">

      <?php
       
       $sql = "SELECT * FROM posts WHERE post_category_id = 4 order by post_id DESC limit 1";
       
       // get the result 
       $select_postCategory = mysqli_query($conn, $sql);
       
       while($row = mysqli_fetch_assoc($select_postCategory)) {
       
           $post_id = $row["post_id"];
           $post_author = $row["post_author"];
           $post_title = $row["post_title"];
           $post_image = $row["post_image"];
            $post_content = substr($row["post_content"],0, 100);

       ?>

        <a href="post/<?php echo $post_id?>" > 

         <img class="lazy" data-src="imgs/<?php echo $post_image ?> " alt="<?php echo $post_title ?>">

         <h2 class="main-title"> <?php echo $post_title ?> </h2>
         <div class="main-text"> <?php echo $post_content?>... </div>
       <!-- end main col -->
       </a>

       <?php  } ?>
      
    </div>



      <div class="main-col">

      <?php
       
       $sql = "SELECT * FROM posts WHERE post_category_id = 5 order by post_id DESC limit 1";
       
       // get the result 
       $select_postCategory = mysqli_query($conn, $sql);
       
       while($row = mysqli_fetch_assoc($select_postCategory)) {
       
           $post_id = $row["post_id"];
           $post_author = $row["post_author"];
           $post_title = $row["post_title"];
           $post_image = $row["post_image"];
          $post_content = substr($row["post_content"],0, 100);

       ?>

        <a href="post/<?php echo $post_id ?>" >
        
         <img class="lazy" data-src="imgs/<?php echo $post_image ?> " alt="<?php echo $post_title ?>">

         <h2 class="main-title"> <?php echo $post_title ?> </h2>
         <div class="main-text"> <?php echo $post_content?>... </div>
       <!-- end main col -->

       </a>

       <?php  } ?>
           
    </div>

  <!-- ./main-article  -->
  </div>






<!-- related post -->

  <?php include "includes/recent-post.php"; ?>



    <?php include "includes/blog-sidebar.php"; ?>



    <!-- end wrapper -->
    </article>


  <!-- foter -->
    <?php include "includes/footer.php"; ?>

    <!-- ./footer -->



 <!-- <script src="js/backtop.js"></script> -->

    <script>
      $(document).ready(function(){
 
    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
     // Show button after 100px
     var showAfter = 100;
     if ($(this).scrollTop() > showAfter ) { 
      $('#btn-backtop').fadeIn();
     } else { 
      $('#btn-backtop').fadeOut();
     }
    });
    
    //Click event to scroll to top
    $('#btn-backtop').click(function(){
     $('html, body').animate({scrollTop : 0},800);
     return false;
    });
    
   });
    </script>


    <!-- slider -->
    <script src="js/slider.js"></script>
    <!-- slider -->
    <script src="js/lightslider.js"></script>

    <script src="js/lazyload.js"></script>
    <script src="js/navbarSearch.js"></script>


    <script>
      $(document).ready(function() {
          $("#exampleModal").modal(3000);

        });
     
    </script>
 


</body>

</html>
