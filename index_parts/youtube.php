<div class="row" style="margin-top: 2vh; background-color: white;border-radius: 5px;background-color: white; padding-top: 3%;padding-bottom: 2%;">
	<div class="col-8" style=""> <h3 style="font-weight: bolder; margin-bottom: 0px; color: rgba(0, 92, 185, 1);font-family: nexabold; ">YOUTUBE VIDEOS</h3></div>
	<div class="col-4"><label style="float: right; font-weight: bolder">View All</label></div>
</div>
<br>
<div class="row">
	<div class="container" style="background-color: white; padding: 5%;">
		<?php
		$first_video_sql = mysql_query("SELECT * FROM video_galery WHERE urutan = 1");
		while ($first_video = mysql_fetch_array($first_video_sql)) {
		 ?>
		<div class="embed-responsive embed-responsive-16by9 "><iframe class="embed-responsive-item" src="<?php echo $first_video['link'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
	    <?php
	      } 
	    ?>
			<br><br>
		<div class="row ">
		<?php
			$sql = mysql_query("SELECT * FROM video_galery WHERE urutan > 1 LIMIT 3");
			while($data = mysql_fetch_array($sql)){
		 ?>
			<div class="col-md-4 d-none d-md-block">
				<div class="embed-responsive embed-responsive-16by9 "><iframe class="embed-responsive-item" src="<?php echo $data['link']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
			</div>
			<!-- <div class="col-md-3 d-none d-sm-block">
				<div class="embed-responsive embed-responsive-16by9 "><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rJNkttp9Bxc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
			</div>
			<div class="col-md-3 d-none d-sm-block">
				<div class="embed-responsive embed-responsive-16by9 "><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rJNkttp9Bxc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
			</div>
			<div class="col-md-3 d-none d-sm-block">
				<div class="embed-responsive embed-responsive-16by9 "><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rJNkttp9Bxc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
			</div> -->
		<?php } ?>
		</div>
	</div>
</div>
