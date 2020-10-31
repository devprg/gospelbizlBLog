<?php include "includes/config.php"; ?>


          <?php

        $colNewCount = $_POST["colNewCount"];

        $sql = "SELECT * FROM posts LIMIT $colNewCount";
        $selec_posts_query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($selec_posts_query) > 0) {

        // loop through
        while ($row = mysqli_fetch_assoc($selec_posts_query)) {

        $post_id = $row["post_id"];
        $post_author = $row["post_author"];
        $post_title = $row["post_title"];
        $post_content = $row["post_content"];
        $post_image = $row["post_image"];
        $post_cdate = $row["post_cdate"];

        echo  "<div class='col-xs-3' id='load'>


        <img src='imgs/$post_image ?>' alt='' class='img-image-top'>

        <h2 class='col-title'>  $post_title </h2>

        <div class='caption text-muted'>
        <i class='fas fa-calendar-alt'></i>  Posted on by
        <span>  <a href=''>  $post_cdate  </a>  </span>
        </div>

        </div>

        </div>";

        } }

        else {
        echo "hiadsfad";
        }

  ?>