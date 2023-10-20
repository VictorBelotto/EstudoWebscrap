<?php


$html = file_get_contents('origin.html');
libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);



$cardPosts = $xpath->query("//a[@class='paper-card p-lg bd-gradient-left']");

/* $postId = $xpath->query(".//div[@class='volume-info']", $cardPost)->item(0);

$postTitle = $xpath->query(".//h4", $cardPost)->item(0);

$postType = $xpath->query(".//div[@class='tags mr-sm']", $cardPost)->item(0);

$postAuthors = $xpath->query(".//span", $cardPost);

$authorsInstituitions = $xpath->query(".//div[@class='authors']/span/@title", $cardPost);
 */


foreach ($cardPosts as $cardpost) {
  $postId = $xpath->query(".//div[@class='volume-info']", $cardpost)->item(0);

  $postTitle = $xpath->query(".//h4", $cardpost)->item(0);

  $postType = $xpath->query(".//div[@class='tags mr-sm']", $cardpost)->item(0);

  $postAuthors = $xpath->query(".//span", $cardpost);

  $authorsInstituitions = $xpath->query(".//div[@class='authors']/span/@title", $cardpost);

  rowPost($postId, $postTitle, $postType, $postAuthors, $authorsInstituitions);
}


function rowPost($id, $title, $type, $authors, $instituitions)
{
  $arrayAuthors = '';
  $arrayInstituition = '';

  for ($i = 0; $i < count($authors); $i++) {
    $arrayAuthors .= '[' . $authors->item($i)->textContent . ']' . " ; ";
  }
  for ($i = 0; $i < count($instituitions); $i++) {
    $arrayInstituition .= '[' . $instituitions->item($i)->textContent . ']' . " ; ";
  }

  echo "<b>ID do Post: </b>  $id->textContent " . '<br>' .
    "<b>Titulo do Post:</b> $title->textContent " . '<br>' .
    "<b>Tipo do Post:</b>  $type->textContent " . '<br>' .
    "<b>Autores do Post:</b>  $arrayAuthors " . '<br>' .
    "<b>Instituição do Post:</b>  $arrayInstituition " . '<br>' .
    '___________________________________________________________________' . '<br>';
}
