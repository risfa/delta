<?php 
session_start();
	require '../dbconnect.php';

	if(isset($_POST['simpan'])){

		$id = $_POST['id'];
		$title = addslashes($_POST['title']);
		$artist = addslashes($_POST['artist']);
		$genre = addslashes($_POST['genre']);
		$album = addslashes($_POST['album']);
		$rank = addslashes($_POST['rank']);
		$status = addslashes($_POST['status']);
		$lyrics = $_POST['lyrics'];
		$last_week = $_POST['last_week'];
		$weeks_in_chart = $_POST['weeks_in_chart'];
		$link_spotify = $_POST['link_spotify'];
		$link_youtube = $_POST['link_youtube'];
		$link_Itunes = $_POST['link_Itunes'];


		$simpan = mysql_query("INSERT INTO music_chart(id,title,artist,album,genre,rank,status,lyrics,last_week,weeks_in_chart,link_spotify,link_youtube,link_Itunes) VALUES (NULL,'$title','$artist','$album','$genre','$rank','$status','$lyrics','$last_week','$weeks_in_chart','$link_spotify','$link_youtube','$link_Itunes')");

		$id_music_chart = mysql_insert_id();
		if($simpan){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../delta_images_assets/chart_assets/".$id_music_chart.".jpg");
			move_uploaded_file($_FILES["music_file"]["tmp_name"],"../../delta_music_assets/".$id_music_chart.".mp3");
		
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='../index.php?menu=music_chart'</script>";
		}else{
			echo "<script>alert('error process data')</script>";
			echo "<script>document.location.href='../index.php?menu=music_chart'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){

		$id = $_POST['ID'];
		$title = addslashes($_POST['title']);
		$artist = addslashes($_POST['artist']);
	    $album = addslashes($_POST['album']);
		$genre = addslashes($_POST['genre']);
		$rank = addslashes($_POST['rank']);
		$status = addslashes($_POST['status']);
		$lyrics = $_POST['lyrics'];
		$last_week = addslashes($_POST['last_week']);
		$weeks_in_chart = addslashes($_POST['weeks_in_chart']);
		$link_Itunes = $_POST['link_Itunes'];
		$link_youtube = $_POST['link_youtube'];
		$link_spotify = $_POST['link_spotify'];
		$id_music_chart = $id;

		$sqlupdate = mysql_query("UPDATE music_chart SET title='$title', artist='$artist', album='$album', genre='$genre', rank='$rank', status = '$status', lyrics = '$lyrics' ,last_week = '$last_week', weeks_in_chart = '$weeks_in_chart', link_spotify = '$link_spotify', link_youtube = '$link_youtube', link_Itunes = '$link_Itunes' WHERE id = '$id'");
	
		if($sqlupdate){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../delta_images_assets/chart_assets/".$id.".jpg");
			move_uploaded_file($_FILES["music_file"]["tmp_name"],"../../delta_music_assets/".$id_music_chart.".mp3");

			echo "<script>alert('Data has been Succesfully updated!')</script>";
			echo "<script>document.location.href='../index.php?menu=music_chart'</script>";
		}else{
			echo "<script>alert('failed update data')</script>";
			echo "<script>document.location.href='../index.php?menu=music_chart'</script>";
}
	}

 ?>