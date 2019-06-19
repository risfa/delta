<?php 
  if(isset($_GET['edit'])){
    $data_edit = mysql_fetch_array(mysql_query("SELECT * FROM video_galery WHERE ID = '$_GET[edit]'"));
  }
  if(isset($_POST['update'])){
     if($_POST['type'] == 'single video'){
      $judul = $_POST['judul'];
      $order = $_POST['order'];
      $link = 'https://youtube.com/embed/' . substr($_POST['link'], -11);
      $type = $_POST['type'];
      $sql_update = mysql_query("UPDATE video_galery SET judul ='$judul', link ='$link', urutan ='$order', type = '$type' WHERE ID = '$_GET[edit]'");
      if($sql_update){
        echo "<script>alert('Data has been Succesfully saved!')</script>";
        echo "<script>document.location.href='index.php?menu=youtube_video'</script>";
      }

    }
    elseif ($_POST['type'] == 'playlist') {
      $judul = $_POST['judul'];
      $order = $_POST['order'];
      $type = $_POST['type'];
      $link = 'https://www.youtube.com/embed/videoseries?list=' . substr($_POST['link'],-34); 
      $sql_update = mysql_query("UPDATE video_galery SET judul ='$judul', link ='$link', urutan = '$order', type = '$type' WHERE ID = '$_GET[edit]'");
      if($sql_update){
        echo "<script>alert('Data has been Succesfully saved!')</script>";
        echo "<script>document.location.href='index.php?menu=youtube_video'</script>";
      }
    }
  }

  if(isset($_POST['simpan'])){
    if($_POST['type'] == 'single video'){
      $judul = $_POST['judul'];
      $link = 'https://youtube.com/embed/' . substr($_POST['link'], -11);
      $order = $_POST['order'];
      $type = $_POST['type'];
      $sql_simpan = mysql_query("INSERT INTO `video_galery` (`ID`,`judul`,`link`,`urutan`,`type`) VALUES (NULL, '$judul','$link','$order','$type')");
      if($sql_simpan){
        echo "<script>alert('Data has been Succesfully saved!')</script>";
        echo "<script>document.location.href='index.php?menu=youtube_video'</script>";
      }

    }
    elseif ($_POST['type'] == 'playlist') {
      $judul = $_POST['judul'];
      $type = $_POST['type'];
      $link = 'https://www.youtube.com/embed/videoseries?list=' . substr($_POST['link'],-34);
      $order = $_POST['order'];
      $sql_simpan = mysql_query("INSERT INTO `video_galery` (`ID`,`judul`,`link`,`urutan`,`type`) VALUES (NULL, '$judul','$link','$order','$type')");
      if($sql_simpan){
        echo "<script>alert('Data has been Succesfully saved!')</script>";
        echo "<script>document.location.href='index.php?menu=youtube_video'</script>";
      }
    }
    
  }

  if(isset($_GET['delete'])){
    $sql_delete= mysql_query("DELETE FROM video_galery WHERE ID = '$_GET[delete]'");
    if($sql_delete){
      echo "<script>alert('Data has been Succesfully Deleted!')</script>";
      echo "<script>document.location.href='index.php?menu=youtube_video'</script>";
    }
  }
 ?>
<!-- HTML -->
<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-4">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: 2%;">Youtube Videos</h1>
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
        <label>URL</label>
        <input type="text" value="<?php echo $data_edit['link'] ?>" class="form-control" name="link">
      </div>

      <div class="form-group">
        <label>Type</label>
        <select name="type">
          <option <?php if($data_edit['type'] == 'single video'){ ?> selected <?php } ?> value="single video">Single Video</option>
          <option <?php if($data_edit['type'] == 'playlist'){ ?> selected <?php } ?> value="playlist">Playlist</option>
        </select>
      </div>

      <div class="form-group">
        <label>Order</label>
        <select name="order">
          <option <?php if($data_edit['urutan'] == '' || $data_edit['urutan'] == '-'){ ?> selected <?php } ?> value="-">-</option>
          <option <?php if($data_edit['urutan'] == '1'){ ?> selected <?php } ?> value="1">1</option>
          <option <?php if($data_edit['urutan'] == '2'){ ?> selected <?php } ?> value="2">2</option>
          <option <?php if($data_edit['urutan'] == '3'){ ?> selected <?php } ?> value="3">3</option>
          <option <?php if($data_edit['urutan'] == '4'){ ?> selected <?php } ?> value="4">4</option>
        </select>
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
          <td>URL</td>
          <td>Order</td>
          <td>type</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
          $sql = mysql_query("SELECT * FROM video_galery");
          while($data= mysql_fetch_array($sql)){
         ?>
        <tr>
          <td><?php echo $no;?> </td>
          <td><?php echo $data['judul'];?> </td>
          <td><?php echo $data['link']; ?></td>
          <td><?php echo $data['urutan']; ?></td>
          <td><?php echo $data['type']; ?></td>
          

            <td>          
            <a href="index.php?menu=youtube_video&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
            <a onclick="return confirm('Are you sure detele this link?')" href="index.php?menu=youtube_video&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
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