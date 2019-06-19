<div class="sidebar sidebar-right">
						<!-- <div class="widget">
							<h3 class="block-title"><span>Share</span></h3>

							<ul class="social-icon">
								<li><a href="http://www.facebook.com/sharer.php?u=https://5dapps.com/JOKER/masimanetwork/deltafm/pages/news_details.php?news=28" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>Widget Social end -->
						<div class="widget color-default">
							<h3 class="block-title"><span>Popular News</span></h3>



							<div class="list-post-block">
								<ul class="list-post">
									<?php
									$popular = mysql_query("SELECT * FROM news ORDER BY post_hits DESC LIMIT 4");
									while($popular_data = mysql_fetch_array($popular)){ 
										$popular_category = mysql_fetch_array(mysql_query("SELECT * FROM news_category JOIN news on news_category.ID_category = '$popular_data[news_category_id]' WHERE news_category.ID_category = '$popular_data[news_category_id]'"));
										$url = urlencode($popular_data['post_title']);
										$popular_date_time = new DateTime($popular_data['post_date']);
									    $popular_date_time = $popular_date_time->format('M d,&\nb\sp Y');
									 ?>
									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="news_details.php?news=<?php echo $url ?>">
													<img onclick="post_popular(<?php echo $popular_data['ID']; ?>)" class="img-fluid" src="../delta_images_assets/news/<?php echo $popular_data['ID'] ?>.jpg" alt="" />
												</a>
												<a class="post-cat" href="#"><?php echo $popular_category['nama']; ?></a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a onclick="post_popular(<?php echo $popular_data['ID']; ?>)" href="news_details.php?news=<?php echo $url ?>"><?php echo substr($popular_data['post_title'],0,30) . '...'; ?></a>
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
						<?php $ads = mysql_query("SELECT * FROM ads WHERE Category = 'SIDEBAR_ADS' LIMIT 3");
							while ($ad = mysql_fetch_array($ads)) {
						 ?>
						<div class="widget text-center">
							<img onclick="side_ads_counter(<?php echo $ad[0]; ?>)" style="width: 100%;" class="banner img-fluid" src="../delta_images_assets/ads_slot_assets/<?php echo $ad[0] ?>.gif" alt="" />
						</div><!-- Sidebar Ad end -->
					<?php } ?>

					</div><!-- Sidebar right end -->

<script type="text/javascript">
function post_popular(post_popular_id){
    $.ajax({
    	url: "../api/update_post_hit.php", 
    	data:{post_id : post_popular_id }, 
    	success: function(result){
		           
	}});		    
}
function side_ads_counter(side_ads_id){
	$.ajax({
		url:"../api/ads_counter.php",
		data:{
			side_ads_id : side_ads_id
		},
		success: function(result){
			alert(result)
		}
	})
}
</script>