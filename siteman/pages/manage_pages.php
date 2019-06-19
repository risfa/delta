
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


//DELETE
if(isset($_GET['delete'])){
    $sqldelete = mysql_query("DELETE FROM pages WHERE idPages='$_GET[delete]'");
    if($sqldelete){
      echo "<script>alert('Data has been Succesfully Delete!')</script>";
      echo "<script>document.location.href='index.php?menu=manage_pages'</script>";
  }else{
      echo "<script>alert('Gagal Delete')</script>";
      echo "<script>document.location.href='index.php?menu=manage_pages'</script>";
  }
}

?>



<body>
    <?php
        if(isset($_GET['edit'])){
    $sqledit = mysql_query("SELECT * FROM pages WHERE idPages='$_GET[edit]'");
    $Data = mysql_fetch_array($sqledit);

        }
     ?>
    
    <div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"  id="datanya" > 
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
        <h1 style="margin-top: 0px; font-weight: bold; margin-left: -2%; margin-bottom: 5%;">MANAGE PAGES</h1>
        </div>
        
            <button class="btn btn-success" onclick="hide_table()">ADD DATA</button><br>
<br><br>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <!-- <th>Kode TRX</th> -->
                <th>Id Pages</th>
                <th>Pages Title</th>
                <!-- <th>Pages Content</th> -->
                <!-- <th>post_content</th> -->
                <!-- <th>Pages Hits</th> -->
                  <th>Actions</th>
                  <th>Preview</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $tampil = mysql_query("SELECT * FROM pages");
        while($row = mysql_fetch_array($tampil)){
        
        ?>

            <tr>
                <td><?php echo $row['idPages'];?></td>
                <td><?php echo $row['PagesTitle'];?></td>
                <!-- <td><?php echo $row['PagesContent'];?></td> -->
                <!-- <td><?php echo $row['PagesHits'];?></td> -->
                <td>
                  
                <a href="index.php?menu=manage_pages&edit=<?php echo $row['idPages']?>"><i class="fa fa-pencil"></i>&nbsp;</a> |
                <a href="index.php?menu=manage_pages&delete=<?php echo $row['idPages']?>"><i class="fa fa-trash"></i>&nbsp;</a></td>
                </td>
                <td>
                <a target="_blank" href="http://bahanafm.co.id/newsite/pages/index.php?details=<?php echo $row['idPages']?>"><i class="fa fa-search"></i>&nbsp;</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
    </div>

    <div class="container" >
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="formnya" style="display: none;">
            <br>
            <center><h2>Form Input</h2></center>

                <div>  
            <form enctype="multipart/form-data" class="form-group"  method="post" action="process/add_manage_pages.php">
                
                    
                     <input  type="hidden" class="form-control" type="text"  value="<?php echo $Data['idPages']?>" name="idPages" placeholder="idPages" >
                    <br>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>Title</label>
                             <input class="form-control md-6" type="text" name="PagesTitle" placeholder="Pages Title"  required="" value="<?php echo $Data['PagesTitle']?>">

                        </div>
                    
                             <br>
                    
                        </div>
                        <div class="col-md-12">
                         <textarea class="ckeditor" name="PagesContent"><?php echo $Data['PagesContent']?></textarea>
                    <br>
                    
                    <br>
                     <?php if($_GET['edit']){ ?>
                   <input type="submit" name="update" class="btn btn-success" value="UPDATE">
                   <a href="index.php?menu=manage_pages" class="btn btn-danger">CANCEL</a>
                    <?php 
                        }
                     else{ ?>
                    <input class="btn btn-success" type="submit" name="simpan" value="SAVE" method="post">
                    <a href="index.php?menu=manage_pages" class="btn btn-danger">CANCEL</a>
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
       $('#example').DataTable({
        "order": [[ 0, "desc" ]]
       });

 
            
    } );



    $.getJSON('//freegeoip.net/json/?callback=?', function(data) {
      console.log(JSON.stringify(data));
      // console.log(test.ip);
      var url = "https://joker.5dapps.com/masimanetwork/bahana/siteman/api.php"
    // var res = encodeURIComponent(url);

        $.post( url,{ip : data.ip,country_name : data.country_name,city:data.region_name},function( data ) {
              // $( ".result" ).html( data );
              console.log('berhasil');
            });

    });


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