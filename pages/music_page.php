<?php include ("page_include.php"); include ('../dbconnect.php'); ?>
<div class="row" style="margin-top: 1%; margin-left: 9%; margin-right: 9%">
	<div class="row">
		<section class="block-wrapper">
			<div class="row" style="background-color: white; padding-top: 1%; padding-bottom: 2%;margin-top: -3%;">

				<div class="col-lg-8 col-md-12">
					<div class="block category-listing">
						<h3 class="block-title"><span style="background-color:rgba(0, 92, 185, 1) ">Music Top 20</span></h3>
						<div class="row">
							<div class="col-12">
								<div class="post-block-style post-grid clearfix">
									<div class="post-thumb">
								
									</div>
									<div class="post-content">
										<table style="width: 100%;">
										<tr style="border-bottom: 3px solid rgb(149,214,0); font-family: nexabold; height: 7vh ">
											<th>#</th>
											<th style="width: 150px"></th>
											<th></th>
											<center><th style="font-weight: bolder; font-family: nexabold;text-align: center;">SONG TITLE</th></center>
											<center><th style="font-weight: bolder; font-family: nexabold;text-align: center;" >ARTIST</th></center>
											<!-- <th style="font-weight: bolder; font-family: nexabold;" >ALBUM</th> -->
											<center><th style="width: 150px;font-weight: bolder; font-family: nexabold;" ></th></center>
											<th style="width:150px;font-weight: bolder; font-family: nexabold;" ></th>
											<th style="width: 50px;"></th>
										</tr>
										<?php
										$query_music = mysql_query("SELECT * FROM music_chart ORDER BY rank ASC LIMIT 20");
										$no = 1;
										while ($data = mysql_fetch_array($query_music)) {
										 ?>
											<tr style="border-bottom: 3px solid rgb(149,214,0); height: 10vh; ">
												<td style="font-size: 25px; font-weight: bolder"><?php echo $data['rank']; ?></td>
												<td style="width: 75px; padding-top: 10px; padding-bottom: 10px;"><img style="width: 120px; height: 120px;" src="../delta_images_assets/chart_assets/<?php echo $data['id'];?>.jpg"></div></td>

												<td style="width: 100px;"><img <?php if($data['status'] == 'Up'){ ?> src="../delta_images_assets/chart_assets/chart_up.png" <?php 
											}elseif ($data['status'] == 'Down') { ?>
												src="../delta_images_assets/chart_assets/chart_down.png" <?php } else{ ?> src="../delta_images_assets/chart_assets/chart_stay.png" <?php } ?> width="30px" height="30px" style=""></td>

												<td style="font-weight: bolder;text-align: center;"><?php echo $data['title']; ?></td>

												<center><td style="font-weight: bolder; text-align: center;"><?php echo $data['artist']; ?></td></center>

												<!-- <td style="font-weight: bolder" ><?php echo $data['album']; ?></td> -->

												<td style="font-weight: bolder" >
													<audio id="playAudio<?php echo $no;?>">
														<source src="../delta_music_assets/<?php echo $data['id'];?>.mp3" type="audio/mpeg">				
														</audio>
														<center>
															<button id="play<?php echo $no;  ?>" onclick="playAudio<?php echo $no;?>(<?php echo $data['id']; ?>)" style="border:none; background-color: rgb(149,214,0); font-family: nexabold;color: white;">LISTEN
														</button>
													    </center>
														<center><button id="pause<?php echo $no;  ?>" onclick="pauseAudio<?php echo $no;?>(<?php echo $data['id']; ?>)" style="border:none; background-color: rgb(149,214,0); font-family: nexabold; display: none;color: white;">STOP
														</button></center>
													</td>

													<td style="font-weight: bolder;border: none; color: rgb(149,214,0) ;" ><a style="color:rgb(149,214,0) ; " target="_blank" href="<?php echo $data['lyrics'] ?>">LYRICS</a></td>

													<td style="width: 60px">
														<i class="fa fa-spotify" aria-hidden="true"></i><br>
														<i class="fa fa-youtube-play" aria-hidden="true"></i><br>
														<i class="fa fa-music" aria-hidden="true"></i>
												    </td>
											</tr>

										<?php $no++; 
									     } ?>
											</table>
										</div><!-- Post content end -->
									</div><!-- Post Block style end -->
								</div><!-- Col 1 end -->
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
<script>
// $(document).ready(function(){

//     $("#tog").click(function(){
//     	$(".chart2").toggle();
//     });
 
// });

<?php
$no = 1; 
while ($no <=12) {
 ?>

var Audio<?php echo $no; ?> = document.getElementById('playAudio<?php echo $no;?>');
function playAudio<?php echo $no; ?>(id){
	//Stop Other Audio Playing
<?php 
	for ($i = 1; $i <= 10; $i++) {
?>
	 Audio<?php echo $i; ?>.pause();
	 Audio<?php echo $i; ?>.currentTime = 0;
	 document.getElementById('pause<?php echo $i;?>').style.display = "none";
	 document.getElementById('play<?php echo $i;?>').style.display = "inline";
	

<?
	 } 
?>
	Audio<?php echo $no;?>.play();
	document.getElementById('play<?php echo $no;?>').style.display = "none";
	document.getElementById('pause<?php echo $no;?>').style.display = "inline";
	
	Audio<?php echo $no;?>.onended = function () {
		document.getElementById('pause<?php echo $no;?>').style.display = "none";
	    document.getElementById('play<?php echo $no;?>').style.display = "inline";
	   
	    
	}
	$.ajax({url: "../api/get_music_play.php", data:{ip_address : '<?php echo $_SERVER['REMOTE_ADDR']; ?>', music_id: id , action: 'play music' }, success: function(result){
	 		
	 }});
}

function pauseAudio<?php echo $no;  ?>(id){
	Audio<?php echo $no; ?>.pause();
	document.getElementById('pause<?php echo $no;?>').style.display = "none";
	document.getElementById('play<?php echo $no;?>').style.display = "inline";
	
	$.ajax({url: "../api/get_music_play.php", data:{ip_address : '<?php echo $_SERVER['REMOTE_ADDR']; ?>', music_id: id , action: 'pause music' }, success: function(result){
	 		
	 }});
}
<?php $no++; }?>
</script>