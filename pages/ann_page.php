<?php include ("page_include.php"); 
	  include ('../dbconnect.php');
?>
	<div class="row" style="margin-top: 1%; margin-left: 9%; margin-right: 9%">
		<div class="row">
		<section class="block-wrapper">
			<div class="row" style="background-color: white; padding-top: 1%; padding-bottom: 2%;margin-top: -3%;">
				<div class="col-lg-8 col-md-12">

					<div class="block category-listing">
						<h3 class="block-title"><span style="background-color:rgba(0, 92, 185, 1) ">Announcer</span></h3>
						<div class="row" style="padding-left: 1%; padding-right: 1%;">
							<?php
							$ann_query = mysql_query("SELECT * FROM wadyabala ORDER BY urutan");
							while ($announcer = mysql_fetch_array($ann_query)) {
							 ?>
							<div class="col-3" style="padding: 1px; padding-bottom: 0px;">
								<div class="post-block-style post-grid clearfix" style="min-height: 0px;margin-bottom: 1px;" >
									<div class="post-thumb cont">
										<a href="#">
											<img class="img-fluid " src="../delta_images_assets/announcer_assets/<?php echo $announcer['ID'] ?>.png" alt="" />
										</a>
										<div class="overlay">
    									<div class="text"><?php echo $announcer['nama']; ?>
    									<br>
    										<label style="font-size: 13px;"><?php echo $announcer['link']; ?></label>
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
					<div class="sidebar sidebar-right">
						<?php include("sidebar_col.php") ?>

<!-- 						<div class="widget color-default">
							<h3 class="block-title"><span>Popular News</span></h3>
							<div class="list-post-block">
								<ul class="list-post">
									<?php
									$popular = mysql_query("SELECT * FROM news ORDER BY post_hits DESC LIMIT 4");
											while($popular_data = mysql_fetch_array($popular)){ 
												$popular_category = mysql_fetch_array(mysql_query("SELECT * FROM news_category JOIN news on news_category.ID_category = '$popular_data[news_category_id]' WHERE news_category.ID_category = '$popular_data[news_category_id]'"));
												$popular_date_time = new DateTime($data['post_date']);
											    $popular_date_time = $popular_date_time->format('M d,&\nb\sp Y'); 
									 ?>
									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="#">
													<img class="img-fluid" src="../delta_images_assets/news/<?php echo $popular_data['ID'] ?>.jpg" alt="" />
												</a>
												<a class="post-cat" href="#"><?php echo $popular_category['nama'] ?></a>
											</div>

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#"><?php echo substr($popular_data['post_title'],0,30) . '...'; ?></a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date"><?php echo $popular_date_time; ?></span>
									 			</div>
								 			</div>
										</div>
									</li>
								    <?php } ?>

								</ul>
							</div>

						</div> -->

						<!-- <div class="widget text-center">
							<img class="banner img-fluid" src="../images/banner-ads/ad-sidebar.png" alt="" />
						</div> Sidebar Ad end -->

					</div><!-- Sidebar right end -->
				</div><!-- Sidebar Col end -->
				</div>
			</div><!-- Row end -->
	</section><!-- First block end -->
		
	</div>
<?php include ("page_include_bot.php"); ?>


<style type="text/css">
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
  background-color: rgba(0, 92, 185, 1);
}

.cont:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>