<?php

$html = file_get_contents('origin.html');
libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);


/* Capturando o ID do post  */
$getIdPost = $xpath->query("//div[@class='volume-info']");

$getTitlePost = $xpath->query("//h4[@class='my-xs paper-title']");

$getType = $xpath->query("//div[@class='tags mr-sm']");

$getAuthor = $xpath->query("//div[@class='authors']");

/* Construtor para separar os autores */

 
$autores =  $getAuthor->item(0);

/* $arrayDeAutores = explode(";", $autores); */

/* print_r($arrayDeAutores); */

/* $getInstituicao = $getAuthor->getAttribute('title'); */

$cardPosts = $xpath->query("//a*[@class='paper-card p-lg bd-gradient-left']");

$cardPost = '';

foreach ($cardPosts as $cardPost) {
  
  echo $cardPost->nodeValue . "<br><br>";
}


