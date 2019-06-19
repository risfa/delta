<?php 
	if(isset($_GET['edit'])){
		$data_edit = mysql_fetch_array(mysql_query("SELECT * FROM ads WHERE id = '$_GET[edit]'"));
	}
	if(isset($_POST['update'])){
		$sql_udpate = mysql_query("UPDATE ads SET nama = '$_POST[nama]', category = '$_POST[category]'  WHERE id = '$_GET[edit]'");
		$idget = $_GET['edit'];
		if($sql_udpate){

			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../delta_images_assets/ads_slot_assets/".$idget.".gif");
			echo "<script>alert('Data has been Succesfully updated!')</script>";
			echo "<script>document.location.href='index.php?menu=ads'</script>";
		}
	}
	if(isset($_POST['simpan'])){
		$sql_simpan = mysql_query("INSERT INTO `ads` (`id`, `nama`, `category`) VALUES (null, '$_POST[nama]', '$_POST[category]');");
		$data_gambar = mysql_insert_id();
		// $file = $_FILES['foto_epa']['tmp_name'];
		// $file_upload = move_uploaded_file($file, "../delta_images_assets/epa/12.gif");

		if($sql_simpan){

			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../delta_images_assets/ads_slot_assets/".$data_gambar.".gif");

				
			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='index.php?menu=ads'</script>";
		}
	}

	if(isset($_GET['delete'])){
		$sql_delete= mysql_query("DELETE FROM ads WHERE id = '$_GET[delete]'");
		if($sql_delete){
			        $filePath = "../../delta_images_assets/ads_slot_assets/".$_GET['delete'].".gif";


       // $filePath = $id_foto.".gif";
         if (file_exists($filePath)) 
               {
                    unlink($filePath);
                   "<script>alert('Picture has been Succesfully deleted!')</script>";
              }
              else
              {
                     "<script>alert('Foto tidak ada')</script>";
              }

			echo "<script>alert('Data has been Succesfully Deleted!')</script>";
			echo "<script>document.location.href='index.php?menu=ads'</script>";
		}
	}
 ?>
<!-- HTML -->
<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-4">
    		<h1 style="margin-top: 0px; font-weight: bold; margin-left: 2%;">ADS</h1>
    	</div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-8"></div>
</div>
<br>
<div class="data">
	<div class="col-md-4">
		<form method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Link Banner</label>
				<input type="text" value="<?php echo $data_edit['nama'] ?>" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="category" class="form-control"> 
					<option value="HOME_TOP">1.HOME_BOTTOM</option>
					<option value="HOME_RIGHT">2.HOME_RIGHT</option>
					<option value="HOME_LEFT">3.HOME_LEFT</option>
					<option value="SIDEBAR_ADS">4.SIDEBAR_ADS</option>
					<option value="INPAGE_ADS_EVENT">5.INPAGE_ADS_EVENT</option>
					<option value="INPAGE_ADS_PODCAST">6.INPAGE_ADS_PODCAST</option>
					<option value="MANAGE_PAGE">7.MANAGE_PAGE</option>
					<!-- <option value="RIGHT">5.RIGHT</option> -->
					<!-- <option value="4">4.asdddd</option>
					<option value="5">5.asddddd</option>
					<option value="6">6.asdddddd</option>
					<option value="7">7.asddddddd</option>
					<option value="8">8.asdddddddd</option> -->
				</select>
			</div>
			<div class="form-group">
				<label>Banner Image</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
			</div>
			<div class="form-group">
				<?php if(!$_GET['edit']){ ?>
				<input type="submit" name="simpan" value="SAVE" class="btn btn-success">
				<a href="index.php?menu=ads"><button class="btn btn-danger">CANCEL</button></a>
				<?php }else{ ?>
				<input type="submit" name="update" value="UPDATE" class="btn btn-info">
				<a href="index.php?menu=ads"><button class="btn btn-danger">CANCEL</button></a>

				<?php } ?>
			</div>
		</form>
	</div>
	<div class="col-md-8">
		<table class="table" id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>ID</td>
					<td>Link Banner</td>
					<td>Category</td>
					<td>Date</td>
					<td>Images</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>

				<?php 
				$no = 1;
					$sql = mysql_query("SELECT * FROM ads ");
					while($data= mysql_fetch_array($sql)){
				 ?>
				<tr>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['category']; ?></td>
					<td><?php echo $data['date']; ?></td>
					
						<?php
                    $filename = "../delta_images_assets/ads_slot_assets/".$data['id'].".gif";
                            if (!file_exists($filename)) {
                                

                ?>

                <td><a target="blank" href="../delta_images_assets/ads_slot_assets/if_foto_kosong.gif"><img style="height: 50px; width:50px;" src="../delta_images_assets/epa/if_foto_kosong.gif"></a></td>
                <td>

                    <?php

                            }else{
                                ?>
                <td><a target="blank" href="../delta_images_assets/ads_slot_assets/<?php echo $data['id'];?>.gif"><img style="height: 50px; width:50px;" src="../delta_images_assets/ads_slot_assets/<?php echo $data['id'];?>.gif"></a></td>

                <td>
                            <?php
                            }
                    ?>
                    	
						<a href="index.php?menu=ads&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
						<a onclick="return confirm('Are you sure detele this category')" href="index.php?menu=ads&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
					</td> 


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