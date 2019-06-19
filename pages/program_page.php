<?php include ("page_include.php"); include ('../dbconnect.php'); ?>
	<div class="row" style="margin-top: 1%; margin-left: 9%; margin-right: 9%">
		<div class="row">
		<section class="block-wrapper">
			<div class="row" style="background-color: white; padding-top: 1%; padding-bottom: 2%;margin-top: -3%;">
				<div class="col-lg-8 col-md-12">

					<div class="block category-listing">
						<h3 class="block-title"><span style="background-color:rgba(0, 92, 185, 1) ">PROGRAMS</span></h3>
						<div class="row">
							<?php
							$sql_program = mysql_query("SELECT * FROM programs");
							while ($program = mysql_fetch_array($sql_program)) {
							 
							 ?>
							<div class="col-12">
								<div class="post-block-style post-grid clearfix">
									<div class="post-thumb cont">
										<a href="#">
											<img class="img-fluid" src="../delta_images_assets/program_assets/<?php echo $program['id'] ?>.jpg" alt="" />
										</a>
										<div class="overlay">
											<div class="text">
												<center>
							 			<h2 class="post-title title-large" style="color:rgba(0, 92, 185, 1); font-family: nexabold;" >
							 				<?php echo $program['title']; ?>
							 			</h2>
							 			</center>
							 			<p><?php echo substr(strip_tags($program['body']),0,150) . '...'; ?></p>
											</div>
											
										</div>
									</div>
									
								</div><!-- Post Block style end -->
							</div><!-- Col 1 end -->
						<?php } ?>

							




						</div><!-- Row end -->
					</div><!-- Block Lifestyle end -->


			</div><!-- Content Col end -->

				<div class="col-lg-4 col-md-12">
						<?php include("sidebar_col.php"); ?>
				</div><!-- Sidebar Col end -->
				</div>
			</div><!-- Row end -->
	</section><!-- First block end -->
		
	</div>
<?php include ("page_include_bot.php"); ?>


 <style>
 	.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: rgb(149,214,0);
}

.cont:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 15px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
 </style>