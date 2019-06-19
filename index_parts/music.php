<div class="row" style="margin-top: 2vh; background-color: white;border-radius: 5px;">
	<div class="col-12" style=""> <h3 style="font-weight: bolder;padding-top: 1%;padding-bottom: 1%; margin-bottom: 0px; color: rgba(0, 92, 185, 1);font-family: nexabold; ">CHART DELTA (DERETAN LAGU TERENAK)</h3></div>
</div>
<br>


<div class="row d-none d-lg-block" id="chart1" style="padding-left: 5%; padding-right: 5%;padding-top:1%; background-color: white;padding-bottom: 5%;">
	
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
	$sql = mysql_query("SELECT * FROM music_chart ORDER BY rank ASC LIMIT 5");
	$no = 1;
	while ($data = mysql_fetch_array($sql)) {
	$lyrics = $data['artist'] . " " . $data['title'];		
?>
        
	<tr style="border-bottom: 3px solid rgb(149,214,0); height: 10vh; ">
		<td style="font-size: 25px; font-weight: bolder"><?php echo $data['rank']; ?></td>
		<td style="width: 75px; padding-top: 10px; padding-bottom: 10px;"><img style="width: 120px; height: 120px;" src="delta_images_assets/chart_assets/<?php echo $data['id'];?>.jpg"></div></td>
		<td style="width: 100px;"><img <?php if($data['status'] == 'Up'){ ?> src="delta_images_assets/chart_assets/chart_up.png" <?php 
	     }elseif ($data['status'] == 'Down') { ?>
		 	src="delta_images_assets/chart_assets/chart_down.png" <?php } else{ ?> src="delta_images_assets/chart_assets/chart_stay.png" <?php } ?> width="30px" height="30px" style=""></td>
		<td style="font-weight: bolder;text-align: center;"><?php echo $data['title']; ?></td>
		<center><td style="font-weight: bolder; text-align: center;"><?php echo $data['artist']; ?></td></center>
		<!-- <td style="font-weight: bolder" ><?php echo $data['album']; ?></td> -->
		<td style="font-weight: bolder" >
			<audio id="playAudio<?php echo $no;?>">
			    <source src="delta_music_assets/<?php echo $data['id'];?>.mp3" type="audio/mpeg">				
		    </audio>
			 <center><button  " id="play<?php echo $no;  ?>" onclick="playAudio<?php echo $no;?>(<?php echo $data['id']; ?>)" style="border:none; background-color: rgb(149,214,0); font-family: nexabold;color: white;">LISTEN
			</button></center>
			<center><button id="pause<?php echo $no;  ?>" onclick="pauseAudio<?php echo $no;?>(<?php echo $data['id']; ?>)" style="border:none; background-color: rgb(149,214,0); font-family: nexabold; display: none;color: white;">STOP
			</button></center>
		</td>
		<td style="font-weight: bolder;border: none; color: rgb(149,214,0) ;" ><a style="color:rgb(149,214,0) ; " target="_blank" href="<?php echo['lyrics'] ?>">LYRICS</a></td>
		<td style="width: 60px"><i class="fa fa-spotify" aria-hidden="true"><br>
			<i class="fa fa-youtube-play" aria-hidden="true"></i><br>
			<i class="fa fa-music" aria-hidden="true"></i>

		</i>
</td>
	</tr>
<?php $last_rank = $data['rank'];
$no++;
	}
?>
</table>

</div>



<!-- mobile -->

<div class="row d.block d-lg-none"  style="padding-left: 5%; padding-right: 5%;padding-top:3%; background-color: white;padding-bottom: 5%;">

	<div  class="row" style="margin: 0;">	
