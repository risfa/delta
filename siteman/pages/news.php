
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="docsupport/style.css">
  <link rel="stylesheet" href="docsupport/prism.css">
  <link rel="stylesheet" href="chosen.css">


  <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <!-- Multiple select cdn -->
 <!--  <link rel="stylesheet" type="text/css" href="../select2-4.0.6-rc.0/dist/css/select2.min.css">
  <script src="../select2-4.0.6-rc.0/dist/js/select2.min.js"></script> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <!-- ---- -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.6/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>

<script type="text/javascript">

    // $('').select2();
    $(document).ready(function() {
      $('.select2-multi').select2();
    });

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

    <?php 
//EDIT


//DELETE
    if(isset($_GET['delete'])){
      $sqldelete = mysql_query("DELETE FROM news WHERE ID='$_GET[delete]'");
      $id_foto = $_GET['delete'];
      if($sqldelete){

       $filePath = "../../delta_images_assets/news/".$id_foto.".jpg";

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
     echo "<script>document.location.href='index.php?menu=news'</script>";
   }else{
    echo "<script>alert('Faile Delete')</script>";
    echo "<script>document.location.href='index.php?menu=news'</script>";
  }

}

?>



<body>
  <?php
  if(isset($_GET['edit'])){
    $sqledit = mysql_query("SELECT * FROM news WHERE ID='$_GET[edit]'");
    $Data = mysql_fetch_array($sqledit);

  }
  ?>

  <div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"  id="datanya" > 
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: -2%; margin-bottom: 5%;">NEWS</h1>
      </div>
      <button class="btn btn-success" onclick="hide_table()">ADD DATA</button><br>
      <br><br>
      <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>

            <th>ID</th>
            <th>Post Date</th>
            <th>Author</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Images</th>
            <th>Actions</th>
            <th>Preview</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $No = 1;
          $sql = "SELECT * FROM `news` JOIN news_category ON news.news_category_id = news_category.ID_category ORDER BY post_date  LIMIT 100";
          $query = mysql_query($sql);

          while ($row = mysql_fetch_array($query)){

            ?>

            <tr>
              <td><?php echo $No?></td>
              <td><?php echo $row['post_date'];?></td>
                <!-- <td><pre><?php $temp = explode("/>", $row['post_content']);
                   echo substr($temp[1],0,180); 
                   ?></pre></td>  -->
                   <td><?php echo $row['post_author']; ?></td>
                   <td><?php echo $row['post_title'];?></td> 
                   <td><?php echo $row['nama'];?></td>

        <!-- 		<td><a target="blank" href="../bahana_images_assets/news/<?php echo $row['ID'];?>.jpg"><img style="height: 50px; width:50px;" src="../bahana_images_assets/news/<?php echo $row['ID'];?>.jpg"></a></td>
        		<td>
                        <a href="index.php?menu=news&edit=<?php echo $row['ID']?>">EDIT</a>
                        <a href="index.php?menu=news&delete=<?php echo $row['ID']?>">DELETE</a></td>

                      </tr> -->



                      <?php
                      $filename = "../delta_images_assets/news/".$row['ID'].".jpg";
                      if (!file_exists($filename)) {


                        ?>

                        <td><a target="blank" href="../delta_images_assets/news/if_foto_kosong.jpg"><img style="height: 50px; width:50px;" src="../delta_images_assets/news/if_foto_kosong.jpg"></a></td>
                        <td>

                          <?php

                        }else{
                          ?>
                          <td><a target="blank" href="../delta_images_assets/news/<?php echo $row['ID'];?>.jpg"><img style="height: 50px; width:50px;" src="../delta_images_assets/news/<?php echo $row['ID'];?>.jpg"></a></td>
                          <td>

                            <?php
                          }
                          ?>

                          <a href="index.php?menu=news&edit=<?php echo $row['ID']?>"><i class="fa fa-pencil"></i>&nbsp;</a> |
                          <a href="index.php?menu=news&delete=<?php echo $row['ID']?>"><i class="fa fa-trash"></i>&nbsp;</a></td>

                          <td><a target="_blank" href="https://bahanafm.co.id/newsite/pages/news_details.php?details=<?php echo $row['ID']?>"><i class="fa fa-search"></i>&nbsp;</a></td>

                        </tr>


                        <?php $No++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <!-- News input form start here -->

                <div class="container" >
                  <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="formnya" style="display: none;">
                      <br>
                      <center><h2>FORM Input News</h2></center>

                      <div> 
                        <!-- FORM INPUT --> 
                        <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_news.php">
                          <!-- <input  name="id_hadiah" value="<?php echo $Data[0]?>"> -->

                          <div id="temp_image"></div>
                          <input  type="hidden" class="form-control" type="text"  value="<?php echo $Data['ID']?>" name="ID" placeholder="ID" >
                          <br>
                          <div class="col-md-12">
                            <div class="col-md-4">
                              <label>Title</label>
                              <input class="form-control md-6" type="text" name="post_tittle" placeholder="Post Title"  required="" value="<?php echo $Data['post_title']?>">
                            </div>
                            <div class="col-md-4">
                              <label>Author</label>
                              <input class="form-control md-6" type="text" name="post_author" placeholder="Post Author"  required="" value="<?php echo $Data['post_author']?>">
                            </div>
                            <div class="col-md-4">
                              <label>Category</label>
                              <select name="category" class="form-control">
                                <?php  
                                $sql = mysql_query("SELECT * FROM news_category");
                                while($data= mysql_fetch_array($sql)){
                                  ?>
                                  <option <?php if($Data['news_category_id'] == $data[0]){ ?> selected <?php } ?> value="<?php echo $data[0] ?>"><?php echo $data['nama'] ?></option>
                                <?php } ?>
                              </select>
                              <br>

                            </div>
                            <div class="col-md-4">
                             <select data-placeholder="Select tag..." name="tags[]" class="chosen-select" multiple tabindex="4">
                               <option value=""></option>
                               <?php
                               $query_tags = mysql_query("SELECT * FROM tags");
                               $Check = mysql_query("SELECT tags.id FROM tags JOIN news_tags on tags.id = news_tags.tags_id where news_tags.news_id = '$id'");

                               while ($tag = mysql_fetch_array($query_tags)) {
                                ?>
                                <option <?php
                                while ($checkSelected = mysql_fetch_array($Check)) {     
                                  if($tag['id'] == $checkSelected['id']){ ?> selected <?php } } ?>value="<?php echo $tag['id'] ?>"><?php echo $tag['name_tags'] ?></option>
                                <?php } ?>

                              </select>
                              <br>
                            </div>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                             +
                           </button>

                           
<br><br>

                          <div class="col-md-12">
                            <textarea id="post_content" class="ckeditor" name="post_content"><?php echo $Data['post_content']?></textarea>
                            <br>

                            <input type="file" name="fileToUpload" id="fileToUpload"> 
                            <br>
                            <?php if($_GET['edit']){ ?>
                             <input type="submit" name="update" class="btn btn-success" value="UPDATE">
                             <a href="index.php?menu=news" class="btn btn-danger">CANCEL</a>
                             <?php 
                           }
                           else{ ?>
                            <input class="btn btn-success" type="submit" name="simpan" value="SAVE" method="post">
                            <a href="index.php?menu=news" class="btn btn-danger">CANCEL</a>
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
            <!-- add-tags -->
            
             <form method="post">
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add Tags</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  
                                    Input Tag
                                    <input type="text" value="" name="name_tags" required="">
                                  <table>
                                    <tr>
                                      <th style="width: 100px;"></th>
                                      <th style="width: 100px;"></th>
                                    </tr>
                                    <br>
                                    <tr>
                                      <td>BOLA</td>
                                      <td><button style="background: none; border: none;"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                  </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="Submit" value="Save Change" class="btn btn-success"name="insert_tag"> 
                                </div>
                              </div>
                            </div>
                          </div>
                          </form>
            <script type="text/javascript" src="assets/js/jquery.min.js"></script>
            <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
            <script src="docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
            <script src="chosen.jquery.js" type="text/javascript"></script>
            <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
            <script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>


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

<style type="text/css">
.chosen-container
{
  width: 100% !important;
}
</style>