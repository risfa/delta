<?php 
session_start();
	require '../dbconnect.php';




	if(isset($_POST['simpan'])){

		$id = $_POST['ID'];
		$nama = $_POST['nama'];



		$simpan = mysql_query("INSERT INTO wadyabala_bigphoto(id,nama) VALUES (NULL,'$nama')");

		$id_music_chart = mysql_insert_id();
		if($simpan){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../prambors_images_assets/wadyabala_big_assets/".$id_music_chart.".jpg");
		// echo('id news '.$id_news);
			// if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../prambors_images_assets/chart_assets/".$id_music_chart.".jpg")) {
			// 	echo "<script>alert('succes upload data')</script>";
			// }else{
			// 	echo "<script>alert('gagal upload')</script>";
			// }
		// // upload
		// 	$target_dir = "../../prambors_images_assets/chart_assets/";
		// 		// $target_file_dir = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		// 		$imageFileType = strtolower(pathinfo($target_file_dir,PATHINFO_EXTENSION));
		// 		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		// 		$uploadOk = 1;

		// 		// Check if image file is a actual image or fake image
		// 		if(isset($_POST["simpan"])) {
		// 		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		// 		    if($check !== false) {
		// 		    	// echo "<script>alert('succes upload image')</script>";
		// 		        // echo "File is an image - " . $check["mime"] . ".";
		// 		        $uploadOk = 1;
		// 		    } else {
		// 		    	echo "<script>alert('gagal upload image')</script>";
		// 		        // echo "File is not an image.";
		// 		        $uploadOk = 0;
		// 		    }
		// 		}

		// 		if ($uploadOk == 0) {
		// 		    echo "Sorry, your file was not uploaded.";
		// 		// if everything is ok, try to upload file
		// 		} else {
		// 		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$id_music_chart.".jpg")) {

		// 		        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		// 		        echo "<script>alert('succes upload image')</script>";
		// 		    } else {
		// 		        // echo "Sorry, there was an error uploading your file.";
		// 		        echo "<script>alert('gagal upload image')</script>";
		// 		    }
		// 		}
		// // end
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='../index.php?menu=wadyabala_big'</script>";
		}else{
			echo "<script>alert('error proses data')</script>";
			echo "<script>document.location.href='../index.php?menu=wadyabala_big'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){

		$id1 = $_POST['ID'];
		$nama1 = $_POST['nama'];


		$sqlupdate = mysql_query("UPDATE wadyabala_bigphoto SET nama='$nama1' WHERE id = '$id1'");
	
		if($sqlupdate){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../prambors_images_assets/wadyabala_big_assets/".$id1.".jpg");

			echo "<script>alert('Data has been Succesfully updated!')</script>";
			echo "<script>document.location.href='../index.php?menu=wadyabala_big'</script>";
		}else{
			echo "<script>alert('error update')</script>";
			echo "<script>document.location.href='../index.php?menu=wadyabala_big'</script>";
}
	}

 ?>