
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <meta name="viewport" content="wIdth=device-wIdth, initial-scale=1">
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
</head>

<?php 
//EDIT
if(isset($_GET['edit'])){
    $sqledit = mysql_query("SELECT * FROM nominasi WHERE id='$_GET[edit]'");
    $Data = mysql_fetch_array($sqledit);
}

//DELETE
if(isset($_GET['delete'])){
    $sqldelete = mysql_query("DELETE FROM nominasi WHERE id='$_GET[delete]'");
    if($sqldelete){
        $filePath = "../../bahana_images_assets/nominasi/".$_GET['delete'].".jpg";

       // $filePath = $Id_foto.".jpg";
         if (file_exists($filePath)) 
               {
                    unlink($filePath);
                   "<script>alert('Picture has been Succesfully deleted!')</script>";
              }
              else
              {
                     "<script>alert('Foto tIdak ada')</script>";
              }
      echo "<script>alert('Data has been Succesfully deleted!')</script>";
      echo "<script>document.location.href='index.php?menu=nominasi'</script>";
  }else{
      echo "<script>alert('Gagal Delete')</script>";
      echo "<script>document.location.href='index.php?menu=nominasi'</script>";
  }
}

?>
<body>
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"  Id="datanya">
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: -2%; margin-bottom: 5%;">Nominasi</h1>
        </div>
            <button class="btn btn-success" onclick="hIde_table()">ADD DATA</button><br>
