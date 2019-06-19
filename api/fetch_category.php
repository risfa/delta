<?php 
include("../dbconnect.php");
$category = $_GET['category'];
// echo $category;
$output = "";

if ($_GET['category'] == 'all') {

$sql = mysql_query("SELECT * FROM news JOIN news_category on news.news_category_id = news_category.ID_category ORDER BY post_date DESC  LIMIT 4 ");

}else{

$sql = mysql_query("SELECT * FROM news JOIN news_category on news.news_category_id = news_category.ID_category WHERE news_category.nama = '$category' ORDER BY post_date LIMIT 4 ");

}


while ($data = mysql_fetch_array($sql)){
	$url = urlencode($data['post_title']);
	 $output .=   '<div class="col-md-3">'.
					'<div class="post-overaly-style clearfix">'.
						'<div class="post-thumb" style="height: 250px; background-image:url(delta_images_assets/news/'.$data['ID'].'.jpg); background-size: 100% 250px">'.
							'<a href="pages/news_details.php?news='. $url .'">'.
						'<img class="img-fluid" src="" alt="" />'.
							'</a>'.
							'<a class="post-cat" href="../pages/news_details.php?news='. $url.'">'. $data['nama'] .'</a>'.
						'</div>'.

						'<div class="post-content">'.
							
							'<h4 class="post-title">'.
								'<a href="pages/news_details.php?news='.$url.'">'.
									$data['post_title'].
								'</a>'.
							'</h4>'.
							'<div class="post-meta">'.
							
							'</div>'.
						'</div>'.
					'</div>'.
				'</div>';
}
echo $output;
 ?>
