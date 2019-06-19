<?php


  mysql_connect('localhost','dapps','l1m4d1g1t');
  mysql_select_db('dapps_joker_masimanetwork_deltafm');

  $query_delete = mysql_query('DELETE FROM instagram');
          if ($query_delete) {
            echo('succes delete ');
          }


  function fetchData($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  $result = curl_exec($ch);
  curl_close($ch); 
  return $result;
  }

  
  $result = fetchData("https://api.instagram.com/v1/users/15399742/media/recent/?access_token=15399742.1677ed0.aad4de013dff4b00bb632d7abb42313f&count=6");


  $result = json_decode($result);
  // print_r($result);
  foreach ($result->data as $post) {
     if(empty($post->caption->text)) {
     }
     else {

      $query = mysql_query("INSERT INTO instagram values (null,'".$post->caption->text."','".$post->link."','".$post->images->low_resolution->url."')");
        if ($query) {
          echo('succes'.$post->caption->text.'</br>');
        }else{
          echo('gagal');
        }
        // echo '<a class="instagram-unit" target="blank" href="'.$post->link.'">
        // <img src="'.$post->images->low_resolution->url.'" alt="'.$post->caption->text.'" width="20%" height="auto" />
        // <div class="instagram-desc">'.htmlentities($post->caption->text).' | '.htmlentities(date("F j, Y, g:i a", $post->caption->created_time)).'</div></a>';
     }
  }

  
?>