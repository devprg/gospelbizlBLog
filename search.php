<!-- include the header -->
<?php include "includes/header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <title> GospelBizliberia - Search </title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!">

        <!-- open graph for facebook -->
        <meta property="og:image:width" content="1280" />
        <meta property="og:image:height" content="1280" />
        <meta property="og:locale" content="en-US" />
        <meta property="og:url" content=""/>
        <meta property="og:type" content="Article" />
        <meta property="og:title" content="GospelBizliberia - Search"/>
        <meta property="og:description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!" />
        <meta property="og:image" content="https://gospelbizliberia.com/favicon.png" />
        <meta property="article:tag" content="GospelBizliberia - Article" />
        <meta property="article:section" content="Music" />

        <!-- twitter cards -->
        <meta name="twitter:card" content="“summary">
        <meta name="twitter:site" contents="@gospelbizliberia" />
        <meta name="twitter:creator" contents="@gospelbizliberia" />
        <meta property="twitter:url" content=""/>
        <meta property="twitter:title" content="GospelBizliberia - Search" />
        <meta property="twitter:description" content="Liberian Gospel Music site focused on Gospel Music News, Gospel Videos, Gospel News, ⏮ Gospel Entertainment, Gospel Artist, Gospel Music Awards & more!"/>
        <meta property="twitter:image" content="https://gospelbizliberia.com/favicon.png" />
    
    <link rel="icon" href="/favicon.png" sizes="16x16 32x32" type="image/png"> 

    <link rel="icon" href="/apple-touch-icon.png" sizes="16x16 32x32" type="image/png"> 


  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >
   <link href="css/whatsapp.css" rel="stylesheet">

  <link href="css/navbar.css" rel="stylesheet">
  <link href="css/category.css" rel="stylesheet">
  <link href="css/backtop.css" rel="stylesheet">
  <link href="css/blog-home.css" rel="stylesheet">


  <link rel="stylesheet" href="/css/responsive-media-query.css">



  <!-- google fonts for the main title -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <!-- jquery libary -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src='https://kit.fontawesome.com/a076d05399.js'></script>


</head>

<body>

  <!-- ./ navbar blog -->
    <?php include "includes/navbar.php"; ?>
    

   
 <article class="container myCategory"  id="wrapper">
  
  
  <div class="box">
  <h1 class="header-title"> 
  <?php


      if(isset($_POST["submit"])) {

       $search = $_POST["search"];

      echo "Search result for " . $search;

     }

   ?>

  </h1>

  </div>
  
  <div class="main-article">

        <?php 

          if(isset($_POST["submit"])) {

           $search = $_POST["search"];

          $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

          $select_search_query = mysqli_query($conn, $query);

          if(!$select_search_query) {

            die("<h1> Query failed </h1>" . mysqli_error($conn));
          }

          $count = mysqli_num_rows($select_search_query);

          if($count == 0) {

            echo "<h1 class='text-danger'> No Result </h1> <br>";

          }

          else {

            while ($row = mysqli_fetch_assoc($select_search_query)) {

            $post_id = $row["post_id"];
            $post_title = $row["post_title"];
            $post_image = $row["post_image"];
            $post_tags = $row["post_tags"];

              ?>

           <div class="category-col">

         <a href="post/<?php echo $post_id ?>">    
            <img class="lazy" data-src="imgs/<?php echo $post_image ?>" alt="<?php echo $post_title ?>">
          
            <h2 class="category-title"> <?php echo $post_title ?> </h2>
          
           <!-- end main col -->
            </a>  
             
           </div>

              <?php   } } }  ?>

              
              <br>

        <!-- <a href="" class="btn btn-danger view-more"> Load more </a>
   -->
  
    <!-- ./main-article  -->
        </div>
  
  
  
  
  
      <?php include "includes/blog-sidebar.php"; ?>
  
  
  
    <!-- end wrapper -->
    </article>
    


  <!-- foter -->
    <?php include "includes/footer.php"; ?>
    <!-- ./footer -->

    <script src="/js/navbarSearch.js"></script>

<script src="/js/lazyload.js"></script>

</body>

</html>
