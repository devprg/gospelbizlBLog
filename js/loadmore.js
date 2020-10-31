$(document).ready(function() {
    var colCount = 2;

    $("button").click(function() {
      
      colCount = colCount + 2;

      $("#load").load("load-more.php", {
        
        colNewCount: colCount
      });
    })
  })
