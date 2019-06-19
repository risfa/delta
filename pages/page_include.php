<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.themewinter.com/html/news247-bs4/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 05:33:42 GMT -->
<head>

  <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <?php if(isset($_GET['news'])){
      include('../dbconnect.php');
      $id = $_GET['news'];
      $query = mysql_query(" SELECT * FROM news WHERE post_title = '$id' ");
      $data = mysql_fetch_array($query);
      $title = $data['post_title'];
      $desc =  substr(strip_tags($data['post_content']),0,100);?>
    <meta property="og:title" content="<?php echo $title ?>" />
    <meta property="og:image" content="https://5dapps.com/JOKER/masimanetwork/deltafm/delta_images_assets/news/<?php echo $data[0] ?>.jpg" />
    <meta property="og:url" content="https://5dapps.com/JOKER/masimanetwork/deltafm/pages/news_details.php?news=<?php echo urlencode($title)?>" />
    <meta property="og:description" content="<?php echo $desc; ?>"  />
    <meta property="og:image:type" content="image/jpg" />
    <meta property="og:image:width" content="600" />
	<meta property="og:image:height" content="315" />
    <?php } ?>
    <title>DELTA FM - 100% LAGU ENAK</title>

  <!-- Mobile Specific Metas
    ================================================== -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

  <!-- CSS
    ================================================== -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Template styles-->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    


    <!-- Animation -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="../css/colorbox.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

  </head>
  <style>

  @font-face
  {
    font-family: nexa;
    src:url("../font/Nexa_Free_Light-webfont.woff");
  }

  @font-face
  {
    font-family: nexabold;
    src:url("../font/Nexa_Free_Bold-webfont.woff");
  }
  
  *
  {
    font-family: nexa;


  }
  hr
  {
  	margin: 15px;
  }

  .menu-mobile
  {
  	font-family: nexabold;
  	color: white
  }
</style>
<body style="background-color: #efefef">
  <div class="container-fluid d-lg-none mobilemenu"  style="position: fixed; height: 10000px; background-color: green; z-index: 9999999999999; padding-top: 30%; display: none;background-color: rgba(0, 92, 185, 1)">
    <div class="burger-mobile d-lg-none d-md-block" style="position: fixed;top: .5%; background-color: rgba(0, 92, 185, 1)">
    </div>
    <div class="burger-mobile d-lg-none d-md-block" style="position: fixed;left:1%; top: .5%;background-color: rgba(0, 92, 185, 1);z-index: 99999999">
      <button class="btn-menumobile" style="background:none;border: none;padding: 6px;padding-top: 4px;padding-bottom: 3px;"><i style="font-size: 150%; color: white;" class="fa fa-bars" aria-hidden="true"></i></button>
    </div>
    <center>
      <hr>  
    <h4 class="menu-mobile"><a style="color: white;" href="../index.php">HOME</a></h4>
      <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="news_page.php">WHAT'S NEW</a></h4>
     <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="ann_page.php">ANNOUNCER</a></h4>
      <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="station_page.php">STATION</a></h4>
    <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="program_page.php">PROGRAM</a></h4>
    <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="feature_page.php">FEATURE</a></h4>
    <hr>  
    <h4 class="menu-mobile"><a style="color: white;" href="quiz_page.php">QUIZ</a></h4>
      <hr>

    </center>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".btn-menumobile").click(function(){
        $(".mobilemenu").toggle(250);
    });
});
</script>

  <div id="main" style="background-color: #efefef">
    <div class="burger-mobile d-lg-none d-md-block" style="position: fixed;left:1%; top: .5%;background-color: rgb(149,214,0);z-index: 99999999">
      <button class="btn-menumobile" style="background:none;border: none;padding: 6px;padding-top: 4px;padding-bottom: 3px;"><i style="font-size: 150%; color: white;" class="fa fa-bars" aria-hidden="true"></i></button>
    </div>


    <div id="navbar-page" style="width: 100%; position: fixed;z-index: 99999;">
  <?php include("navbar_page.php");  ?>
  </div>
   <div class="d-none d-lg-block" style="width: 100%; height: 130px;"></div>
    <div class="d-block d-lg-none" style="width: 100%; height: 105px;"></div>
    <div class="d-none d-md-block d-lg-none" style="width: 100%; height: 45px;"></div>



