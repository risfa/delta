
<?php include ("page_include.php"); ?>
	
	<div class="row" style="margin-top: 1%; margin-left: 9%; margin-right: 9%">
		<div class="row">
		<section class="block-wrapper">
			<div class="row" style="background-color: white; padding-top: 1%; padding-bottom: 2%;margin-top: -3%;">
				<div class="col-lg-8 col-md-12">
					<?php
					require ('../dbconnect.php');
					$id = mysql_escape_string($_GET['news']);
					//echo $id;die();
					if($id == ''){
						// header('Location: http://www.google.com');
						?>
						<script type="text/javascript">
							window.location.replace("news_page.php");
							
						</script>
						<?php
					}
					else{
					$query = mysql_query("SELECT * FROM news WHERE BINARY post_title = '$id' ");
					$num_rows = mysql_num_rows($query);
					if ($num_rows <=0 ) {
						?>
						<script type="text/javascript">
							alert()
							window.location.replace("news_page.php");
						</script>
						<?php
					}else{
					$data = mysql_fetch_array($query);
					$dateTime = new DateTime($data['post_date']);
					$dateTime = $dateTime->format('d F Y');
					$category = mysql_fetch_array(mysql_query("SELECT * FROM news_category JOIN news on news_category.ID_category = '$data[news_category_id]' WHERE news_category.ID_category = '$data[news_category_id]' "));
					$news_id = $data['ID'];

					//data for FB sharing
					//$url = urlencode($data['post_title'];
					$title = urlencode($data['post_title']);
					$description=urlencode(substr(strip_tags($data['post_content']),0,50));

					$url= urlencode('https://5dapps.com/JOKER/masimanetwork/deltafm/pages/news_details.php?news=' . $title);
					$image = urlencode('../delta_images_assets/news/'. $data['ID'] .'.jpg');
					
					 ?>
					<div class="block category-listing">
						<h3 class="block-title"><span style="background-color:rgba(0, 92, 185, 1) "><?php echo $category['nama']; ?></span></h3>
						<div class="row">
							<div class="col-12">
								<div class="post-block-style post-grid clearfix">
							 			<h2 class="post-title title-large">
							 				<a href="#" style="font-size: 25px;"><?php echo $data['post_title']; ?></a>
							 			</h2>
							 			<hr style="margin: 0;">
							 			<label style="font-size: 12px;"><?php echo $dateTime; ?> &nbsp | &nbsp by <?php echo $data['post_author']; ?></label>
									<div class="post-thumb">
										<a href="#">
											<img class="img-fluid" src="../delta_images_assets/news/<?php echo $data['ID'] ?>.jpg" alt="" />
										</a>
									</div>
									
									<div class="post-content">
										<hr>
										<ul class="social-icon">
											<li>
												<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title ?>&amp;p[url]=<?php echo $url; ?>&amp;p[description]=<?php echo $description;?>&amp;p[images][0]=<?php echo $image;?>','sharer','toolbar=0,status=0,width=750,height=500');" href="javascript: void(0)"><i class="fa fa-facebook"></i>
												</a>

											</li>
											<li><a href="http://twitter.com/share?text=Check%20out%20This%20Awesome%20Article,%0D<?php echo $data['post_title'] ?>%0D&url=https://5dapps.com/JOKER/masimanetwork/deltafm/pages/news_details.php?news=<?php echo $title?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
											<li><a href="https://plus.google.com/share?url=https://5dapps.com/JOKER/masimanetwork/deltafm/pages/news_details.php?news=<?php echo $title ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<br>
							 			<div class="content"><?php echo $data['post_content']; ?></div>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style end -->
							</div><!-- Col 1 end -->
								
						</div><!-- Row end -->
						<?php

						$tags_query = mysql_query("SELECT * FROM news_tags join tags on news_tags.tags_id = tags.id WHERE news_tags.tags_id = tags.id AND news_tags.news_id = '$news_id'");
						while ($tags_data = mysql_fetch_array($tags_query)) {
						 ?>
						 <!-- Tags Starts here -->
						<button type="button" onclick="searchTags('<?php echo $tags_data['name_tags']; ?>')" class="btn btn-primary" style="background-color: #007bff; padding: 3px; padding-left: 5px;padding-right: 5px; font-size: 10px; ">
							<?php echo $tags_data['name_tags']; ?> 
						</button>
					<?php } ?>
					</div><!-- Block Lifestyle end -->
					<?php
					} 
				}
					 ?>

			</div><!-- Content Col end -->

				<div class="col-lg-4 col-md-12">
					<div class="sidebar sidebar-right">
						<?php include("sidebar_col.php") ?>


						<div class="widget text-center">
							<img class="banner img-fluid" src="../images/banner-ads/ad-sidebar.png" alt="" />
						</div><Sidebar Ad end -->

					</div><!-- Sidebar right end -->
				</div><!-- Sidebar Col end -->
				</div>
			</div><!-- Row end -->
	</section><!-- First block end -->
		
	</div>
<?php include ("page_include_bot.php"); ?>
<script type="text/javascript">
	function searchTags(tags){
		
		window.location.replace('news_page.php?tag='+tags);
		// $.ajax({
		// 	url:"../api/searchTags.php",
		// 	data:{tags_id : tags},
		// 	success: function(result){
		// 		alert(result)
		// 	}
		// });

	}
</script>