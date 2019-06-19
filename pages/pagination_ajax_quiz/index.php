<HTML>
<HEAD>
<TITLE>AJAX Pagination with PHP</TITLE>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style>
	.link {padding: 10px 15px;background: transparent;border:#95d600 1px solid;border-left:0px;cursor:pointer;color:#95d600; text-decoration: none;}
	.disabled {cursor:not-allowed;color:#95d600;}
	.current {background: #007dff; color: black;}
	.first{border-left:#95d600 1px solid;}
	.question {font-weight:bold;}
	.answer{padding-top: 10px;}
	#pagination{margin-top: 30px; margin-bottom: 40px;}
	.dot {padding: 10px 15px;background: transparent;border-right: #007dff 1px solid;}
	#overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
	#overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
	.page-content {padding: 20px;margin: 0 auto;}
	.pagination-setting {padding:10px; margin:5px 0px 10px;border:#007dff  1px solid;color:#007dff;}
	
    .centered_crop{
        background: linear-gradient(to right, rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%);
    }
</style>
<!-- <script src="http://code.jquery.com/jquery-2.1.1.js"></script> -->
<!-- <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script> -->
<script>
//update post hit
function post(post_id){
    $.ajax({
    	url: "../api/update_post_hit.php", 
    	data:{post_id : post_id }, 
    	success: function(result){
		           
	}});		    
}
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
		beforeSend: function(){$("#overlay").show();},
		success: function(data){

		$("#pagination-result").html(data);
		setInterval(function() {$("#overlay").hide(); },500);
		},
		error: function()
		{}
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("pagination_ajax_quiz/getresult.php");
	}
}
</script>
</HEAD>
<BODY>
<!-- <div id="overlay"><div><img src="loading.gif" width="64px" height="64px"/></div></div> -->
<!-- <div class="page-content">
 -->

	<div id="pagination-result"><br><br>
	<input type="hidden" name="rowcount" id="rowcount" />
	</div>
<!-- </div> -->
<script>
	<?php
	if(isset($_GET['tag'])){
	 ?>
		getresult("pagination_ajax_quiz/getresult.php?tag=<?php echo $_GET['tag'] ?>");
	<?php }else{ ?>
		getresult("pagination_ajax_quiz/getresult.php");		
	<?php } ?>


</script>
</BODY>
</HTML>
