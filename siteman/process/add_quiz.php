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

		$post_title = addslashes($_POST['post_title']);
		$post_content = addslashes($_POST['post_content']);
		$category = $_POST['category'];
		$post_author = $_POST['post_author'];
		// $jumlah_hadiah = $_POST['jumlah_hadiah'];
		// $prosentase_menang = $_POST['prosentase_menang'];
		// $status_hadiah = $_POST['status_hadiah'];
		// $kategori_hadiah = $_POST['kategori_hadiah'];
		// $hadiah_spesial = $_POST['hadiah_spesial'];
		// $id_spbu = $_POST['id_spbu'];
		$date = date('Y-m-d h:i:s');
		$nama = $_SESSION['nama'];



		$simpan = mysql_query("INSERT INTO quiz(ID_quiz,post_author,post_date,post_content,post_title,pembuat) VALUES (NULL,'$post_author','$date','$post_content','$post_title','$nama')");

		$id_news = mysql_insert_id();
		if($simpan){
			// foreach ($_POST['tags'] as $tag) {
			//  	$insert_tag = mysql_query("INSERT INTO quiz_tags(quiz_id,quiz_tags_id) VALUES('$quiz_id','$quiz_tags_id')");
			// }
		// echo('id news '.$id_news);
		// upload
			$target_dir = "../../delta_images_assets/quiz/";
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
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$id_news.".jpg")) {

				        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				        echo "<script>alert('success upload image')</script>";
				    } else {
				        // echo "Sorry, there was an error uploading your file.";
				        echo "<script>alert('failed upload image')</script>";
				    }
				}
		// end
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='../index.php?menu=quiz'</script>";
		}else{
			echo "<script>alert('error proses data')</script>";
			echo "<script>document.location.href='../index.php?menu=quiz'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){

		$ID_quiz = $_POST['ID_quiz'];
		$post_title_update = addslashes($_POST['post_title']);
		$post_content_update = addslashes($_POST['post_content']);
		$date_update = date('Y-m-d h:i:s');
		// $nama_update = $_SESSION['nama'];
		// $quiz_category_id = $_POST['quiz_category_id'];
		$post_author = $_POST['post_author'];


		$sqlupdate = mysql_query("UPDATE quiz SET last_update = '$date_update',post_author = '$post_author', post_content='$post_content_update', post_title='$post_title_update' WHERE ID_quiz = '$ID_quiz'");
		if($sqlupdate){
			// $check_id = mysql_query("SELECT * FROM quiz_tags WHERE quiz_id = '$ID_quiz'");
			// if(mysql_num_rows($check_id) <= 0 ){
			// 	foreach ($_POST['tags'] as $tag) {
			//  	$insert_tag = mysql_query("INSERT INTO quiz_tags(quiz_id,quiz_tags_id) VALUES('$quiz_id','$quiz_tags_id')");
			// 	}
			// }else{
			// 	mysql_query("DELETE FROM quiz_tags WHERE quiz_id = '$ID_quiz'");
			// 	foreach ($_POST['tags'] as $tag) {
			// 		$insert_tag = mysql_query("INSERT INTO quiz_tags(quiz_id,quiz_tags_id) VALUES('$quiz_id','$quiz_tags_id')");
			 	// $update_tag = mysql_query("UPDATE news_tags SET tags_id = '$tag', news_id = '$ID' WHERE id = '$ID'");
			// 	}
			// }
			
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../delta_images_assets/quiz/".$ID_quiz.".jpg");
			echo "<script>alert('Data has been Succesfully update!')</script>";
			echo "<script>document.location.href='../index.php?menu=quiz'</script>";
		}else{
			echo "<script>alert('failed update data')</script>";
			echo "<script>document.location.href='../index.php?menu=quiz'</script>";
}
	}

 ?>