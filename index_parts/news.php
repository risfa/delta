
<br>
<div class="row" style="margin-top:3vh; background-color: white;border-radius: 5px;">
	<div class="col-md-8" style=""> <h3 style="font-weight: bolder;padding-top: 0.5%;padding-bottom: 1%; margin-bottom: 0px; color: rgba(0, 92, 185, 1); font-family: nexabold;"> WHAT'S NEW</h3></div>
	<div class="col-md-4 d-none d-lg-block">
		<center style="padding-top: 2%;"; >
		<span><a  class="cate" onclick="fetch('music')" style ="font-family: nexabold;">MUSIC</a></span>&nbsp&nbsp
		<span><a class="cate"  onclick="fetch('lifestyle')" style ="font-family: nexabold;">LIFESTYLE</a></span>&nbsp&nbsp
		<span><a class="cate" onclick="fetch('sport')" style ="font-family: nexabold;">SPORT</a></span>&nbsp&nbsp
		</center>
	</div>
	<div class="col-12 d-block d-lg-none ">
		
		<span><a  class="cate" onclick="fetch('music')" style ="font-family: nexabold;">MUSIC</a></span>&nbsp&nbsp
		<span><a class="cate"  onclick="fetch('lifestyle')" style ="font-family: nexabold;">LIFESTYLE</a></span>&nbsp&nbsp
		<span><a class="cate" onclick="fetch('sport')" style ="font-family: nexabold;">SPORT</a></span>&nbsp&nbsp
		
	</div>
</div>


<!-- <div id="hasil_result"></div> -->

<div id="hasil_result" class="row" style="background-color: white;padding-top: 1%;margin-top:1vh;padding-bottom: 1%;">
	
</div>

<div class="row" style="background-color: white; margin-top: 5px;">
	<div class="container">
	<center><a href="pages/news_page.php"><h4 style="font-weight: bolder; color: rgb(149,214,0); padding-top: 1%; ">VIEW MORE</h4></a></center>
	<a href="pages/news_page.php"><h4 style="font-weight: bolder; color: rgb(149,214,0); padding-top: 1%; text-align:right; ">MAKE YOUR OWN!</h4></a>
	</div>
</div>

<br>


<style >
.cate
{
	color: black;
}
	.cate:hover
	{
		
		border-bottom: 2px rgba(0, 92, 185, 1) solid;

	}
</style>
<script type="text/javascript">
fetch('all');
function fetch(category){
		// $.ajax({url:"api/fetch_category.php", data:{category : category }, function(result){
		// 	alert('sudah berjalan');
		// 	console.log(result);
		// 	$('#hasil_result').html('BABAK');
		// }})

		$.get('api/fetch_category.php?category='+category ,  function(result){

			$('#hasil_result').html(result);
		});
}
</script>