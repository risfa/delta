<?php
// memanggil file config.php
include "dbconnect.php";
// require 'dbconnect.php';
?> 
<html>
<head>
	<!-- <title>Lihat transaksi luckyfriday</title> -->
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
</head>

<body>
	
    <div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"  id="datanya" >
            <!-- <button class="btn btn-success" onclick="hide_table()">TAMBAH DATA</button><br> -->
<br><br>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <!-- <th>Kode TRX</th> -->
                <th>ID</th>
                <th>Music Title</th>
                <!-- <th>post_content</th> -->
                <th>IP</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `logs_listen` JOIN music_chart ON logs_listen.id_music = music_chart.id WHERE logs_listen.id_music = music_chart.id ORDER BY id_log desc ";
        $query = mysql_query($sql);

        while ($row = mysql_fetch_array($query)){


    // $data_spbu = mysql_fetch_array(mysql_query("SELECT * FROM tb_spbu WHERE id_spbu = '$row[id_spbu]'"));
    // $data_customer = mysql_fetch_array(mysql_query("SELECT * FROM tb_customer WHERE id_customer = '$row[id_customer]'"));

        ?>

        	<tr>
                <td><?php echo $row['id_log'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['ip'];?></td>
                <td><?php echo $row['action'];?></td>

                <!-- <td><pre><?php $temp = explode("/>", $row['post_content']);
                	 echo substr($temp[1],0,180); 
                ?></pre></td>  -->


        	</tr>

        <?php } ?>
        </tbody>
    </table>
    </div>
    </div>




    <div class="container" >
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="formnya" style="display: none;">
            <button class="btn btn-danger" onclick="hide_form()">BATAL</button><br>
            <center><h2>FORM Input music_chart</h2></center>

                <div>  
            <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_music_chart.php">
                <!-- <input  name="id_hadiah" value="<?php echo $Data[0]?>"> -->

                    <div id="temp_image"></div>
                     <input  type="hidden" class="form-control" type="text"  value="<?php echo $Data['id']?>" name="ID" placeholder="ID" >
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-6">
                             <input class="form-control md-6" type="text" name="song_tittle" placeholder="song_tittle"  required="" value="<?php echo $Data['song_tittle']?>">

                             <input class="form-control md-6" type="text" name="artist" placeholder="artist"  required="" value="<?php echo $Data['artist']?>">

                             <input class="form-control md-6" type="text" name="album" placeholder="album"  required="" value="<?php echo $Data['album']?>">
                        </div>
                        <div class="col-md-6">
                        <select name="category" class="form-control" value="<?php echo $Data['category']?>" >
                            <option value="bublingup">Bubbling up song</option>
                            <option value="top40">Top40</option>
                            <option value="newrelease">NewRelease</option>
                         </select>
                        </div>
                    </div>
                    <br><br>
                   

                    <br>
                     <input class="form-control md-6" type="text" name="genre" placeholder="genre"  required="" value="<?php echo $Data['genre']?>">
                    <br>
                    <br>
                     <input class="form-control md-6" type="text" name="music_file" placeholder="music_file"  required="" value="<?php echo $Data['music_file']?>">
                    <br>
                    <br>
                     <input class="form-control md-6" type="text" name="status" placeholder="status"  required="" value="<?php echo $Data['status']?>">
                    <br>
                    <br>
                     <input class="form-control md-6" type="text" name="urutan" placeholder="urutan"  required="" value="<?php echo $Data['urutan']?>">
                    <br>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <br>


                 <!--    <input  class="form-control" type="text" name="prosentase_menang" placeholder="ProsentasiMenang" required="" value="<?php echo $Data['prosentase_menang']?>">
                    <br>
                    <select name="kategori_hadiah" class="form-control" value="<?php echo $Data['kategori_hadiah']?>" >
                        <option value="0">Kategori</option>
                        <option value="1">Mobil</option>
                        <option value="2">Motor</option>
                        <option value="3">Umum</option>
                    </select>
                    <br>
                        <select name="status_hadiah" class="form-control" value="<?php echo $Data['status_hadiah']?>">
                            <option>Status Hadiah</option>
                            <option value="1">Active</option>
                            <option value="2">Deactive</option>
                        </select>
                    <br>
                   <input class="form-control" type="text"  name="hadiah_spesial" required="" placeholder="HadiahSpesial" value="<?php echo $Data['hadiah_spesial']?>"> -->
                   <br>
                   <?php if($_GET['edit']){ ?>
                   <input type="submit" name="update" class="btn btn-success" value="Update">
                   <a href="index.php?menu=music_chart" class="btn btn-success">Cancel</a>
                    <?php 
                        }
                     else{ ?>
                    <input class="btn btn-success" type="submit" name="simpan" value="SAVE" method="post">
                    <?php } ?>
                
                </form>
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
	   $('#example').DataTable({
        "order": [[ 0, "desc" ]]
       });
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