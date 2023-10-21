<?php
require './functions.php';

libxml_use_internal_errors(true);



foreach(buscaPosts() as $post){
if($post->postId->textContent === "137460"){
    print_r($post);
  }
};
 


