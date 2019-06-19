<?php
  include 'dbconnect.php';
 ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
      $datapertama = mysql_fetch_array(mysql_query("SELECT * FROM bannerSlider ORDER BY rank ASC LIMIT 0,1 "));
     ?>
    <div class="carousel-item active">
      <a onClick = "click_banner(<?php echo $datapertama[0]; ?>)"  target="_blank" href="<?php echo $datapertama[1] ?>"><img class="d-block w-100" src="delta_images_assets/slider_assets/<?php echo $datapertama[0] ?>.jpg" alt="First slide"></a>
    </div>
    <?php
      $sql2 = mysql_query("SELECT * FROM bannerSlider ORDER BY rank ASC LIMIT 9999999 OFFSET 1");
      while($data = mysql_fetch_array($sql2)){
    ?>
    <div class="carousel-item">
      <img class="d-block w-100" src="delta_images_assets/slider_assets/<?php echo $data[0] ?>.jpg" alt="Second slide">
    </div>
    <?php } ?>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>