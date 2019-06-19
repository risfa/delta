<?php 
	if(isset($_GET['edit'])){
		$data_edit = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '$_GET[edit]'"));
	}
	if(isset($_POST['update'])){
		$sql_udpate = mysql_query("UPDATE users SET nama ='$_POST[nama]',username ='$_POST[username]',password = md5('$_POST[password]'),credential ='$_POST[credential]'  WHERE id = '$_GET[edit]'");
		$idBannerget = $_GET['edit'];
		if($sql_udpate){
			echo "<script>alert('Data has been Succesfully updated!')</script>";
			echo "<script>document.location.href='index.php?menu=admin'</script>";
		}
	}
	if(isset($_POST['simpan'])){
		$sql_simpan = mysql_query("INSERT INTO users(id,nama,username,password,credential) VALUES(NULL, '$_POST[nama]', '$_POST[username]', md5('$_POST[password]'), '$_POST[credential]')");
		
		if($sql_simpan){

			echo "<script>alert('Data has been Succesfully saved!')</script>";
			echo "<script>document.location.href='index.php?menu=admin'</script>";
		}
	}

	if(isset($_GET['delete'])){
		$sql_delete= mysql_query("DELETE FROM users WHERE id = '$_GET[delete]'");
		if($sql_delete){

			echo "<script>alert('Data has been Succesfully Deleted!')</script>";
			echo "<script>document.location.href='index.php?menu=admin'</script>";
		}
	}
 ?>
<!-- HTML -->
<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-4">
    		<h1 style="margin-top: 0px; font-weight: bold; margin-left: 2%;">MANAGE ADMIN</h1>
    	</div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-8"></div>
</div>
<br>
<div class="data">
	<div class="col-md-4">
		<form method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Name</label>
				<input type="text" value="<?php echo $data_edit['nama'] ?>" class="form-control" name="nama">
				<label>Username</label>
				<input type="text" value="<?php echo $data_edit['username'] ?>" class="form-control" name="username">
				<label>Password</label>
				<input type="text" value="<?php echo $data_edit['password'] ?>" class="form-control" name="password">
				<label>Credential</label>
				<input type="text" value="<?php echo $data_edit['credential'] ?>" class="form-control" name="credential">
			</div>
			
			<!-- <div class="form-group">
				<label>Banner Image</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
			</div> -->
			<div class="form-group">
				<?php if(!$_GET['edit']){ ?>
				<input type="submit" name="simpan" value="SAVE" class="btn btn-success">
				<a href="index.php?menu=admin"><button class="btn btn-danger">CANCEL</button></a>
				<?php }else{ ?>
				<input type="submit" name="update" value="UPDATE" class="btn btn-success">
				<a href="index.php?menu=admin"><button class="btn btn-danger">CANCEL</button></a>

				<?php } ?>
			</div>
		</form>
	</div>
	<div class="col-md-8">
		<table class="table" id="example" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>ID </td>
					<td>Name</td>
					<td>Username</td>
					<td>Password</td>
					<td>Credential</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
					$sql = mysql_query("SELECT * FROM users ");
					while($data= mysql_fetch_array($sql)){
				 ?>
				<tr>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['username']; ?></td>
					<td><?php echo $data['password']; ?></td>
					<td><?php echo $data['credential']; ?></td>
                         <td>          
						<a href="index.php?menu=admin&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
						<a href="index.php?menu=admin&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
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