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



if(isset($_GET['tag'])){

    $tagIdQuery = "SELECT id FROM tags WHERE name_tags = '$_GET[tag]' ";
    
    $tag_query = $db_handle->runQuery($tagIdQuery);
    $tag_id = $tag_query[0]['id'];
    
   
    $sql = "SELECT * FROM news JOIN news_tags ON news.id = news_tags.news_id WHERE news_tags.tags_id = ".$tag_id." ";

    


}else{

$sql = "SELECT news.ID as ID_news,news.post_author,news.post_date,news.post_content,news.post_title,news.pembuat,news_category.nama,news.post_hits,news.ID,news_category.nama FROM news INNER JOIN news_category ON news.news_category_id = news_category.ID_category";
}

$paginationlink = "pagination_ajax/getresult.php?page=";
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
$query_first = $sql . " where news.news_category_id = ".$id." ORDER BY news.ID DESC";
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
$query =  $sql . " ORDER BY news.ID DESC limit " . $start . "," . $perPage->perpage;
// $query =  $query_first . " limit " . $start . "," . $perPage->perpage;
// $querys =  $sql_category."limit". $start . "," . $perPage->perpage;
$faq = $db_handle->runQuery($query);

// $output .= '<pre> this is query : '.$query.' </pre>' ;

}


if(empty($_GET["rowcount"]) && empty($_GET["ID"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}else if(!empty($_GET["ID"])){
    if(isset($_GET['tag'])){
        $sql_pagination = "SELECT * FROM news JOIN news_tags ON news.id = news_tags.news_id WHERE news_tags.tags_id = ".$tag_id." ";
    }else{

    $sql_pagination = "SELECT news.ID as ID_news,news.post_date,news.post_content,news.post_title,news.pembuat,news.post_hits,news.ID,news_category.nama FROM news INNER JOIN news_category ON news.news_category_id = news_category.ID_category where news.news_category_id = ".$_GET["ID"]."";
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
                                        '<a href="../pages/news_details.php?news='.$url.'">'.
                                            '<img onclick="post('.$faq[$k]['ID'].')" class="img-fluid" src="../delta_images_assets/news/'. $faq[$k]['ID'].'.jpg" alt="" />'.
                                        '</a>'.
                                    '</div>'.
                                    '<a class="post-cat" href="../pages/news_details.php?news='.$url.'">'.$faq[$k]['nama'].''.
                                    '</a>'.
                                    '<div class="post-content">'.
                                        '<h2 class="post-title title-large">'.
                                            '<a onclick="post('.$faq[$k]['ID'].')" href="../pages/news_details.php?news='.$url.'">'.$faq[$k]['post_title'].'</a>'.
                                            '</h2>'.
                                            '<div class="post-meta">'.
                                                '<span class="post-date">Release Date : '.$date_time.' | Category : '.$faq[$k]["nama"].' </span>'.
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
