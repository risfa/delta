<?php 

session_start();

?>
<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php?menu=home">Delta CMS</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Front Content <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li <?php if($_GET['menu']=='banner_slider'){?> class="active" <?php } ?>><a href="index.php?menu=banner_slider">Banner slider</a></li>

      <li <?php if($_GET['menu']=='banner_promo_slider'){?> class="active" <?php } ?>><a href="index.php?menu=banner_promo_slider">Banner slider promo</a></li>

      <!-- <li <?php if($_GET['menu']=='listing_streaming'){?> class="active" <?php } ?>><a href="index.php?menu=listing_streaming">Video Streaming</a></li> -->

      <li <?php if($_GET['menu']=='program'){?> class="active" <?php } ?>><a href="index.php?menu=program">Program</a></li>

      <li <?php if($_GET['menu']=='announcer'){?> class="active" <?php } ?>><a href="index.php?menu=announcer">Announcer</a></li>

      <li <?php if($_GET['menu']=='music_chart'){?> class="active" <?php } ?>><a href="index.php?menu=music_chart">Music Top 10</a></li> 

      <li <?php if($_GET['menu']=='quiz'){?> class="active" <?php } ?>><a href="index.php?menu=quiz">Quiz</a></li>

      <li <?php if($_GET['menu']=='stations'){?> class="active" <?php } ?>><a href="index.php?menu=stations">Stations</a></li>
      
      <li <?php if($_GET['menu']=='tags'){?> class="active" <?php } ?>><a href="index.php?menu=tags">Tags</a></li>

      <!-- <li <?php if($_GET['menu']=='podcast'){?> class="active" <?php } ?>><a href="index.php?menu=podcast">Podcast</a></li> -->

      <!-- <li <?php if($_GET['menu']=='podcast_detail'){?> class="active" <?php } ?>><a href="index.php?menu=podcast_detail">Podcast Detail</a></li>  -->

      <li <?php if($_GET['menu']=='youtube_video'){?> class="active" <?php } ?>><a href="index.php?menu=youtube_video">Youtube Video</a></li> 

      <li <?php if($_GET['menu']=='contact_us'){?> class="active" <?php } ?>><a href="index.php?menu=contact_us">Contact Us</a></li>

      <li <?php if($_GET['menu']=='ads'){?> class="active" <?php } ?>><a href="index.php?menu=ads">Ads</a></li>

  </ul>
</li>
    

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News & Feature Management <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li <?php if($_GET['menu']=='news'){?> class="active" <?php } ?>><a href="index.php?menu=news">News</a></li>

              <li <?php if($_GET['menu']=='feature'){?> class="active" <?php } ?>><a href="index.php?menu=feature">Feature</a></li>

              <li <?php if($_GET['menu']=='news_category'){?> class="active" <?php } ?>><a href="index.php?menu=news_category">News Category</a></li>
              <li <?php if($_GET['menu']=='feature_category'){?> class="active" <?php } ?>><a href="index.php?menu=feature_category">Feature Category</a></li>

          </ul>
      </li>




<li <?php if($_GET['menu']=='iplogs'){?> class="active" <?php } ?>><a href="index.php?menu=iplogs">Ip logs</a></li>
<li <?php if($_GET['menu']=='ads_analytic'){?> class="active" <?php } ?>><a href="index.php?menu=ads_analytic">Ads Analytic</a></li>
<li <?php if($_GET['menu']=='manage_pages'){?> class="active" <?php } ?>><a href="index.php?menu=manage_pages">Manage Pages</a></li>
<li ><a href="http://xeniel.5dapps.com/webanalytic/home/login">SEO Tools</a></li>
<li <?php if($_GET['menu']=='admin'){?> class="active" <?php } ?>><a href="index.php?menu=admin">Manage Admin</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
  <li ><a href="index.php?menu=logout">Logout <span class="sr-only">(current)</span>(<?php echo $_SESSION['nama'] ?>)</a></li>
</ul>
</div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>