<br><br>
  <table Id="example" class="display" cellspacing="0" wIdth="100%">
        <thead>
            <tr>
                <!-- <th>Kode TRX</th> -->
                <th>Id</th>
                <th>Song Title</th>
                <!-- <th>post_content</th> -->
                <!-- <th>Title</th> -->
                <th>Artists</th>
                <th>genre</th>
                <th>Vote</th>
                <!-- <th>Music File</th> -->
                <th>Rank</th>
                <!-- <th>Status</th> -->
                <!-- <th>Orders</th> -->
                <th>Images</th>
                  <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM `nominasi` ";
        $query = mysql_query($sql);

        while ($row = mysql_fetch_array($query)){

        ?>

          <tr>
                <td><?php echo $no ;?></td>
                <td><?php echo $row['song_title'];?></td>
                
                <td><?php echo $row['artist'];?></td>
                <td><?php echo $row['genre'];?></td>
                <td><?php echo $row['vote'];?></td>
                <!-- <td><?php echo $row['status'];?></td> -->
                <td><?php echo $row['urutan'];?></td>
  

              
            <?php
                    $filename = "../bahana_images_assets/nominasi/".$row['id'].".jpg";
                            if (!file_exists($filename)) {
                                  

                ?>

                <td><a target="blank" href="../bahana_images_assets/nominasi/if_foto_kosong.jpg"><img style="height: 50px; wIdth:50px;" src="../bahana_images_assets/nominasi/if_foto_kosong.jpg"></a></td>
                <td>

                    <?php

                            }else{
                                ?>
                <td><a target="blank" href="../bahana_images_assets/nominasi/<?php echo $row['id'];?>.jpg"><img style="height: 50px; wIdth:50px;" src="../bahana_images_assets/nominasi/<?php echo $row['id'];?>.jpg"></a></td>

                <td>
                            <?php
                            }
                    ?>
                      
                        <a href="index.php?menu=nominasi&edit=<?php echo $row['id']?>"><i class="fa fa-pencil"></i>&nbsp;</a> |
                        <a href="index.php?menu=nominasi&delete=<?php echo $row['id']?>"><i class="fa fa-trash"></i>&nbsp;</a></td>
          </td> 



          </tr>

        <?php $no++;  } ?>
        </tbody>
    </table>
    </div>
    </div>




    <div class="container" >
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" Id="formnya" style="display: none;">
            <br>
            <center><h2>FORM Input Nominasi</h2></center>

                <div>  
            <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_nominasi.php">
                <!-- <input  name="Id_hadiah" value="<?php echo $Data[0]?>"> -->

                    <div Id="temp_image"></div>
                     <input  type="hIdden" class="form-control" type="text"  value="<?php echo $Data['id']?>" name="id" placeholder="Id" >
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-6" >
                            <label>Song</label>
                             <input class="form-control md-6" type="text" name="song_title" placeholder="Song Title"  required="" value="<?php echo $Data['song_title']?>">
                             <br>
                             <!-- <label>Title</label>
                             <input class="form-control md-6" type="text" name="title" placeholder="Title"  required="" value="<?php echo $Data['title']?>"> -->
                             <br>
                             <label>Artist</label>
                             <input class="form-control md-6" type="text" name="artist" placeholder="Artist"  required="" value="<?php echo $Data['artist']?>">
                             <br>
                             <label>Genre</label>
                             <input class="form-control md-6" type="text" name="genre" placeholder="Genre"  required="" value="<?php echo $Data['genre']?>">
                    <br>
                             <label>Rank</label>
                             <input class="form-control md-6" type="text" name="urutan" placeholder="Rank"  required="" value="<?php echo $Data['urutan']?>">
                    <!-- <label>File</label>
                     <input class="form-control md-6" type="text" name="music_file" placeholder="Music File"  required="" value="<?php echo $Data['music_file']?>"> -->
                    <!-- <br>
                        <label>Position</label>
                        <select name="status" class="form-control md-6">
                            <option value="<?php echo $Data['status']?>"><?php echo $Data['status']?></option>
                            <option value="up">up</option>
                            <option value="stay">stay</option>
                            <option value="down">down</option>
                        </select> -->
                     <!-- <input class="form-control md-6" type="text" name="status" placeholder="status"  required="" value="<?php echo $Data['status']?>"> -->
                    <!-- <br>
                    <label>Sequence</label>    
                     <input class="form-control md-6" type="text" name="urutan" placeholder="Order"  required="" value="<?php echo $Data['urutan']?>"> -->
                    <br>
                    <label>Artist Image</label>
                    <input type="file" name="fileToUpload" Id="fileToUpload">
                    <br>
                    <?php if($_GET['edit']){ ?>
                   <input type="submit" name="update" class="btn btn-success" value="UPDATE">
                   <button class="btn btn-danger" onclick="hIde_form()">CANCEL</button>
                    <?php 
                        }
                     else{ ?>
                    <input style="margin-left: 1%;" class="btn btn-success" type="submit" name="simpan" value="SAVE" method="post">
                    <button class="btn btn-danger" onclick="hIde_form()">CANCEL</button>
                    <?php } ?>
                        </div>
                        <!-- <div class="col-md-6">
                            <label>Category</label>
                        <select name="category" class="form-control" value="<?php echo $DataTable['category']?>" >
                            <option value="bubblingupsonglist">Bubbling Up Song</option>
                            <option value="top40">Top40</option>
                            <option value="newrelease">New Release</option>
                         </select>
                        </div> -->
                    
                    <br><br>
                   

                    <br>
                     
                    <br>
                    </div>
                   <br>
                   
                
                </form>

                 <!-- this is how to show form -->
                                    <?php

                                    if($_GET['edit']){
                                          echo "<script>     function hIde_table(){".

                            "document.getElementById('formnya').style.display = 'block';".
                            "document.getElementById('datanya').style.display = 'none';};</script>";

                        echo "<script>".
                        "hIde_table();".
                        // "document.getElementById('button_tambah').click();".
                        "</script>";
                        
                                    }
                                          
                                     ?>

                                     
                </div> 
                <br>
                <br>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9" style="margin-top: 40px;">    
              
            </div>
        </div>
    </div>
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
     $('#example').DataTable();
  } );

  </script>


    
</body>
</html>

<script type="text/javascript">
    function hIde_form(){
        document.getElementById("formnya").style.display = "none";
        document.getElementById("datanya").style.display = "block";
        // $('#').style.display="none";
        // $('#').style.display="block";
    }
    function hIde_table(){

        document.getElementById("formnya").style.display = "block";
        document.getElementById("datanya").style.display = "none";
        // $('#formnya').style.display="block";
        // $('#datanya').style.display="none";
    }
</script>