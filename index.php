<?php

$html = file_get_contents('origin.html');
libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);

/*Pegando o titulo do post  */
  $getTitlePost = $xpath->query("//h4[@class='my-xs paper-title']");

  $titleList = '';

  foreach($getTitlePost as $title){
    $textContent = trim($title->textContent);
    $titleList .= "Titulo: " .  $textContent . "<br><br>";
  }

/*Pegando o ID do post  */
  $getIdPost = $xpath->query("//div[@class='volume-info']");

  $listIdPost = '';

  foreach ($getIdPost as $id) {
    $listIdPost .= "ID do post: " . $id->textContent . "<br>";
  };

