<?php 
session_start();
	require '../dbconnect.php';



	if(isset($_POST['simpan'])){

		$ID = $_POST['ID'];
		$nama = addslashes($_POST['nama']);
		// $jabatan = $_POST['jabatan'];
		// $lokasi = $_POST['lokasi'];
		$link = addslashes($_POST['link']);
	    $keterangan = addslashes($_POST['keterangan']);
	    $urutan = $_POST['urutan'];


		$simpan = mysql_query("INSERT INTO wadyabala(ID,nama,link,keterangan,urutan) VALUES (NULL,'$nama','$link','$keterangan','$urutan')");

		$ID = mysql_insert_id();
		if($simpan){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../delta_images_assets/announcer_assets/".$ID.".png");
		
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='../index.php?menu=announcer'</script>";
		}else{
			echo "<script>alert('error proses data')</script>";
			echo "<script>document.location.href='../index.php?menu=announcer'</script>";
		}
	}

	//UPDATE SIMPAN DATA

	if(isset($_POST['update'])){

		$ID1 = $_POST['ID'];
		$nama1 = addslashes($_POST['nama']);
		$link = addslashes($_POST['link']);
		$keterangan = addslashes($_POST['keterangan']);
		$urutan = $_POST['urutan'];
		



		$sqlupdate = mysql_query("UPDATE wadyabala SET nama='$nama1', link='$link', keterangan='$keterangan', urutan='$urutan' WHERE ID = '$ID1'");
	
		if($sqlupdate){
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../../delta_images_assets/announcer_assets/".$ID1.".png");

			echo "<script>alert('Data has been Succesfully updated! ')</script>";
			echo "<script>document.location.href='../index.php?menu=announcer'</script>";
		}else{
			echo "<script>alert('Error Update ')</script>";
			echo "<script>document.location.href='../index.php?menu=announcer'</script>";
		}
	}

 ?>