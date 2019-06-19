<?php
  header('Access-Control-Allow-Origin: *');

  mysql_connect('localhost','dapps','l1m4d1g1t');
  mysql_select_db('dapps_joker_masimanetwork_deltafm');




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

  // echo json_encode($result);
  // if(empty($result->data)){
  //   // echo "Empty Result";
  // }
  $array_url = [];
  // echo json_encode(array('text' => 'test' ));
  foreach ($result->data as $post) {
     if(empty($post->caption->text)) {
      
     }
     else {
      array_push($array_url, $post->images->low_resolution->url);
      // echo json_encode(array('text' => $post->caption->text ));

        // echo '<a class="instagram-unit" target="blank" href="'.$post->link.'">
        // <img src="'.$post->images->low_resolution->url.'" alt="'.$post->caption->text.'" width="20%" height="auto" />
        // <div class="instagram-desc">'.htmlentities($post->caption->text).' | '.htmlentities(date("F j, Y, g:i a", $post->caption->created_time)).'</div></a>';
     }
  }
   echo json_encode(array("url" => $array_url));


?>
