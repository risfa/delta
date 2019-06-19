<?php 
session_start();
	require '../dbconnect.php';


	function dataready($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			} 


	if(isset($_POST['simpan'])){

		$title = addslashes($_POST['title']);
		$body = addslashes($_POST['body']);
		$author = $_POST['author'];
		$date = date('Y-m-d h:i:s');
		//$nama = $_SESSION['nama'];



		$simpan = mysql_query("INSERT INTO programs(id,title,body,author,created_at) VALUES(NULL,'$title','$body','$author','$date')");

		$id_program = mysql_insert_id();
		if($simpan){
		// echo('id news '.$id_news);
		// upload
			$target_dir = "../../delta_images_assets/program_assets/";
			
				// $target_file_dir = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$imageFileType = strtolower(pathinfo($target_file_dir,PATHINFO_EXTENSION));
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;

				// Check if image file is a actual image or fake image
				if(isset($_POST["simpan"])) {
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				    	echo "<script>alert('success upload image')</script>";
				        // echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				    	echo "<script>alert('failed upload image')</script>";
				        // echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}

				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$id_program.".jpg")) {

				        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				        echo "<script>alert('success upload image')</script>";
				    } else {
				        // echo "Sorry, there was an error uploading your file.";
				        echo "<script>alert('failed upload image')</script>";
				    }
				}
		// end
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='../index.php?menu=program'</script>";
		}else{
			echo "<script>alert('error proses data')</script>";
			echo "<script>document.location.href='../index.php?menu=program'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){

		$ID = $_POST['id'];
		$title_update = addslashes($_POST['title']);
		$content_update = addslashes($_POST['body']);
		$date_update = date('Y-m-d h:i:s');
		$author_update = $_POST['author'];
		$nama_update = $_SESSION['nama'];


		$sqlupdate = mysql_query("UPDATE programs SET title = '$title_update', body = '$content_update', author = '$author_update', last_update = '$date_update' WHERE id = '$ID'");
		if($sqlupdate){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../delta_images_assets/program_assets/".$ID.".jpg");
			echo "<script>alert('Data has been Succesfully update!')</script>";
			echo "<script>document.location.href='../index.php?menu=program'</script>";
		}else{
			echo "<script>alert('failed update data')</script>";
			echo "<script>document.location.href='../index.php?menu=program'</script>";
}
	}

 ?>