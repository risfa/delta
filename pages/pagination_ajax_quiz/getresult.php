<style type="text/css">
    .hover_oranye_tipis{
        background: #007dff;
    }
    .hover_oranye_tipis:hover{
        background: #95d600;
    }
</style>
<?php
require_once("dbcontroller.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();
$output = '';

// $sql = "SELECT * FROM news ORDER BY ID DESC ";
// $sql = "SELECT * FROM news INNER JOIN category news.category = category.ID ORDER BY news.ID DESC ";
echo "<script>console.log( 'Debug Objects: " . $_GET['tag'] . "' );</script>";
//$get_id = mysql_fetch_assoc(mysql_query("SELECT * FROM tags WHERE name_tags = $_GET['tag']"));



$sql = "SELECT quiz.ID_quiz as ID_Quiz,quiz.post_author,quiz.post_date,quiz.post_content,quiz.post_title,quiz.pembuat,quiz.post_hits,quiz.ID_quiz FROM quiz";


$paginationlink = "pagination_ajax_quiz/getresult.php?page=";
$pagination_setting = $_GET["pagination_setting"];

// $sql_category = "SELECT * FROM news AS N INNER JOIN category AS C ON C.ID = N.ID";

$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$id = 0;
if (!empty($_GET['ID'])) {

$output = '';

$id = $_GET['ID'];
// echo "<pre> this is id : ".$id."</pre>";
$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;
// /$query =  $sql_category
$query_first = $sql . " where quiz.news_category_id = ".$id." ORDER BY quiz.ID_quiz DESC";
// $query =  $sql . " limit " . $start . "," . $perPage->perpage;
$query =  $query_first . " limit " . $start . "," . $perPage->perpage;
// $querys =  $sql_category."limit". $start . "," . $perPage->perpage;
$faq = $db_handle->runQuery($query);

// $output .= '<pre> this is query : '.$query.' </pre>' ;

}else{


$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;
// /$query =  $sql_category
// $query_first = $sql . " where ID = ".$id;
$query =  $sql . " ORDER BY quiz.ID_quiz DESC limit " . $start . "," . $perPage->perpage;
// $query =  $query_first . " limit " . $start . "," . $perPage->perpage;
// $querys =  $sql_category."limit". $start . "," . $perPage->perpage;
$faq = $db_handle->runQuery($query);

// $output .= '<pre> this is query : '.$query.' </pre>' ;

}


if(empty($_GET["rowcount"]) && empty($_GET["ID_quiz"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}else if(!empty($_GET["ID_quiz"])){
    if(isset($_GET['tag'])){
        $sql_pagination = "SELECT * FROM news JOIN news_tags ON news.id = news_tags.news_id WHERE news_tags.tags_id = ".$get_id."";
    }else{

    $sql_pagination = "SELECT quiz.ID_quiz as ID_Quiz,quiz.post_author,quiz.post_date,quiz.post_content,quiz.post_title,quiz.pembuat,news_category.nama,quiz.post_hits,quiz.ID_quiz,news_category.nama FROM quiz INNER JOIN news_category ON news.news_category_id = news_category.ID_category where news.news_category_id = ".$_GET["ID_quiz"]."";
}
$_GET["rowcount"] = $db_handle->numRows($sql_pagination);
}else{
$_GET["rowcount"] = $db_handle->numRows($sql);
}

if($pagination_setting == "prev-next") {
    $perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);
} else {
    $perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);
    // $output .='<pre> '.$perpageresult.' </pre>' ;
}


include ("../dbconnect.php");


$output .= '<div class="row">';
foreach($faq as $k=>$v) {
$post_date = new DateTime($faq[$k]['post_date']);
$date_time = $post_date->format('M d,&\nb\sp Y');
$url = urlencode($faq[$k]['post_title']);

 $output .= 
                        
                            '<div class="col-md-6">'.
                                '<div class="post-block-style post-grid clearfix">'.
                                    '<div class="post-thumb">'.
                                        '<a href="../pages/quiz_details.php?quiz='.$url.'">'.
                                            '<img onclick="post('.$faq[$k]['id'].')" class="img-fluid" src="../delta_images_assets/quiz/'. $faq[$k]['ID_quiz'].'.jpg" alt="" />'.
                                        '</a>'.
                                    '</div>'.
                                    '<a class="post-cat" href="../pages/quiz_details.php?quiz='.$url.'">'.$faq[$k]['post_title'].''.
                                    '</a>'.
                                    '<div class="post-content">'.
                                        '<h2 class="post-title title-large">'.
                                            '<a onclick="post('.$faq[$k]['ID'].')" href="../pages/quiz_details.php?quiz='.$url.'">'.$faq[$k]['post_title'].'</a>'.
                                            '</h2>'.
                                            '<div class="post-meta">'.
                                                '<span class="post-date">Release Date : '.$date_time.'</span>'.
                                            '</div>';
                                            $output .= '<p>'.substr(strip_tags($faq[$k]["post_content"]),0,150).'...</p>'.
                                    '</div>'.
                                '</div>'.
                            '</div>';

                                                    // $temp = explode("/>", $faq[$k][3]);
                                                    //
                                                    // if($temp[0]==""){
                                                    //     echo substr(htmlspecialchars_decode($temp[1]),0,180);
                                                        // $output .= '&nbsp;<a class="hover_oranye_tipis" style=" color:white; padding:2px; text-decoration:none;" href="news_details.php?news='.$faq[$k]["ID_news"].' ">Read More</a>';
                                                    // }else{
                                                    //     echo substr(htmlspecialchars_decode($data_news_1[3]),0,180);
                                                    // }
                    //                         $output .= '</p>'.
                    //                     '</p>'.  
                    //         '</div>'.
                    // '</div>';

 // akhir$nama_kategori[1].' | '.

}
$output .= '</div>';
if(!empty($perpageresult)) {
$output .= '<div id="pagination">' . $perpageresult . '</div>';
}
print $output;




?>
