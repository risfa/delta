<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>DELTA FM</title>

  <!-- Mobile Specific Metas
    ================================================== -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    
  

    <!--Favicon-->
    <link rel="shortcut icon" href="assets/D.png" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">

  <!-- CSS
    ================================================== -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    


    <!-- Animation -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="css/colorbox.css">

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
    src:url("font/Nexa_Free_Light-webfont.woff");
  }

  @font-face
  {
    font-family: nexabold;
    src:url("font/Nexa_Free_Bold-webfont.woff");
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

<body style="width: 100%;">


	<div class="container-fluid d-lg-none mobilemenu"  style="position: fixed; height: 10000px; background-color: green; z-index: 99999; padding-top: 30%; display: none;background-color: rgba(0, 92, 185, 1)">
		<div class="burger-mobile d-lg-none d-md-block" style="position: fixed;top: .5%; background-color: rgba(0, 92, 185, 1)">
  	</div>
		<center>
			<hr>	
		<h4 class="menu-mobile"><a style="color: white;" href="index.php">HOME</a></h4>
			<hr>
    <h4 class="menu-mobile"><a style="color: white;" href="#news">WHAT'S NEWS</a></h4>
     <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="pages/announcer_page.php">ANNOUNCER</a></h4>
      <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="pages/station_page.php">STATION</a></h4>
    <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="pages/program_page.php">PROGRAM</a></h4>
    <hr>
    <h4 class="menu-mobile"><a style="color: white;" href="pages/feature_page.php">FEATURE</a></h4>
		<hr>	
		<h4 class="menu-mobile"><a style="color: white;" href="pages/quiz_page.php">QUIZ</a></h4>
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

  <div id="main" style="background-color: #efefef;">
   
  	<div class="burger-mobile d-lg-none d-md-block" style="position: fixed;left:1%; top: .5%;background-color:rgb(149,214,0);z-index: 99999999">
  		<button class="btn-menumobile" style="background:none;border: none;padding: 6px;padding-top: 4px;padding-bottom: 3px;"><i style="font-size: 150%; color: white;" class="fa fa-bars" aria-hidden="true"></i></button>
  	</div>
    <div id="navbar-lg" class="d-none d-lg-block" style="position: fixed;z-index: 999999; width: 100%">
      <!-- navbar -->
      <?php include ('index_parts/navbar.php'); ?>
    </div>
    <div id="navbar-mobile" class="d-block d-lg-none" style="position: fixed;z-index: 999999; width: 100%">
      <!-- navbar -->
      <?php include ('index_parts/navbar.php'); ?>
    </div>
    <div class="d-none d-lg-block" style="width: 100%; height: 135px;"></div>
    <div class="d-block d-lg-none" style="width: 100%; height: 105px;"></div>
    <div class="d-none d-md-block d-lg-none" style="width: 100%; height: 45px;"></div>

    <!-- slider -->
    <div id="slider">
      <?php include ('index_parts/slider.php')  ?>
    </div>
     <div id="top_ads">
      <?php include('index_parts/top_ads.php'); ?>
    </div>
    <!-- ads -->
    <div id="ads_slot">
      <?php include('index_parts/ads.php') ?>
    </div>
    <!-- content -->
    <div class="container" style="max-width: 100%; padding-left: 8%; padding-right: 8%">
      <!-- stream & promo -->
      <div id="news">
        <?php include ("index_parts/stream.php"); ?>
      </div>
      <div>
        <?php include("index_parts/news.php"); ?>
      </div>
      <div id="music_chart">
        <?php include("index_parts/music.php"); ?>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12 col-lg-7">
          <?php include("index_parts/youtube.php") ?>
        </div>
        <div class="col-md-12 col-lg-5">
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11 col-md-12">
            <?php include("index_parts/instagram.php") ?>
            </div>
          </div>
          
        </div>
      </div>
      <br><br><br>
    </div>
    <div class="container-fluid" id="footer" style="width: 100%;">
      <?php include("index_parts/footer.php"); ?>
    </div>


  </div>
  <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Bootstrap jQuery -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <!-- Color box -->
    <script type="text/javascript" src="js/jquery.colorbox.js"></script>
    <!-- Smoothscroll -->
    <script type="text/javascript" src="js/smoothscroll.js"></script>

    <!-- Template custom -->
    <script type="text/javascript" src="js/custom.js"></script>
    

  </body>

  <!-- Mirrored from demo.themewinter.com/html/news247-bs4/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 05:33:42 GMT -->
  </html>


