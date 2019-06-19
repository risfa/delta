<?php

$id = $_GET['tags_id'];

$get_tags = mysql_query("SELECT * FROM news JOIN news_tags ON news.id = news_tags.news_id WHERE news_tags.tags_id = '$id'");
 $output = '';

 while ($tag_news = mysql_fetch_array($get_tags)) {
 	$post_date = new DateTime($tag_news['post_date']);
	$date_time = $post_date->format('M d,&\nb\sp Y');
 	$output = '<div class="col-md-6">'.
                                '<div class="post-block-style post-grid clearfix">'.
                                    '<div class="post-thumb">'.
                                        '<a href="../pages/news_details.php?news='.$tag_news['ID_news'].'">'.
                                            '<img onclick="post('.$tag_news['ID_news'].')" class="img-fluid" src="../delta_images_assets/news/'. $tag_news['ID_news'].'.jpg" alt="" />'.
                                        '</a>'.
                                    '</div>'.
                                    '<a class="post-cat" href="../pages/news_details.php?news='.$tag_news['ID_news'].'">'.$tag_news['nama'].''.
                                    '</a>'.
                                    '<div class="post-content">'.
                                        '<h2 class="post-title title-large">'.
                                            '<a onclick="post('.$tag_news['ID_news'].')" href="../pages/news_details.php?news='.$tag_news["ID_news"].'">'.$tag_news['post_title'].'</a>'.
                                            '</h2>'.
                                            '<div class="post-meta">'.
                                                '<span class="post-date">Release Date : '.$date_time.' | Category : '.$tag_news["nama"].' </span>'.
                                            '</div>';
                                            $output .= '<p>'.substr(strip_tags($tag_news["post_content"]),0,150).'...</p>'.
                                    '</div>'.
                                '</div>'.
                            '</div>';

 }

echo $output;




 ?>