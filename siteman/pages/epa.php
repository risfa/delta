<?php 
	if(isset($_GET['edit'])){
		$data_edit = mysql_fetch_array(mysql_query("SELECT * FROM epa WHERE id = '$_GET[edit]'"));
	}
	if(isset($_POST['update'])){
		$kategori_epa = $_POST['kategori_epa'];
		$konten_epa = addslashes($_POST['konten_epa']);
		$judul_epa = addslashes($_POST['judul_epa']);
		$sql_udpate = mysql_query("UPDATE epa SET kategori_epa = '$kategori_epa',konten_epa = '$konten_epa',judul_epa = '$judul_epa'  WHERE id = '$_GET[edit]'");
		$idget = $_GET['edit'];
		
		if($sql_udpate){

			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../bahana_images_assets/epa/".$idget.".jpg");
			echo "<script>alert('Data has been Succesfully update!')</script>";
			echo "<script>document.location.href='index.php?menu=epa'</script>";
		}
	}
	if(isset($_POST['simpan'])){
		$judul_epa = addslashes($_POST['judul_epa']);
		$konten_epa = addslashes($_POST['konten_epa']);
		$kategori_epa = $_POST['kategori_epa'];
		$sql_simpan = mysql_query("INSERT INTO `epa` (`id`, `judul_epa`, `konten_epa`, `kategori_epa`) VALUES ('', '$judul_epa', '$konten_epa', '$kategori_epa');");
		$data_gambar = mysql_insert_id();
		// $file = $_FILES['foto_epa']['tmp_name'];
		// $file_upload = move_uploaded_file($file, "../bahana_images_assets/epa/12.jpg");

		if($sql_simpan){

			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../bahana_images_assets/epa/".$data_gambar.".jpg");

				// // upload
				// $target_dir = "../../bahana_images_assets/epa/";
				// // $target_file_dir = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				// // $imageFileType = strtolower(pathinfo($target_file_dir,PATHINFO_EXTENSION));
				// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				// $uploadOk = 1;

				// // Check if image file is a actual image or fake image
				// if(isset($_POST["simpan"])) {
				//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				//     if($check !== false) {
				//     	echo "<script>alert('succes upload image')</script>";
				//         // echo "File is an image - " . $check["mime"] . ".";
				//         $uploadOk = 1;
				//     } else {
				//     	echo "<script>alert('gagal upload image')</script>";
				//         // echo "File is not an image.";
				//         $uploadOk = 0;
				//     }
				// }

				// if ($uploadOk == 0) {
				//     echo "Sorry, your file was not uploaded.";
				// // if everything is ok, try to upload file
				// } else {
				//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir."123test.jpg")) {

				//         // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				//         echo "<script>alert('succes upload image')</script>";
				//     } else {
				//         // echo "Sorry, there was an error uploading your file.";
				//         echo "<script>alert('gagal upload image')</script>";
				//     }
				// }
		// end



			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='index.php?menu=epa'</script>";
		}
	}

	if(isset($_GET['delete'])){
		$sql_delete= mysql_query("DELETE FROM epa WHERE id = '$_GET[delete]'");
		if($sql_delete){
			echo "<script>alert('Data has been Succesfully Deleted!')</script>";
			echo "<script>document.location.href='index.php?menu=epa'</script>";
		}
	}
 ?>
<!-- HTML -->
<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-4">
    		<h1 style="margin-top: 0px; font-weight: bold; margin-left: 2%;">EVENT PROMO ANNOUCEMENT</h1>
    	</div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-8"></div>
</div>
<div class="data">
	<div class="col-md-4">
		<form method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>EPA Title</label>
				<input type="text" value="<?php echo $data_edit['judul_epa'] ?>" class="form-control" name="judul_epa">
			</div>
			<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="kategori_epa">
					<option value="Annoucement">Annoucement</option>
					<option value="Events">Events</option>
					<option value="Promotion">Promotion</option>
				</select>
			</div>
			<!-- <input type="hidden" name="kategori_epa" value="A/nnoucement"> -->
			<div class="form-group">
				<label>EPA Content</label>
				<textarea name="konten_epa" class="ckeditor form-" datas="3">
					<?php echo $data_edit['konten_epa'] ?>
				</textarea>
			</div>

			<div class="form-group">
				<label>Picture</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
			</div>
			<div class="form-group">
				<?php if(!$_GET['edit']){ ?>
				<input type="submit" name="simpan" value="SAVE" class="btn btn-success">
				<a href="index.php?menu=epa"><button class="btn btn-danger">CANCEL</button></a>
				<?php }else{ ?>
				<input type="submit" name="update" value="UPDATE" class="btn btn-success">
				<a href="index.php?menu=epa"><button class="btn btn-danger">CANCEL</button></a>

				<?php } ?>
			</div>
		</form>
	</div>
	<div class="col-md-8">
		<table class="table" id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>ID</td>
					<td>EPA Title</td>
					<td>EPA Content</td>
					<td>EPA Category</td>
					<td>Image</td>
					<td>Action</td>
					<td>Preview</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
					$sql = mysql_query("SELECT * FROM epa ");
					while($data= mysql_fetch_array($sql)){
				 ?>
				<tr>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['judul_epa']; ?></td>
					<td><?php echo $data['konten_epa']; ?></td>
					<td><?php echo $data['kategori_epa']; ?></td>
					<!-- <td><a target="blank" href="../bahana_images_assets/epa/<?php echo $data['id'];?>.jpg"><img style="height: 50px; width:50px;" src="../bahana_images_assets/epa/<?php echo $data['id'];?>.jpg"></a></td>
					<td>
						<a href="index.php?menu=epa&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
						<a onclick="return confirm('Are you sure detele this category')" href="index.php?menu=epa&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
					</td> -->


						<?php
                    $filename = "../bahana_images_assets/epa/".$data['id'].".jpg";
                            if (!file_exists($filename)) {
                                

                ?>

                <td><a target="blank" href="../bahana_images_assets/epa/if_foto_kosong.jpg"><img style="height: 50px; width:50px;" src="../bahana_images_assets/epa/if_foto_kosong.jpg"></a></td>
                <td>

                    <?php

                            }else{
                                ?>
                <td><a target="blank" href="../bahana_images_assets/epa/<?php echo $data['id'];?>.jpg"><img style="height: 50px; width:50px;" src="../bahana_images_assets/epa/<?php echo $data['id'];?>.jpg"></a></td>

                <td>
                            <?php
                            }
                    ?>
                    	
						<a href="index.php?menu=epa&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
						<a onclick="return confirm('Are you sure detele this category')" href="index.php?menu=epa&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
					</td> 


				<td><a target="_blank" href="https://bahanafm.co.id/newsite/pages/event_details.php?details=<?php echo $data['id'] ?>"><i class="fa fa-search"></i>&nbsp;</a></td>
				</tr>
				<?php $no++; } ?>

			</tbody>
		</table>
	</div>
</div>



	<script>
    $(document).ready(function() {
	   $('#example').DataTable();
	} );

	</script>