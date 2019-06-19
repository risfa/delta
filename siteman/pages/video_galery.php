<?php 
  if(isset($_GET['edit'])){
    $data_edit = mysql_fetch_array(mysql_query("SELECT * FROM video_galery WHERE ID = '$_GET[edit]'"));
  }
  if(isset($_POST['update'])){
    $sql_udpate = mysql_query("UPDATE video_galery SET link ='$_POST[link]'  WHERE ID = '$_GET[edit]'");
    if($sql_udpate){
      echo "<script>alert('Data has been Succesfully updated!')</script>";
      echo "<script>document.location.href='index.php?menu=video_galery'</script>";
    }
  }

  if(isset($_POST['simpan'])){
    $sql_simpan = mysql_query("INSERT INTO `video_galery` (`ID`,`link`) VALUES (NULL, '$_POST[link]')");
    
    if($sql_simpan){

      echo "<script>alert('Data has been Succesfully saved!')</script>";
      echo "<script>document.location.href='index.php?menu=video_galery'</script>";
    }
  }

  if(isset($_GET['delete'])){
    $sql_delete= mysql_query("DELETE FROM video_galery WHERE ID = '$_GET[delete]'");
    if($sql_delete){

      echo "<script>alert('Data has been Succesfully Deleted!')</script>";
      echo "<script>document.location.href='index.php?menu=video_galery'</script>";
    }
  }
 ?>
<!-- HTML -->
<div class="data">
  <div class="col-md-4">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label>Link Streaming</label>
        <input type="text" value="<?php echo $data_edit['link_streaming'] ?>" class="form-control" name="link">
      </div>
      
      <!-- <div class="form-group">
        <label>Location Streaming</label>
        <input type="text" value="<?php echo $data_edit['lokasi_streaming'] ?>" class="form-control" name="lokasi_streaming">
      </div> -->
      <div class="form-group">
        <?php if(!$_GET['edit']){ ?>
        <input type="submit" name="simpan" value="SAVE" class="btn btn-success">
        <a href="index.php?menu=video_galery"><button class="btn btn-danger">CANCEL</button></a>
        <?php }else{ ?>
        <input type="submit" name="update" value="UPDATE" class="btn btn-success">
        <a href="index.php?menu=video_galery"><button class="btn btn-danger">CANCEL</button></a>

        <?php } ?>
      </div>
    </form>
  </div>
  <div class="col-md-8">
    <table class="table" id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <td>No</td>
          <td>Link Video</td>
          <!-- <td>Date</td> -->

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
          <td><?php echo $no; ?></td>
          <td><?php echo $data['link']; ?></td>
          <!-- <td><?php echo $data['date']; ?></td> -->
            <td>          
            <a href="index.php?menu=video_galery&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
            <a onclick="return confirm('Are you sure detele this link?')" href="index.php?menu=video_galery&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
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