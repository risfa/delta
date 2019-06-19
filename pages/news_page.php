<?php include ("page_include.php");
      include ("../dbconnect.php");
 ?>
	<div class="row" style="margin-top: 1%; margin-left: 9%; margin-right: 9%">
		<div class="row">
		<section class="block-wrapper">
			<div class="row" style="background-color: white; padding-top: 1%; padding-bottom: 2%;margin-top: -3%;">
				<div class="col-lg-8 col-md-12">

					<div class="block category-listing">
						<h3 class="block-title"><span style="background-color:rgba(0, 92, 185, 1) ">What's New</span></h3>

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


						<div class="paging">
				            <ul class="pagination">
				            	 <?php
								include('pagination_ajax/index.php');
							      ?> 
				       		</ul>
		          	    </div><!-- Paging end -->
	          	
						<!-- <div class="row"> -->
							<!-- <?php
							$sql = mysql_query("SELECT * FROM news JOIN news_category ON news.news_category_id = news_category.ID_category ORDER BY post_date DESC");
							
							while ($data = mysql_fetch_assoc($sql)) {
									$bad_name = mysql_real_escape_string($data['ID']);
									$date_time = new DateTime($data['post_date']);
									$date_time = $date_time->format('M d,&\nb\sp Y');
						    ?>
							<div class="col-md-6">
								<div class="post-block-style post-grid clearfix">
									<div class="post-thumb">
										<a href="../pages/news_details.php?news=<?php echo $bad_name; ?>">
											<img class="img-fluid" src="../delta_images_assets/news/<?php echo $data['ID'] ?>.jpg" alt="" />
										</a>
									</div>  -->
									<!-- post thum end -->
									<!-- <a class="post-cat" href="../pages/news_details.php?news=<?php echo $bad_name; ?>"><?php echo $data['nama']; ?>
									</a>
									<div class="post-content">
							 			<h2 class="post-title title-large">
							 				<a href="../pages/news_details.php?news=<?php echo $bad_name; ?>"><?php echo $data['post_title']; ?></a>
							 			</h2>
							 			<div class="post-meta"> -->
							 				<!-- <span class="post-author"><a href="#">John Doe</a></span>
							 				<span class="post-date"><?php echo $date_time; ?></span>
							 			</div>
							 			<p><?php echo substr(strip_tags($data['post_content']),0,150) . '...'; ?></p>
						 			</div>
						 			 Post content end -->
								<!-- </div> -->
								<!--Post Block style end -->
							<!-- </div>  -->
							<!-- Col 1 end -->
							<!-- <?php
							}
							 ?>  -->

						<!-- </div> --> 
						<!-- Row end -->
					</div>
					<!-- Block Lifestyle end -->

					


			</div><!-- Content Col end -->

				<div class="col-lg-4 col-md-12">
					<?php include("sidebar_col.php") ?>
				</div><!-- Sidebar Col end -->
				</div>
			</div><!-- Row end -->
	</section><!-- First block end -->
		
	</div>
<?php include ("page_include_bot.php"); ?>
