<?php include ("page_include.php");
      include ("../dbconnect.php");
 ?>
	<div class="row" style="margin-top: 1%; margin-left: 9%; margin-right: 9%">
		<div class="row">
		<section class="block-wrapper">
			<div class="row" style="background-color: white; padding-top: 1%; padding-bottom: 2%;margin-top: -3%;">
				<div class="col-lg-8 col-md-12">

					<div class="block category-listing">
						<h3 class="block-title"><span style="background-color:rgba(0, 92, 185, 1) ">What's</span></h3>

						<ul class="subCategory unstyled">
							<?php
							$category = mysql_query("SELECT * FROM news_category");
							while ($category_data = mysql_fetch_array($category)) {
							 ?>
							<li><a href="#"><?php echo $category_data['nama']; ?></a></li>
							<?php
							} 
							 ?>
						</ul>

						<div class="row">
							<?php
							$sql = mysql_query("SELECT * FROM news ORDER BY post_date DESC LIMIT 8");
							
							while ($data = mysql_fetch_assoc($sql)) {
									$bad_name = mysql_real_escape_string($data['ID']);
									$category = mysql_fetch_array(mysql_query("SELECT * FROM news_category JOIN news on news_category.ID_category = '$data[news_category_id]' WHERE news_category.ID_category = '$data[news_category_id]'"));
									$date_time = new DateTime($data['post_date']);
									$date_time = $date_time->format('M d,&\nb\sp Y');
						    ?>
							<div class="col-md-6">
								<div class="post-block-style post-grid clearfix">
									<div class="post-thumb">
										<a href="../pages/news_details.php?news=<?php echo $bad_name; ?>">
											<img class="img-fluid" src="../delta_images_assets/news/<?php echo $data['ID'] ?>.jpg" alt="" />
										</a>
									</div> <!-- post thum end -->
									<a class="post-cat" href="../pages/news_details.php?news=<?php echo $bad_name; ?>"><?php echo $category['nama']; ?>
									</a>
									<div class="post-content">
							 			<h2 class="post-title title-large">
							 				<a href="../pages/news_details.php?news=<?php echo $bad_name; ?>"><?php echo $data['post_title']; ?></a>
							 			</h2>
							 			<div class="post-meta">
							 				<!-- <span class="post-author"><a href="#">John Doe</a></span> -->
							 				<span class="post-date"><?php echo $date_time; ?></span>
							 			</div>
							 			<p><?php echo strip_tags(substr($data['post_content'],0,200)) . '...'; ?></p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style end -->
							</div><!-- Col 1 end -->
							<?php
							}
							 ?>

						


						</div><!-- Row end -->
					</div><!-- Block Lifestyle end -->

					<div class="paging">
		            <ul class="pagination">
		              <li class="active"><a href="#">1</a></li>
		              <li><a href="#">2</a></li>
		              <li><a href="#">3</a></li>
		              <li><a href="#">4</a></li>
		              <li><a href="#">»</a></li>
		              <li>
		              	<span class="page-numbers" style="font-family: nexabold;">Page 1 of 2</span>
		              </li>
		            </ul>
	          	</div><!-- Paging end -->


			</div><!-- Content Col end -->

				<div class="col-lg-4 col-md-12">
					<div class="sidebar sidebar-right">
						<div class="widget">
							<h3 class="block-title"><span>Follow Us</span></h3>

							<ul class="social-icon">
								<li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div><!-- Widget Social end -->

						<div class="widget color-default">
							<h3 class="block-title"><span>Popular News</span></h3>

							<div class="post-overaly-style clearfix">
								<div class="post-thumb">
									<a href="#">
										<img class="img-fluid" src="images/news/lifestyle/health4.jpg" alt="" />
									</a>
								</div>
								
								<div class="post-content">
						 			<a class="post-cat" href="#">Health</a>
						 			<h2 class="post-title title-small">
						 				<a href="#">Smart packs parking sensor tech and beeps when col…</a>
						 			</h2>
						 			<div class="post-meta">
						 				<span class="post-date">Feb 06, 2017</span>
						 			</div>
					 			</div><!-- Post content end -->
							</div><!-- Post Overaly Article end -->


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
													<img class="img-fluid" src="../images/news/tech/gadget3.jpg" alt="" />
												</a>
												<a class="post-cat" href="#"><?php echo $popular_category['nama']; ?></a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="#"><?php echo substr($popular_data['post_title'],0,30) . '...'; ?></a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-date"><?php echo $popular_date_time; ?></span>
									 			</div>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 1 end -->
									<?php
									} 
									 ?>

									

								</ul><!-- List post end -->
							</div><!-- List post block end -->

						</div><!-- Popular news widget end -->

						<div class="widget text-center">
							<img class="banner img-fluid" src="../images/banner-ads/ad-sidebar.png" alt="" />
						</div><!-- Sidebar Ad end -->

					</div><!-- Sidebar right end -->
				</div><!-- Sidebar Col end -->
				</div>
			</div><!-- Row end -->
	</section><!-- First block end -->
		
	</div>
<?php include ("page_include_bot.php"); ?>