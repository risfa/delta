<?php 
  if(isset($_GET['edit'])){
    $data_edit = mysql_fetch_array(mysql_query("SELECT * FROM podcast_detail WHERE ID = '$_GET[edit]'"));
  }
  if(isset($_POST['update'])){
    $title = addslashes($_POST['title']);
    $deskripsi = addslashes($_POST['deskripsi']);
    $sql_udpate = mysql_query("UPDATE podcast_detail SET title ='$title', deskripsi='$deskripsi'  WHERE ID = '$_GET[edit]'");
    $IDget = $_GET['edit'];
    if($sql_udpate){

      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../bahana_images_assets/podcast/".$IDget.".jpg");
      echo "<script>alert('Data has been Succesfully updated!')</script>";
      echo "<script>document.location.href='index.php?menu=podcast_detail'</script>";
    }
  }
  if(isset($_POST['simpan'])){
    $deskripsi = addslashes($_POST['deskripsi']);
    $title = addslashes($_POST['title']);
    $sql_simpan = mysql_query("INSERT INTO `podcast_detail` (`ID`, `title`, `deskripsi`, `tanggal`) VALUES (null, '$_POST[title]', '$_POST[deskripsi]',null);");
    $data_gambar = mysql_insert_id();
    

    if($sql_simpan){

      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../bahana_images_assets/podcast/".$data_gambar.".jpg");

        
      echo "<script>alert('Data has been Succesfully saved!')</script>";
      echo "<script>document.location.href='index.php?menu=podcast_detail'</script>";
    }
  }

  if(isset($_GET['delete'])){
    $sql_delete= mysql_query("DELETE FROM podcast_detail WHERE ID = '$_GET[delete]'");
    if($sql_delete){
              $filePath = "../../bahana_images_assets/podcast/".$_GET['delete'].".jpg";


       // $filePath = $id_foto.".jpg";
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
      echo "<script>document.location.href='index.php?menu=podcast_detail'</script>";
    }
  }
 ?>
<!-- HTML -->
<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-4">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: 2%;">PODCAST DETAIL</h1>
      </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-8"></div>
</div>
<div class="data">
  <div class="col-md-4">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label>Title</label>
        <input type="text" value="<?php echo $data_edit['title'] ?>" class="form-control" name="title">
      </div>
      <div class="form-group">
        <label>Description</label>
        <input type="text" value="<?php echo $data_edit['deskripsi'] ?>" class="form-control" name="deskripsi">
      </div>
      
      <div class="form-group">
        <label>Image</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
      </div>
      <div class="form-group">
        <?php if(!$_GET['edit']){ ?>
        <input type="submit" name="simpan" value="SAVE" class="btn btn-success">
        <a href="index.php?menu=podcast_detail"><button class="btn btn-danger">CANCEL</button></a>
        <?php }else{ ?>
        <input type="submit" name="update" value="UPDATE" class="btn btn-success">
        <a href="index.php?menu=podcast_detail"><button class="btn btn-danger">CANCEL</button></a>

        <?php } ?>
      </div>
    </form>
  </div>
  <div class="col-md-8">
    <table class="table" id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <td>ID Banner</td>
          <td>Title</td>
          <td>Description</td>
          <td>Date</td>
          
          <td>Images</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
          $sql = mysql_query("SELECT * FROM podcast_detail ");
          while($data= mysql_fetch_array($sql)){
         ?>
        <tr>
          <td><?php echo $data['ID']; ?></td>
          <td><?php echo $data['title']; ?></td>
          <td><?php echo $data['deskripsi']; ?></td>
          <td><?php echo $data['tanggal']; ?></td>
            <?php
                    $filename = "../bahana_images_assets/podcast/".$data['ID'].".jpg";
                            if (!file_exists($filename)) {
                                
                ?>

                <td><a target="blank" href="../bahana_images_assets/podcast/if_foto_kosong.jpg"><img style="height: 50px; width:50px;" src="../bahana_images_assets/podcast/if_foto_kosong.jpg"></a></td>
                <td>

                    <?php

                            }else{
                                ?>
                <td><a target="blank" href="../bahana_images_assets/podcast/<?php echo $data['ID'];?>.jpg"><img style="height: 50px; width:50px;" src="../bahana_images_assets/podcast/<?php echo $data['ID'];?>.jpg"></a></td>

                <td>
                            <?php
                            }
                    ?>
                      
            <a href="index.php?menu=podcast_detail&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
            <a onclick="return confirm('Are you sure detele this category?')" href="index.php?menu=podcast_detail&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
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