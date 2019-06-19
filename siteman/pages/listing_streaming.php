<?php 
  if(isset($_GET['edit'])){
    $data_edit = mysql_fetch_array(mysql_query("SELECT * FROM listing_streaming WHERE id_streaming = '$_GET[edit]'"));
  }
  if(isset($_POST['update'])){
    $sql_udpate = mysql_query("UPDATE listing_streaming SET link_streaming ='$_POST[link_streaming]', lokasi_streaming='$_POST[lokasi_streaming]'  WHERE id_streaming = '$_GET[edit]'");
    if($sql_udpate){
      echo "<script>alert('Data has been Succesfully updated!')</script>";
      echo "<script>document.location.href='index.php?menu=listing_streaming'</script>";
    }
  }

  if(isset($_POST['simpan'])){
    $sql_simpan = mysql_query("INSERT INTO `listing_streaming` (`id_streaming`,`link_streaming`,`lokasi_streaming`) VALUES (NULL, '$_POST[link_streaming]','$_POST[lokasi_streaming]')");
    
    if($sql_simpan){

      echo "<script>alert('Data has been Succesfully saved!')</script>";
      echo "<script>document.location.href='index.php?menu=listing_streaming'</script>";
    }
  }

  if(isset($_GET['delete'])){
    $sql_delete= mysql_query("DELETE FROM listing_streaming WHERE id_streaming = '$_GET[delete]'");
    if($sql_delete){

      echo "<script>alert('Data has been Succesfully Deleted!')</script>";
      echo "<script>document.location.href='index.php?menu=listing_streaming'</script>";
    }
  }
 ?>
<!-- HTML -->
<div class="row">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-4">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: 2%;">LISTING STREAMING</h1>
      </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-8"></div>
</div>
<div class="data">
  <div class="col-md-4">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label>Link Streaming</label>
        <input type="text" value="<?php echo $data_edit['link_streaming'] ?>" class="form-control" name="link_streaming">
      </div>
      
      <div class="form-group">
        <label>Location Streaming</label>
        <input type="text" value="<?php echo $data_edit['lokasi_streaming'] ?>" class="form-control" name="lokasi_streaming">
      </div>
      <div class="form-group">
        <?php if(!$_GET['edit']){ ?>
        <input type="submit" name="simpan" value="SAVE" class="btn btn-success">
        <a href="index.php?menu=listing_streaming"><button class="btn btn-danger">CANCEL</button></a>
        <?php }else{ ?>
        <input type="submit" name="update" value="UPDATE" class="btn btn-success">
        <a href="index.php?menu=listing_streaming"><button class="btn btn-danger">CANCEL</button></a>

        <?php } ?>
      </div>
    </form>
  </div>
  <div class="col-md-8">
    <table class="table" id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <td>No</td>
          <td>Link Streaming</td>
          <td>Location Streaming</td>

          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
          $sql = mysql_query("SELECT * FROM listing_streaming");
          while($data= mysql_fetch_array($sql)){
         ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $data['link_streaming']; ?></td>
          <td><?php echo $data['lokasi_streaming']; ?></td>
            <td>          
            <a href="index.php?menu=listing_streaming&edit=<?php echo $data[0] ?>"><i class="fa fa-pencil"></i>&nbsp;</a>|
            <a onclick="return confirm('Are you sure detele this Listing?')" href="index.php?menu=listing_streaming&delete=<?php echo $data[0] ?>"><i class="fa fa-trash"></i>&nbsp;</a>
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