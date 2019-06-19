<?php 
session_start();
	require '../dbconnect.php';




	if(isset($_POST['simpan'])){

		$id = $_POST['id'];
		$song_title = addslashes($_POST['song_title']);
		$artist = addslashes($_POST['artist']);
	    $title = addslashes($_POST['title']);
		$genre = addslashes($_POST['genre']);
		$urutan = addslashes($_POST['urutan']);



		$simpan = mysql_query("INSERT INTO nominasi(id,song_title,artist,genre,urutan) VALUES (NULL,'$song_title','$artist','$genre','$urutan')");

		$id_nominasi = mysql_insert_id();
		if($simpan){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../bahana_images_assets/nominasi/".$id_nominasi.".jpg");
		
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='../index.php?menu=nominasi'</script>";
		}else{
			echo "<script>alert('error process data')</script>";
			echo "<script>document.location.href='../index.php?menu=nominasi'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){

		$id = $_POST['id'];
		$song_title = addslashes($_POST['song_title']);
		$artist = addslashes($_POST['artist']);
		$genre = addslashes($_POST['genre']);
		$urutan = addslashes($_POST['urutan']);

		$sqlupdate = mysql_query("UPDATE nominasi SET song_title='$song_title', artist='$artist',  genre='$genre', urutan='$urutan' WHERE id = '$id'");
	
		if($sqlupdate){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../bahana_images_assets/nominasi/".$id.".jpg");

			echo "<script>alert('Data has been Succesfully updated!')</script>";
			echo "<script>document.location.href='../index.php?menu=nominasi'</script>";
		}else{
			echo "<script>alert('failed update data')</script>";
			echo "<script>document.location.href='../index.php?menu=nominasi'</script>";
}
	}

 ?>