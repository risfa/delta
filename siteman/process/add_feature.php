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
		$feature_title = addslashes($_POST['post_tittle']);
		$feature_content = addslashes($_POST['feature_content']);
		$feature_author = $_POST['post_author'];
		$category = $_POST['category'];

		// $jumlah_hadiah = $_POST['jumlah_hadiah'];
		// $prosentase_menang = $_POST['prosentase_menang'];
		// $status_hadiah = $_POST['status_hadiah'];
		// $kategori_hadiah = $_POST['kategori_hadiah'];
		// $hadiah_spesial = $_POST['hadiah_spesial'];
		// $id_spbu = $_POST['id_spbu'];
		$date = date('Y-m-d h:i:s');
		//$nama = $_SESSION['nama'];



		$simpan = mysql_query("INSERT INTO features(id,feature_title,feature_content,feature_author,feature_category_id,created_at) VALUES (NULL,'$feature_title','$feature_content','$feature_author','$category','$date')");

		$id_features = mysql_insert_id();
		if($simpan){
			foreach ($_POST['tags'] as $tag) {
			 	$insert_tag = mysql_query("INSERT INTO features_tags(tags_id,features_id) VALUES('$tag','$id_features')");
			}
		// echo('id news '.$id_news);
		// upload
			$target_dir = "../../delta_images_assets/features/";
				// $target_file_dir = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$imageFileType = strtolower(pathinfo($target_file_dir,PATHINFO_EXTENSION));
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;

				// Check if image file is a actual image or fake image
				if(isset($_POST["simpan"])) {
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				    	echo "<script>alert('success sada upload image')</script>";
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
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$id_features.".jpg")) {

				        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				        echo "<script>alert('success upload image')</script>";
				    } else {
				        // echo "Sorry, there was an error uploading your file.";
				        echo "<script>alert('failed upload image')</script>";
				    }
				}
		// end
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='../index.php?menu=feature'</script>";
		}else{
			echo "<script>alert('error proses data')</script>";
			echo "<script>document.location.href='../index.php?menu=feature'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){
		//print_r($_POST);die();

		$ID = $_POST['ID'];
		$post_tittle_update = addslashes($_POST['post_tittle']);
		$post_content_update = addslashes($_POST['feature_content']);
		$date_update = date('Y-m-d h:i:s');
		$nama_update = $_SESSION['nama'];
		$category = $_POST['category'];
		$post_author = $_POST['post_author'];

		//echo $post_content_update;die();

		$sqlupdate = mysql_query("UPDATE features SET feature_author = '$post_author',feature_content='$post_content_update', feature_title='$post_tittle_update', feature_category_id='$category' WHERE id = '$ID'");
		if($sqlupdate){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../delta_images_assets/features/".$ID.".jpg");
			echo "<script>alert('Data has been Succesfully update!')</script>";
			echo "<script>document.location.href='../index.php?menu=feature'</script>";
		}else{
			echo "<script>alert('failed update data')</script>";
			echo "<script>document.location.href='../index.php?menu=feature'</script>";
}
	}

 ?>