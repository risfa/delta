
<html>
<head>

	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>
<?php 
//EDIT


//DELETE
if(isset($_GET['delete'])){
    $sqldelete = mysql_query("DELETE FROM stations WHERE ID='$_GET[delete]'");
    $id_foto = $_GET['delete'];
    if($sqldelete){

       $filePath = "../../delta_images_assets/stations/".$id_foto.".jpg";

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
      echo "<script>document.location.href='index.php?menu=stations'</script>";
  }else{
      echo "<script>alert('Faile Delete')</script>";
      echo "<script>document.location.href='index.php?menu=stations'</script>";
  }

}

?>



<body>
    <?php
        if(isset($_GET['edit'])){
    $sqledit = mysql_query("SELECT * FROM stations WHERE ID='$_GET[edit]'");
    $Data = mysql_fetch_array($sqledit);

        }
     ?>
	
    <div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"  id="datanya" > 
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: -2%; margin-bottom: 5%;">STATIONS</h1>
        </div>
            <button class="btn btn-success" onclick="hide_table()">ADD DATA</button><br>
<br><br>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>ID</th>               
                <th>Saluran</th>
                <th>Kota</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $No = 1;
        $sql = "SELECT * FROM `stations` LIMIT 100";
        $query = mysql_query($sql);

        while ($row = mysql_fetch_array($query)){

        ?>

        	<tr>
                <td><?php echo $No?></td>
                <td><?php echo $row['saluran'];?></td>
                <!-- <td><pre><?php $temp = explode("/>", $row['post_content']);
                   echo substr($temp[1],0,180); 
                ?></pre></td>  -->
                 <td><?php echo $row['kota'];?></td> 

                <?php
                    $filename = "../delta_images_assets/stations/".$row['id'].".png";
                            if (!file_exists($filename)) {
                                

                ?>

                <td><a target="blank" href="../delta_images_assets/stations/if_foto_kosong.jpg"><img style="height: 50px; width:50px;" src="../delta_images_assets/stations/if_foto_kosong.jpg"></a></td>
                <td>

                    <?php

                            }else{
                                ?>
                <td><a target="blank" href="../delta_images_assets/stations/<?php echo $row['id'];?>.png"><img style="height: 50px; width:50px;" src="../delta_images_assets/stations/<?php echo $row['id'];?>.png"></a></td>
                <td>

                            <?php
                            }
                    ?>
                    
                        <a href="index.php?menu=stations&edit=<?php echo $row['id']?>"><i class="fa fa-pencil"></i>&nbsp;</a> |
                        <a href="index.php?menu=stations&delete=<?php echo $row['id']?>"><i class="fa fa-trash"></i>&nbsp;</a></td>

                       <!--  <td><a target="_blank" href="https://bahanafm.co.id/stationsite/pages/stations_details.php?details=<?php echo $row['id']?>"><i class="fa fa-search"></i>&nbsp;</a></td> -->

            </tr>


        <?php $No++; } ?>
        </tbody>
    </table>
    </div>
    </div>

<!-- stations input form start here -->

    <div class="container" >
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="formnya" style="display: none;">
            <br>
            <center><h2>FORM Input stations</h2></center>

                <div> 
                <!-- FORM INPUT --> 
            <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_stations.php">
                <!-- <input  name="id_hadiah" value="<?php echo $Data[0]?>"> -->

                    <div id="temp_image"></div>
                     <input  type="hidden" class="form-control" type="text"  value="<?php echo $Data['id']?>" name="id" placeholder="ID" >
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>Kota</label>
                             <input class="form-control md-6" type="text" name="kota" placeholder="kota e.g Jakarta" required="" value="<?php echo $Data['kota']?>">
                        </div>
                        <div class="col-md-12">
                        	<label>Saluran</label>
                             <input class="form-control md-6" type="text" name="saluran" placeholder="Saluran e.g 99.1 FM"  required="" value="<?php echo $Data['saluran']?>"> 
                    <br>

                    <input type="file" name="fileToUpload" id="fileToUpload"> 
                    <br>
                     <?php if($_GET['edit']){ ?>
                   <input type="submit" name="update" class="btn btn-success" value="UPDATE">
                   <a href="index.php?menu=stations" class="btn btn-danger">CANCEL</a>
                    <?php 
                        }
                     else{ ?>
                    <input class="btn btn-success" type="submit" name="simpan" value="SAVE" method="post">
                    <a href="index.php?menu=stations" class="btn btn-danger">CANCEL</a>
                    <?php } ?>
                   	</div>
                    </div>
                    <br><br>
                   
                   

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

      // forala wsyswyg

      // $('textarea').froalaEditor()
	   $('#example').DataTable({
        "order": [[ 0, "desc" ]]
       });

 
            
	} );

	</script>

  <!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>


    
</body>
</html>

<script type="text/javascript">

					// CKEDITOR.replace( 'post_content' );
					// CKEDITOR.replace( 'post_content', {
					//     language: 'fr',
					//     uiColor: '#9AB8F3',

					// });


					// var editor = CKEDITOR.instances.post_content;
					// // editor.config.colorButton_colors = 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16';
					// // editor.config.colorButton_enableAutomatic = false;
					// // editor.config.colorButton_foreStyle = {
					// //     element: 'font',
					// //     attributes: { 'color': '#222222' }
					// // };

					// editor.config.colorButton_backStyle = {
					//     element: 'p',
					//     styles: { 'background-color': '#222222' }
					// };
					// alert( editor.config.colorButton_backStyle.element );


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