<?php

libxml_use_internal_errors(true);

function buscaPosts(){
  $html = file_get_contents('origin.html');

  
  $dom = new DOMDocument();
  $dom->loadHTML($html);
  
  $xpath = new DOMXPath($dom);
  
  $cardPosts = $xpath->query("//a[@class='paper-card p-lg bd-gradient-left']");

  foreach ($cardPosts as $cardpost) {
    $postId = $xpath->query(".//div[@class='volume-info']", $cardpost)->item(0);
    $postTitle = $xpath->query(".//h4", $cardpost)->item(0);
    $postType = $xpath->query(".//div[@class='tags mr-sm']", $cardpost)->item(0);
    $postAuthors = $xpath->query(".//span", $cardpost);
    $authorsInstituitions = $xpath->query(".//div[@class='authors']/span/@title", $cardpost);
    $recebeArray = arrayOrdenadoAutorEInstituicao($postAuthors, $authorsInstituitions);
    
    $string = '';
    foreach($recebeArray as $element){
        $string .= $element . '  ||'; 
    };
    print_r($string);
  }    
  

}


function arrayOrdenadoAutorEInstituicao($authors, $institutions){
  $authorsAndInstitutionArray = [];

  for ($i = 1; $i < count($authors); $i++) {
      $authorName = $authors->item($i)->textContent;
      $authorInstitution =  $institutions->item($i)->textContent;
      
      $authorsAndInstitutionArray[] = $authorName;
      $authorsAndInstitutionArray[] = $authorInstitution;
  }
  return $authorsAndInstitutionArray;
};

buscaPosts();