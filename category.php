<!-- include the header -->
<?php include "includes/header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <title> GospelBizliberia - Category </title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!">

        <!-- open graph for facebook -->
        <meta property="og:image:width" content="1280" />
        <meta property="og:image:height" content="1280" />
        <meta property="og:locale" content="en-US" />
        <meta property="og:url" content=""/>
        <meta property="og:type" content="Article" />
        <meta property="og:title" content="GospelBizliberia - Category"/>
        <meta property="og:description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!" />
        <meta property="og:image" content="https://gospelbizliberia.com/favicon.png" />
        <meta property="article:tag" content="GospelBizliberia - Article" />
        <meta property="article:section" content="Music" />

        <!-- twitter cards -->
        <meta name="twitter:card" content="“summary">
        <meta name="twitter:site" contents="@gospelbizliberia" />
        <meta name="twitter:creator" contents="@gospelbizliberia" />
        <meta property="twitter:url" content=""/>
        <meta property="twitter:title" content="GospelBizliberia - Category" />
        <meta property="twitter:description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!"/>
        <meta property="twitter:image" content="https://gospelbizliberia.com/favicon.png" />

        <link rel="icon" href="/favicon.png" sizes="16x16 32x32" type="image/png"> 

       <link rel="icon" href="/apple-touch-icon.png" sizes="16x16 32x32" type="image/png"> 


  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >

     <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/navbar.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="/css/blog-home.css" rel="stylesheet">
  <link href="/css/category.css" rel="stylesheet">
  <link href="/css/backtop.css" rel="stylesheet">

  <link rel="stylesheet" href="/css/responsive-media-query.css">
  

  <!-- google fonts for the main title -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">


<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<!-- editor -->
<script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>

 
</head>

<body>

 
  <!-- ./ navbar blog -->
  <?php include "includes/navbar.php"; ?>
    

 <article class="container myCategory"  id="wrapper">
  
  
  <div class="box">
    
     <?php
        
        if(isset($_GET["category"])) {
        
        $category_id = $_GET["category"];

        $sql = "SELECT * FROM categories WHERE cat_id = {$category_id} order by cat_id limit 10 ";
        // get the result 
        $select_category_query = mysqli_query($conn, $sql); 

        while ($row = mysqli_fetch_assoc($select_category_query)) {

        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];

        ?>

       <h1 class="header-title"> <?php echo $cat_title# ?>  </h1>
  
    <?php   } } ?>


    </div>


  
    <div class="main-article">
  
       <?php
        
        if(isset($_GET["category"])) {
        
        $post_category_id = $_GET["category"];

        $sql = "SELECT * FROM posts WHERE post_category_id = {$post_category_id} ";
        
        // get the result 
        $select_category_query = mysqli_query($conn, $sql);

         if(!$select_category_query) {
          die("Query Failed " . mysqli_error($conn));

        }

        $count = mysqli_num_rows($select_category_query);

        if($count == 0) {

          echo "<h1 class='text-danger mb-4 py-4'> NO Post Found </h2> <br> <br> <br>";

        }
        else {
        
        while($row = mysqli_fetch_assoc($select_category_query)) {
        
            $post_id = $row["post_id"];
            $post_author = $row["post_author"];
            $post_title = $row["post_title"];
            $post_image = $row["post_image"];
            $post_cdate = $row["post_cdate"];
            $post_view_counts = $row["post_view_counts"];

          ?>

         <div class="category-col">

          <a href="/post/<?php echo $post_id?>" > 

              <img class="lazy" data-src="/imgs/<?php echo $post_image ?>" alt="<?php echo $post_title ?>">
            
              <h2 class="category-title"> <?php echo $post_title ?> </h2>
               <div class="category-text text-muted"> <?php #echo $post_content ?></div>
            <!-- end category col -->
            </a>

            
            <!--  ./category col-->
      </div>


          <?php } }   } ?>


 
       <!--  <div class="container d-flex align-items-center justify-content-center">

            <div class="col-md-3 mb-4">
        <a href="" class="btn btn-danger view-more" style="margin: 0 auto">Load more </a>
              
          </div>
          
        </div> -->
      
      <!-- ./main-article  -->
      </div>
      
  
  
      <?php include "includes/blog-sidebar.php"; ?>
  
  
  
  <!-- end wrapper -->
  </article>
  


    <!-- foter -->
      <?php include "includes/footer.php"; ?>
      <!-- ./footer -->
    

    <script src="/js/lazyload.js"></script>


</body>

</html>
