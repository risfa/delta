<?php
session_start();
?>

<?php
if(!isset($_GET['menu'])){
echo "<script>document.location.href='index.php?menu=home'</script>";
}
include('dbconnect.php');
if(!$_SESSION['username']){
  include('Login.php');
}else{
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <title>ADMIN DELTAFM</title>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- <link rel="shortcut icon" href="http://pertamina.com/favicon.ico" type="image/x-icon" /> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
     <div class="container-fluid" style="background-color: rgba(0, 92, 185, 1);">
       <div class="container"> <img src="../assets/delta white ijo.png" style="width: 10%; padding-top: 25px; padding-bottom: 25px; "></div>
     </div>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> -->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

      <?php
      include("topnav.php");
       ?>
    <div class="container">
      <?php
      switch ( $_GET['menu'] ) {
        case 'home':
        include('pages/home.php');
        break;
        case 'news':
        include('pages/news.php');
        break;
        case 'feature':
        include('pages/feature.php');
        break;
        case 'program':
        include('pages/program.php');
        break;
        case 'music_chart':
        include('pages/music_chart.php');
        break;

        case 'nominasi':
        include('pages/nominasi.php');
        break;
        case 'podcast':
        include('pages/podcast.php');
        break;
        case 'podcast_detail':
        include('pages/podcast_detail.php');
        break;
        case 'tags':
        include('pages/tags.php');
        break;
        case 'youtube_video':
        include('pages/youtube_video.php');
        break;
        case 'announcer':
        include('pages/announcer.php');
        break;
        case 'news_category':
        include('pages/news_category.php');
        break;
        case 'feature_category':
        include('pages/feature_category.php');
        break;
        case 'stations':
        include('pages/station.php');
        break;
        case 'promo':
        include('pages/promo.php');
        break;
        case 'iplogs':
        include('pages/iplogs.php');
        break;
        case 'contact_us':
        include('pages/contact_us.php');
        break;

         case 'manage_pages':
        include('pages/manage_pages.php');
        break;

        case 'ads':
        include('pages/ads.php');
        break;

        case 'listing_streaming':
        include('pages/listing_streaming.php');
        break;

        case 'banner_slider':
        include('pages/banner_slider.php');
        break;

         case 'banner_promo_slider':
        include('pages/banner_promo_slider.php');
        break; 
        
        case 'admin':
        include('pages/admin.php');
        break;

        case 'quiz':
        include('pages/quiz.php');
        break;





        case 'logout':
        session_destroy();
          echo "<script>document.location.href='index.php'</script>";
        break;
      }
    }
    ?>
  </div>
  <style type="text/css">
    body{
      background-image: url("bg4.jpg");
      background-size: 3%;
    }
  </style>
</body>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
  function test(){
                alert('test');
            }

</script>

</body>
<style type="text/css">
body {
  overflow-x: hidden;
  overflow-y: auto;
}
</style>
</html>
