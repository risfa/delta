<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
</head>

<?php 
//EDIT
if(isset($_GET['edit'])){
    $sqledit = mysql_query("SELECT * FROM music_chart WHERE id='$_GET[edit]'");
    $Data = mysql_fetch_array($sqledit);
}

//DELETE
if(isset($_GET['delete'])){
    $sqldelete = mysql_query("DELETE FROM music_chart WHERE id='$_GET[delete]'");
    if($sqldelete){
        $filePath = "../../delta_images_assets/chart_assets/".$_GET['delete'].".jpg";

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
      echo "<script>alert('Data has been Succesfully deleted!')</script>";
      echo "<script>document.location.href='index.php?menu=music_chart'</script>";
  }else{
      echo "<script>alert('Gagal Delete')</script>";
      echo "<script>document.location.href='index.php?menu=music_chart'</script>";
  }
}

?>
<body>
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"  id="datanya">
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: -2%; margin-bottom: 5%;">MUSIC</h1>
        </div>
            <button class="btn btn-success" onclick="hide_table()">ADD DATA</button><br>
<br><br>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Song Title</th>
                <th>Artists</th>
                <th>album</th>
                <th>genre</th>
                <th>Rank</th>
                <th>Status</th>
                <th>Last Week</th>
                <th>Weeks in Chart</th>
                <th>link_spotify</th>
                <th>link_youtube</th>
                <th>link_Itunes</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM `music_chart` ORDER BY rank ASC";
        $query = mysql_query($sql);

        while ($row = mysql_fetch_array($query)){

        ?>

        	<tr>
                <td><?php echo $no ;?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['artist'];?></td>
                <td><?php echo $row['album'];?></td>
                <td><?php echo $row['genre'];?></td>
                <td><?php echo $row['rank'];?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['last_week']; ?></td>
                <td><?php echo $row['weeks_in_chart']; ?></td>
                <td><?php echo $row['link_spotify']?></td>
                <td><?php echo $row['link_youtube']?></td>
                <td><?php echo $row['link_Itunes']?></td>
                <?php
                    $filename = "../delta_images_assets/chart_assets/".$row['id'].".jpg";
                    if (!file_exists($filename)) {                  
                ?>
                <td><a target="blank" href="../delta_images_assets/chart_assets/if_foto_kosong.jpg"><img style="height: 50px; width:50px;" src="../delta_images_assets/chart_assets/if_foto_kosong.jpg"></a></td>
                <td>
                <?php

                    }else{
                ?>
                <td><a target="blank" href="../delta_images_assets/chart_assets/<?php echo $row['id'];?>.jpg"><img style="height: 50px; width:50px;" src="../delta_images_assets/chart_assets/<?php echo $row['id'];?>.jpg"></a></td>

                <td>
                <?php
                     }
                ?>
                      
                        <a href="index.php?menu=music_chart&edit=<?php echo $row['id']?>"><i class="fa fa-pencil"></i>&nbsp;</a> |
                        <a href="index.php?menu=music_chart&delete=<?php echo $row['id']?>"><i class="fa fa-trash"></i>&nbsp;</a></td>
          </td> 



        	</tr>

        <?php $no++;  } ?>
        </tbody>
    </table>
    </div>
    </div>


