
<div class="row" style="margin-top: 2vh">
	<div class="col-md-6" style="background-color: black;">
    <center style="height: 101%;">
	<iframe style="width: 80%;height:100%;border: none; overflow-y: hidden;" src="https://tvnetstream.com/"></iframe>
  </center>
	</div>
	<div class="col-md-6">
		<div id="sliderpromo" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <?php
      $datapertama = mysql_fetch_array(mysql_query("SELECT * FROM banner_promo_slider ORDER BY rank ASC LIMIT 0,1 "));
     ?>
    <div class="carousel-item active">
      <a onClick = "click_banner(<?php echo $datapertama[0]; ?>)"  target="_blank" href="<?php echo $datapertama[1] ?>"><img class="d-block w-100 h-100" src="delta_images_assets/slider_promo_assets/<?php echo $datapertama[0] ?>.jpg"></a>
    </div>
    <?php
      $sql2 = mysql_query("SELECT * FROM banner_promo_slider ORDER BY rank ASC LIMIT 9999999 OFFSET 1");
      while($data = mysql_fetch_array($sql2)){
    ?>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="delta_images_assets/slider_promo_assets/<?php echo $data[0] ?>.jpg">
    </div>
     <?php } ?>
   <!--  <div class="carousel-item">
      <img class="d-block w-100 h-100" src="assets/banner3.png">
    </div> -->
  </div>
  <a class="carousel-control-prev" href="#sliderpromo" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#sliderpromo" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	</div>
</div>