<?php 
session_start();
	require '../dbconnect.php';




	if(isset($_POST['simpan'])){

		$id = $_POST['ID'];
		$nama_show = $_POST['nama_show'];
		$jam_tayang = $_POST['jam_tayang'];
		$jam_tayang2 = $_POST['jam_tayang2'];
		$Hari = $_POST['Hari'];



		$simpan = mysql_query("INSERT INTO listing_streaming(id_show,nama_show,jam_tayang,jam_tayang2) VALUES (NULL,'$nama_show','$jam_tayang','$jam_tayang2')");

		$id_music_chart = mysql_insert_id();
		if($simpan){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../prambors_images_assets/show_list_assets/".$id_music_chart.".jpg");
		
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='../index.php?menu=show_list'</script>";
		}else{
			echo "<script>alert('error process data')</script>";
			echo "<script>document.location.href='../index.php?menu=show_list'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){

		$id1 = $_POST['ID'];
		$nama_show1 = $_POST['nama_show'];
		$jam_tayang1 = $_POST['jam_tayang'];
		$jam_tayang2 = $_POST['jam_tayang2'];
		


		$sqlupdate = mysql_query("UPDATE listing_streaming SET nama_show='$nama_show1', jam_tayang='$jam_tayang1', jam_tayang2='$jam_tayang2' WHERE id_show = '$id1'");
	
		if($sqlupdate){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../prambors_images_assets/show_list_assets/".$id1.".jpg");

			echo "<script>alert('Data has been Succesfully updated!')</script>";
			echo "<script>document.location.href='../index.php?menu=show_list'</script>";
		}else{
			echo "<script>alert('error update')</script>";
			echo "<script>document.location.href='../index.php?menu=show_list'</script>";
}
	}

 ?>