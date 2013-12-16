<?php

    $key = "c7e3e1a0bfda4318bbb3cfab68782e78";
    $tag = "thisishowyoumake";
  	$json_string = file_get_contents("https://api.instagram.com/v1/tags/" . $tag . "/media/recent?client_id=" . $key . "&count=9");
  	$parsed_json = json_decode($json_string);

  	foreach( $parsed_json->data as $key=>$value) {
  		
      $imageUrl = $value->images->standard_resolution->url; //get the image's url
      $image = file_get_contents($imageUrl); //get image data
      if($imageUrl != NULL){
        echo '<img src="' . $imageUrl . '">'; //draw images on screen  
      }

      $videoUrl = $value->videos->standard_resolution->url;
      $video = file_get_contents($videoUrl);
      if($videoUrl != NULL){
        echo '<video controls><source src="'. $videoUrl . '" type="video/mp4"/></video>';
      }
    }
?>