<!-- Input Form Start here -->

    <div class="container" >
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="formnya" style="display: none;">
            <br>
            <center><h2>FORM Input Music Chart</h2></center>

                <div>  
            <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_music_chart.php">
                <!-- <input  name="id_hadiah" value="<?php echo $Data[0]?>"> -->

                    <div id="temp_image"></div>
                     <input  type="hidden" class="form-control" type="text"  value="<?php echo $Data['id']?>" name="ID" placeholder="ID" >
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-6" >
                            <label>Song</label>
                             <input class="form-control md-6" type="text" name="title" placeholder="Song Title"  required="" value="<?php echo $Data['title']?>">
                             <br>
            
                             <label>Artist</label>
                             <input class="form-control md-6" type="text" name="artist" placeholder="Artist"  required="" value="<?php echo $Data['artist']?>">
                             <br>
                             <label>Genre</label>
                             <input class="form-control md-6" type="text" name="genre" placeholder="Genre"  required="" value="<?php echo $Data['genre']?>">
                             <br>
                             <label>Album</label>
                             <input class="form-control md-6" type="text" name="album" placeholder="Album"  required="" value="<?php echo $Data['album']?>">
                             <br>
                             <label>Rank</label>
                             <input class="form-control md-6" type="text" name="rank" placeholder="Rank"  required="" value="<?php echo $Data['rank']?>">
                             <br>
                             <label>Status</label>
                             <select class="form-control md-6" name="status">
                               <option value="Up" <?php if($Data['status'] == 'Up'){ ?> selected <?php } ?>>Up</option>
                               <option value="Down" <?php if($Data['status'] == 'Down'){ ?> selected <?php } ?>>Down</option>
                               <option value="Stay" <?php if($Data['status'] == 'Stay'){ ?> selected <?php } ?>>Stay</option>
                             </select>
                             <br>
                             <label>Lyrics</label>
                             <input type="text" name="lyrics" class="form-control md-6" placeholder="https://genius.com/Shawn-mendes-youth-lyrics" value="<?php echo $Data['lyrics'] ?>">
                             <br>
                             <label>Last Week Position</label>
                             <input type="number" name="last_week" class="form-control md-6" placeholder="Last Week Position" value="<?php echo $Data['last_week'] ?>">
                             <br>
                             <label>Weeks in Chart</label>
                             <input type="number" name="weeks_in_chart" class="form-control md-6" placeholder="Weeks in Chart" value="<?php echo $Data['weeks_in_chart'] ?>">
                             <br>
                             <label>Link Sporify</label>
                             <input type="text" name="link_spotify" class="form-control md-6" placeholder="Link Sporify" value="<?php echo $Data['link_spotify'] ?>">
                             <br>
                             <label>Link Youtube</label>
                             <input type="text" name="link_youtube" class="form-control md-6" placeholder="Link Youtube" value="<?php echo $Data['link_youtube'] ?>">
                             <br>
                             <label>Link Itunes</label>
                             <input type="text" name="link_Itunes" class="form-control md-6" placeholder="Link Itunes" value="<?php echo $Data['link_Itunes'] ?>">

                             <!-- <label>File</label>
                             <input class="form-control md-6" type="text" name="music_file" placeholder="Music File"  required="" value="<?php echo $Data['music_file']?>"> -->
                           <br>

                        <!-- <label>Position</label>
                        <select name="status" class="form-control md-6">
                            <option value="<?php echo $Data['status']?>"><?php echo $Data['status']?></option>
                            <option value="up">up</option>
                            <option value="stay">stay</option>
                            <option value="down">down</option>
                        </select> -->
                        <label>Music File</label>
                        <input type="file" name="music_file" id="music_file">
                    <br>
                    <label>Album Cover</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <br>
                    <?php if($_GET['edit']){ ?>
                   <input type="submit" name="update" class="btn btn-success" value="UPDATE">
                   <button class="btn btn-danger" onclick="hide_form()">CANCEL</button>
                    <?php 
                        }
                     else{ ?>
                    <input style="margin-left: 1%;" class="btn btn-success" type="submit" name="simpan" value="SAVE" method="post">
                    <button class="btn btn-danger" onclick="hide_form()">CANCEL</button>
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
                                          echo "<script>     function hide_table(){".

                            "document.getElementById('formnya').style.display = 'block';".
                            "document.getElementById('datanya').style.display = 'none';};</script>";

                        echo "<script>".
                        "hide_table();".
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
    function hide_form(){
        document.getElementById("formnya").style.display = "none";
        document.getElementById("datanya").style.display = "block";
        // $('#').style.display="none";
        // $('#').style.display="block";
    }
    function hide_table(){

        document.getElementById("formnya").style.display = "block";
        document.getElementById("datanya").style.display = "none";
        // $('#formnya').style.display="block";
        // $('#datanya').style.display="none";
    }
</script>