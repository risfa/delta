<?php 
  if(isset($_GET['edit'])){
    $data_edit = mysql_fetch_array(mysql_query("SELECT * FROM Podcast WHERE ID = '$_GET[edit]'"));
  }
  if(isset($_POST['update'])){
    $judul = addslashes($_POST['judul']);
    $category = $_POST['category'];
    $music_file = $_POST['music_file'];
    $sql_udpate = mysql_query("UPDATE Podcast SET judul ='$judul', category ='$category', music_file ='$music_file' WHERE ID = '$_GET[edit]'");
    $IDget = $_GET['edit'];
    if($sql_udpate){

      move_uploaded_file($_FILES["music_file"]["tmp_name"],"../assets/mp3/".$IDget.".mp3");

      echo "<script>alert('Data has been Succesfully updated!')</script>";
      echo "<script>document.location.href='index.php?menu=podcast'</script>";
    }
  }

  if(isset($_POST['simpan'])){
    $judul = addslashes($_POST['judul']);
    $category = $_POST['category'];
    $music_file = $_POST['music_file'];

    $sql_simpan = mysql_query("INSERT INTO `Podcast` (`ID`,`judul`,`category`,`music_file`) VALUES (NULL, '$judul','$category','$music_file')");
    $data_gambar = mysql_insert_id();
    if($sql_simpan){

      move_uploaded_file($_FILES["music_file"]["tmp_name"],"../assets/mp3/".$data_gambar.".mp3");

      echo "<script>alert('Data has been Succesfully saved!')</script>";
      echo "<script>document.location.href='index.php?menu=podcast'</script>";
    }
  }

  if(isset($_GET['delete'])){
    $sql_delete= mysql_query("DELETE FROM Podcast WHERE ID = '$_GET[delete]'");
    if($sql_delete){
              $filePath = "../assets/mp3/".$_GET['delete'].".mp3";
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
      echo "<script>document.location.href='index.php?menu=podcast'</script>";
    }
  }
 ?>
<!-- HTML -->
<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-4">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: 2%;">PODCAST</h1>
      </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-8"></div>
</div>
<div class="data">
  <div class="col-md-4">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label>Title</label>
        <input type="text" value="<?php echo $data_edit['judul'] ?>" class="form-control" name="judul">
      </div>
      <!-- <div class="form-group">
        <label>Music File</label>
        <input type="text" value="<?php echo $data_edit['music_file'] ?>" class="form-control" name="music_file">
      </div> -->
      <div class="form-group">
        <label>Category</label>
        <select type="text" value="<?php echo $data_edit['category'] ?>" class="form-control" name="category">
        <?php 
          $sql = mysql_query("SELECT * FROM  podcast_detail");
            while($data = mysql_fetch_array($sql)){
         ?>
          <option value="<?php echo $data['ID'] ?>"> <?php echo $data['title'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Music File</label>
        <input type="file" name="music_file" id="music_file">
      </div>
     
      <div class="form-group">
        <?php if(!$_GET['edit']){ ?>
        <input type="submit" name="simpan" value="SAVE" class="btn btn-success">
        <a href="index.php?menu=podcast"><button class="btn btn-danger">CANCEL</button></a>
        <?php }else{ ?>
        <input type="submit" name="update" value="UPDATE" class="btn btn-success">
        <a href="index.php?menu=podcast"><button class="btn btn-danger">CANCEL</button></a>

        <?php } ?>
      </div>
    </form>
  </div>
  <div class="col-md-8">
    <table class="table" id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <td>No</td>
          <td>Title</td>
          <td>Music file</td>
          <td>Category</td>
          <td>Play/Pause</td>
          
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
          $sql = mysql_query("SELECT * FROM Podcast JOIN podcast_detail ON Podcast.category = podcast_detail.ID");
          while($data= mysql_fetch_array($sql)){
         ?>
        <tr>
          <td><?php echo $no;?> </td>
          <td><?php echo $data['judul'];?> </td>
          <?php
                    $filename = "../assets/mp3/".$data['ID'].".mp3";
                            if (!file_exists($filename)) {
                                

                ?><!-- 
                <td><a href="../assets/mp3/if_file_kosong.mp3"><audio>
                    <source src="../assets/mp3/if_file_kosong.mp3" type="audio/mpeg">
                </audio></a></td>
 -->
                <!-- <td><a target="blank" href="../assets/Mp3/if_file_kosong.mp3"><img style="height: 50px; width:50px;" src="../assets/epa/if_foto_kosong.mp3"></a></td> -->

                <td>Tidak ada file mp3</td>

                    <?php

                            }else{
                                ?>
                <td><audio controls>
                    <source src="../assets/mp3/<?php echo $data['ID'];?>.mp3" type="audio/mpeg"></audio></td>
                <!-- <td><a target="blank" href="../assets/Mp3/<?php echo $data['ID'];?>.mp3"><img style="height: 50px; width:50px;" src="../assets/Mp3/<?php echo $data['ID'];?>.mp3"></a></td> -->
                            <?php
                            }
                    ?>
                <td><?php echo $data['title'] ?></td>
          
          <!-- <td><?php echo $data['play_pause'];?> </td> -->

            <td>          
            <a href="index.php?menu=podcast&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
            <a onclick="return confirm('Are you sure detele this link?')" href="index.php?menu=podcast&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
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