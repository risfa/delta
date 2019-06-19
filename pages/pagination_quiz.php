<?php  
 //pagination.php  
 // $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_masimanetwork_prambors");  
include ("../dbconnect.php");
 $record_per_page = 8;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 // $query = "SELECT * FROM news ORDER BY ID DESC LIMIT $start_from, $record_per_page";  
 // $result = mysqli_query($connect, $query);  
 
 // while($data_news_1 = mysqli_fetch_array($result))  
   $sql_category = mysql_query("SELECT * FROM quiz JOIN news_category ON news_category.ID_category = news.news_category_id ");
   while($data_category_1 = mysql_fetch_array($data_category)){


   $sql_news = mysql_query("SELECT * FROM quiz ORDER BY ID DESC LIMIT $start_from,$record_per_page "); 
    while($data_news_1 = mysql_fetch_array($sql_news))
 {  

                 // // sini

                 $output .= '<div class="post post-short animated" data-animation="fadeInRight" data-animation-delay="500" style="margin-top:-20px; color: white;">'.
                                        '<div class="row">'.
                                            '<div class="col-md-5">'.
                                                '<div class="post-header">'.
                                                    '<div class="post-image">'.
                                                        '<img src="../delta_images_assets/news/'.$data_news_1[0].",".$data_category_1[news_category_id].'.jpg" alt="" class="img-responsive">'.
                                                    '</div>'.
                                                '</div>'.
                                            '</div>'.
                                            '<div class="col-md-7">'.
                                                '<div class="post-story">'.
                                                    '<div class="post-story-body clearfix">'.
                                                        '<p class="txt1" >'.
                                                            '<a class="hover_oranye_tipis" style="color:#ffc925; text-decoration:none;" href="news_details.php?details='.$data_news_1[0].",".$data_category_1[news_category_id].' ">'.
                                                                '<font  style="font-size: 25px; font-weight: bold; color:#ffc925; line-height: 80%"> '.$data_news_1[4].",".$data_category_1[nama].' </font>'.
                                                            '</a>'.
                                                            '<br>'.
                                                    '</div>'.
                                                '</div>'.
                                            '</div>'.
                                        '</div>'.
                                    '</div>';

  // $output .= '<p> '.$data_news_1['ID'].' </p>';
 }  
}
 echo $output;
 // $output .= '</table><br /><div align="center">';  
 // $page_query = "SELECT * FROM news ORDER BY ID DESC LIMIT";  
 // $page_result = mysqli_query($connect, $page_query);  
 // $total_records = mysqli_num_rows($page_result);  
 // $total_pages = ceil($total_records/$record_per_page);  
 // for($i=1; $i<=$total_pages; $i++)  
 // {  
 //      // $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 //      // $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 // }  
 // $output .= '</div><br /><br />';  
 // print $output;
  
 ?>  