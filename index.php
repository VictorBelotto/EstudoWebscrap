<?php

$html = file_get_contents('origin.html');
libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

$getH4 = $dom->getElementsByTagName('h4');
$h4 = '';

foreach ($getH4 as $listaDeH4) {
  $textContent = trim($listaDeH4->textContent);

  if (!empty($textContent)) {
    $h4 .= "Titulo: " . $listaDeH4->textContent . "<br> <br>";
  }
};

$idPost = $dom->getElementsByClassName('volume-info');