<?php 
		$count = 1;
		$sql_pertama = mysql_query("SELECT * FROM music_chart ORDER BY rank LIMIT 5");
	    while ($data_pertama = mysql_fetch_array($sql_pertama)) {
		?>	
		<div style="margin-top: 4%; border-bottom: 2px rgba(0, 92, 185, 1) solid;padding-bottom: 3px; width: 100%;" class="row">	
			<div class="col-4" id="chart1" style="padding: 0;margin: auto;"><img style="width: 100%;" src="delta_images_assets/chart_assets/<?php echo $data_pertama['id'];?>.jpg">
				<center><div style="font-weight: bolder;"><?php echo $data_pertama['rank'] ?></div></center>
				<audio id="playAudio<?php echo $count;?>">
			    	<source src="delta_music_assets/<?php echo $data_pertama['id'];?>.mp3" type="audio/mpeg">				
		    	</audio>
		    	<center >
		    		<button id="playMobile<?php echo $count; ?>" onclick="playAudio<?php echo $count;?>(<?php echo $data_pertama['id'];?>)" style="margin-top: 5px;background-color:rgb(149,214,0) ; border: none; color: white">LISTEN
		    		</button>
		    	</center>
		    	<center>
		    		<button id="pauseMobile<?php echo $count;  ?>" onclick="pauseAudio<?php echo $count;?>(<?php echo $data_pertama['id'];?>)" style="margin-top: 5px; display: none;background-color:rgb(149,214,0) ; border: none; color: white">STOP
					</button>
		    	</center>
			</div>
				<div class="col-8" style="padding: 0;margin: auto;">
					<div class="col-12" style="width: 100%"><?php echo $data_pertama['title']; ?></div>
					<hr style="margin: 10px;">	
					<div class="col-12" style="width: 100%"><?php echo $data_pertama['artist']; ?></div>
					<hr style="margin: 10px;">	
					<!-- <div class="col-12" style="width: 100%;"><?php echo $data_pertama['album']; ?></div> -->
				</div>
		</div>
		<?php
		$count++;
		} 
		?>
	</div>

</div>



















<div class="row" style="margin-top: 5px; background-color: white;">
	<div class="container">
		<center>
			<a href="pages/music_page.php"><button id="tog" class="togg" style="padding-top: 2%;padding-bottom: 2%;color: rgb(149,214,0); font-weight: bolder; background: none; border:none; cursor: pointer;"  >VIEW MORE</button></center></a>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

    $("#tog").click(function(){
    	$(".chart2").toggle();
    });
 
});

<?php
$no = 1; 
while ($no <=10) {
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
	 document.getElementById('playMobile<?php echo $i;?>').style.display = "inline";
	 document.getElementById('pauseMobile<?php echo $i;?>').style.display = "none";

<?phhttps://open.spotify.com/track/0GmfYAOe7Y3vIv4lKdaeOAp
	 } 
?>
	Audio<?php echo $no;?>.play();
	document.getElementById('play<?php echo $no;?>').style.display = "none";
	document.getElementById('pause<?php echo $no;?>').style.display = "inline";
	document.getElementById('playMobile<?php echo $no;?>').style.display = "none";
	document.getElementById('pauseMobile<?php echo $no;?>').style.display = "inline";
	Audio<?php echo $no;?>.onended = function () {
		document.getElementById('pause<?php echo $no;?>').style.display = "none";
	    document.getElementById('play<?php echo $no;?>').style.display = "inline";
	    document.getElementById('pauseMobile<?php echo $no;?>').style.display = "none";
	    document.getElementById('playMobile<?php echo $no;?>').style.display = "inline";
	    
	}
	$.ajax({url: "api/get_music_play.php", data:{ip_address : '<?php echo $_SERVER['REMOTE_ADDR']; ?>', music_id: id , action: 'play music' }, success: function(result){
	 		
	 }});
}

function pauseAudio<?php echo $no;  ?>(id){
	Audio<?php echo $no; ?>.pause();
	document.getElementById('pause<?php echo $no;?>').style.display = "none";
	document.getElementById('play<?php echo $no;?>').style.display = "inline";
	document.getElementById('pauseMobile<?php echo $no;?>').style.display = "none";
	document.getElementById('playMobile<?php echo $no;?>').style.display = "inline";
	$.ajax({url: "api/get_music_play.php", data:{ip_address : '<?php echo $_SERVER['REMOTE_ADDR']; ?>', music_id: id , action: 'pause music' }, success: function(result){
	 		
	 }});
}
<?php $no++; }?>
</script>
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
			 $.ajax({url: "api/get_page_user.php",data:{ip_address : '<?php echo $_SERVER['REMOTE_ADDR']; ?>'} ,  success: function(result){
		            
		        }});
		},3000)
	})
</script>
</div>
</div>

<style>
	.chart2
	{
		display: none;
	}

	.togg:hover
	{
		background-color: red;
	}
</style>
