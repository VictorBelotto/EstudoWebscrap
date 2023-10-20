<?php

$html = file_get_contents('origin.html');
libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);



$cardPosts = $xpath->query("//a[@class='paper-card p-lg bd-gradient-left']")->item(0);

$titleAtribute = $xpath->query(".//div[@class='authors']/span/@title", $cardPosts);

/* for($i = 0; $i < count($titleAtribute); $i++) {
  echo $titleAtribute->item($i)->nodeValue . "<br>";
} */

$tituloPost = $xpath->query(".//h4", $cardPosts)->item(0);

$autoresPost = $xpath->query(".//span", $cardPosts)->item(0);

$postType = $xpath->query(".//div[@class='tags mr-sm']", $cardPosts)->item(0);

$postId = $xpath->query(".//div[@class='volume-info']", $cardPosts)->item(0);
