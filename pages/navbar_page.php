<center> 
</center>
<?php 
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
 ?>
   <header id="header" class="header" style="padding: 0px;">
            <div class="row" style="background-color:  rgba(0, 92, 185, 1)  ">
               <div class="col-lg-8 col-6" style="background-color:rgb(149,214,0);" >
                  <div class="logo" style="padding-left: 15%; padding-top: 10px; padding-bottom: 10px;">
                      <a href="../index.php">
                        <img class="img-responsive d-none d-lg-block" style="width: 200px;"  src="../assets/DELTA FM.png" alt="">
                        <div class="col-md-12 d-none d-md-block d-lg-none">
                 <center class="" ><img style="width: 90%;height: 60px;padding-right:15%;" src="../assets/DELTA FM.png"></center>
                 </div>
                         <img class="img-responsive d-block d-md-none" style="margin-left: 20%;height: 30px;"  src="../assets/DELTA FM.png" alt=""></center>
                      </a>
                  </div>
               </div><!-- logo col end -->
               <div class="col-lg-4 col-6" style="background-color: rgba(0, 92, 185, 1)  ">
                
                  <div class="col-md-12 top-social text-lg-center text-md-center" style="margin">
                  <ul class="unstyled d-none d-lg-block" style="padding-top: 4%;">
                     <li style="margin: auto;">
                        <a title="Facebook" href="#">
                           <span class="social-icon"><img style="width: 18px" src="../assets/fb.svg"></span>
                        </a>
                        <a title="Instagram" href="#">
                           <span class="social-icon"><img style="width: 18px" src="../assets/ig.svg"></span>
                        </a>
                        <a title="Twitter" href="#">
                           <span class="social-icon"><img style="width: 18px" src="../assets/twitter.svg"></span>
                        </a>
                        <a title="Youtube" href="#">
                           <span class="social-icon"><img style="width: 18px" src="../assets/yt.svg"></span>
                        </a>
                        <a title="Soundcloud" href="#">
                           <span class="social-icon"><img style="width: 18px" src="../assets/soundcloud.svg"></i></span>
                        </a>
                        <a  title="playstore" href="#">
                           <span class="social-icon"><img style="width: 80px;" src="../assets/Play_store.svg"></span>
                        </a>
                          <a  title="playstore" href="#">
                           <span class="social-icon"><img style="width: 80px;" src="../assets/App_store.svg"></span>
                        </a>
                     </li>
                  </ul><!-- Ul end -->
                     <ul class="unstyled d-block d-lg-none" style="padding-top: 2%;">
                     <li style="margin: auto;">
                        <a title="Facebook" href="#">
                           <span class="social-icon"><img style="width: 13px" src="../assets/fb.svg"></span>
                        </a>
                        <a title="Instagram" href="#">
                           <span class="social-icon"><img style="width: 13px" src="../assets/ig.svg"></span>
                        </a>
                        <a title="Twitter" href="#">
                           <span class="social-icon"><img style="width: 13px" src="../assets/twitter.svg"></span>
                        </a>
                        <a title="Youtube" href="#">
                           <span class="social-icon"><img style="width: 13px" src="../assets/yt.svg"></span>
                        </a>
                        <a title="Soundcloud" href="#" style="margin-right: 10px">
                           <span class="social-icon"><img style="width: 13px" src="../assets/soundcloud.svg"></i></span>
                        </a>
                        <a  title="playstore" href="#">
                           <span ><img style="width: 30%;" src="../assets/Play_store.svg"></span>
                        </a>
                          <a  title="playstore" href="#">
                           <span ><img style="width: 30%;" src="../assets/App_store.svg"></span>
                        </a>
                     </li>
                  </ul><!-- Ul end -->
               </div><!--/ Top social col end -->
              
               </div>
   
               <!-- <div style="background-color: white;" class="col-md-9 col-sm-12 header-right">
                  <div style="max-height: 80%;" class="ad-banner float-right">
                     <h1>ADS SLOT</h1>
                  </div>
               </div> --><!-- header right end -->
            </div><!-- Row end -->
   </header><!--/ Header end -->

      <div class="main-nav light-bg clearfix " style="background-color: white;">
         <div class="container" style="max-width: 100%; padding-top:5px; padding-bottom: 5px;">
            <div class="row">
               <div class="col-lg-8">
               <nav class="navbar navbar-expand-lg col site-navigation navigation" style="padding: 0px">
                  <div class="site-nav-inner float-left">
                  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button> -->
                  <!-- End of Navbar toggler -->
   
                     <div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul style="padding-left: 15vh;" class="nav navbar-nav">
                           <li <?php if(strpos($actual_link, 'index')){ ?> class ='active' <?php } ?> class="nav-item dropdown mega">
                              <a href="../index.php" class="nav-link">Home </a>
                           </li>

                            <li <?php if(strpos($actual_link, 'news_page')){ ?> class ='active' <?php } ?>>
                              <a class="niws" href="news_page.php">What's New</a>
                           </li>
                           <li <?php if(strpos($actual_link, 'ann_page')){ ?> class ='active' <?php } ?> >
                              <a href="ann_page.php">Announcer</a>
                           </li>
                           <li <?php if(strpos($actual_link, 'station_page')){ ?> class ='active' <?php } ?>>
                              <a href="station_page.php">Station</a>
                           </li>
      
                           <li <?php if(strpos($actual_link, 'program_page')){ ?> class ='active' <?php } ?> >
                              <a href="program_page.php" >Program</a>
                     
                           </li><!-- Tab menu end -->
   
                           <li<?php if(strpos($actual_link, 'feature_page')){ ?> class ='active' <?php } ?>>
                              <a href="feature_page.php">Feature</a>
                           </li>
   
                           
                           <li<?php if(strpos($actual_link, 'quiz_page')){ ?> class ='active' <?php } ?>>
                              <a href="quiz_page.php">Quiz</a>
                           </li>
                        </ul><!--/ Nav ul end -->
                     </div><!--/ Collapse end -->
   
                  </div><!-- Site Navbar inner end -->

               </nav><!--/ Navigation end -->
               </div>
                <div class="col-lg-4 d-none d-lg-block"> <a href="http://streaming.deltafm.net/" target="_blank"><img style="width: 175px;margin: auto;" src="../assets/stream.svg"></a><img style="width: 175px;margin-left: 2%;" src="../assets/delta_jukebox.png"></div>
                <div class="col-md-12 d-none d-md-block d-lg-none">
                 <center class="" ><img style="width: 30%;" src="../assets/delta_jukebox.png"></center>
                 </div>
                <center class="d-block d-md-none" ><a href="http://streaming.deltafm.net/" target="_blank"><img style="width: 40%;" src="../assets/stream.svg"></a><img style="width: 40%;" src="../assets/delta_jukebox.png"></center>
            </div><!--/ Row end -->
         </div><!--/ Container end -->
   
      </div><!-- Menu wrapper end -->

<style>
  .niws
  {
    transition-duration: 5s;
  }
</style>