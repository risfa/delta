<div class="row" style="margin-top: 2vh; background-color: white;border-radius: 5px;background-color: white; padding-top: 5%;padding-bottom: 3%;">
	<div class="col-8" style=""> <h3 style="font-weight: bolder; margin-bottom: 0px; color: rgba(0, 92, 185, 1);font-family: nexabold; ">INSTAGRAM</h3></div>
	<div class="col-4"><label style="float: right; font-weight: bolder">View All</label></div>
</div>
<br>
<div class="row" style="background-color: white;">
	<div class="container" style="padding: 5%;">
	<div class="row">
		<?php
		  $query = mysql_query("SELECT * FROM instagram LIMIT 3");
		  while($data = mysql_fetch_array($query)){ 
		 ?>
		<div class="col-4" style="margin: auto;">
			<img style="width: 100%;" src="<?php echo $data['image_url'] ?>">
		</div>
		<?php
		} 
		 ?>
	</div>
	<br>
	<div class="row">
		<?php
		  $query2 = mysql_query("SELECT * FROM instagram LIMIT 3,3");
		  while($data2 = mysql_fetch_array($query2)){ 
		 ?>
		<div class="col-4" style="margin: auto;">
			<img style="width: 100%;" src="<?php echo $data2['image_url'] ?>">
		</div>
		<?php
		} 
		 ?>
	</div>
</div>
</div>
<br>

<div class="row text-lg-right text-center " style="background-color: white; padding-top: 5%;">
	<div class="container">
		<div class="row">
		<div style="width: 100%;" class="col-7"></div>
		<div class="col-5">
			<img class="img-fluid" style="width: 100%; float: right;" src="assets/DELTA FMBIRU.png">
			</div>
		
		</div>
		<br>
		<div style="float: right; padding-top: 10px;padding-bottom: 10px;">
		<p style="text-align: right; width: 75%; float: right;"><label style="font-family: nexabold;">Delta FM</label><br>
			Delta FM merupakan sebuah station radio berjaringan di Indonesia untuk target market dewasa muda dengan format musik hot adult contemporary (Hot AC) yang memutarkan 100% lagu enak. 
		</p>
	 <div class="col-md-12 top-social text-lg-center text-md-center" style=" ">
                  <ul class="unstyled">
                     <li>
                         <center>
                        <a title="Facebook" href="#">
                           <span class="social-icon"><i style="color: rgba(0, 92, 185, 1);" class="fa fa-facebook"></i></span>
                        </a>
                        <a title="Instagram" href="#">
                           <span class="social-icon"><i style="color: rgb(149,214,0)" class="fa fa-instagram"></i></span>
                        </a>
                        <a title="Twitter" href="#">
                           <span class="social-icon"><i style="color: rgba(0, 92, 185, 1);" class="fa fa-twitter"></i></span>
                        </a>
                        <a title="Youtube" href="#">
                           <span class="social-icon"><i style="color: rgb(149,214,0)" class="fa fa-youtube"></i></span>
                        </a>
                        <a title="Soundcloud" href="#">
                           <span class="social-icon"><i style="color: rgba(0, 92, 185, 1);" class="fa fa-soundcloud"></i></span>
                        </a>
                        </center>
                        <br>
                         <a title="playstore" href="#">
                           <span class="social-icon"><img style="width: 20%; background-color: rgb(149,214,0);border-radius: 10%;" src="assets/Play_store.svg"></span>
                        </a>
                          <a title="playstore" href="#">
                           <span class="social-icon"><img style="width: 20%; background-color: rgba(0, 92, 185, 1);border-radius: 10%;" src="assets/App_store.svg"></span>
                        </a>
                     </li>
                  </ul><!-- Ul end -->
               </div><!--/ Top social col end -->
		</div>
	</div>
	
</div>