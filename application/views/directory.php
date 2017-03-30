<div class="container">
  <?php


  // var_dump($test2);
  foreach($test2 as $item){
    echo $item["username"]." ";
    echo $item["fname"]." ";
    echo $item["lname"]." ";
    echo $item["nickname"]."<br>";

  }
  echo "<br><br>";
  foreach($business as $item){
    echo $item["businessType"]."<br>";
  }
  ?>
</div>
