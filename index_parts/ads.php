<!-- right -->
<div class="d-none d-lg-block" style="right: 0 ">
<div class="ads" style="right: 0;" >
	<button class="hide">X</button>
	<?php $ads_query = mysql_fetch_array(mysql_query("SELECT * FROM ads WHERE category = 'HOME_RIGHT' "));
	 ?>
	 <a href=""><img onclick="front_ads_counter(<?php echo $ads_query[0]; ?>)" style="width: 100%;" src="delta_images_assets/ads_slot_assets/<?php echo $ads_query[0] ?>.gif"></a>

</div>
</div>
<!-- left -->
<div class="d-none d-lg-block">
<div class="ads ">
	<button class="hide">X</button>
	<?php $ads_query =mysql_fetch_array(mysql_query("SELECT * FROM ads WHERE category = 'HOME_LEFT' "));
	 ?>
	 <a href=""><img style="width: 100%;" src="delta_images_assets/ads_slot_assets/<?php echo $ads_query[0] ?>.gif"></a>
</div>
</div>
<!-- bottom -->
<div class="ads2" style="top: 88%;
    left: 15%;
    width: 70%;
    height: 10%;">
	<button class="hide2">X</button>
	<?php $ads_query =mysql_fetch_array(mysql_query("SELECT * FROM ads WHERE category = 'HOME_BOTTOM' "));
	 ?>
	 <a href=""><img style="width: 100%;" src="delta_images_assets/ads_slot_assets/<?php echo $ads_query[0] ?>.gif"></a>
</div>


<style>
	.ads
	{
		
		width:10%;
		height: 500px;
		position: fixed;
		z-index: 999999999999999999999999999999999999999999999;
		top: 15%;
	}
	.ads2
	{

		width:10%;
		height: 500px;
		position: fixed;
		z-index: 999999999999999999999999999999999999999999999;
		top: 15%;
	}

</style>


<script>
function front_ads_counter(front_ads_id){
	$.ajax({
		url:"../api/ads_counter.php",
		data:{
			front_ads_id : front_ads_id
		},
		success: function(result){
			alert(result)
		}
	})
}
$(document).ready(function(){
     $(".hide").click(function(){
        $(".ads").hide();
    });
      $(".hide2").click(function(){
        $(".ads2").hide();
    });
   
});
</script>
