<?php
libxml_use_internal_errors(true);
require './vendor/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;
use Box\Spout\Common\Entity\Style\Color;

$border = (new BorderBuilder())
    ->setBorderTop(Color::BLACK, Border::WIDTH_MEDIUM, Border::STYLE_SOLID)
    ->setBorderRight(Color::BLACK, Border::WIDTH_MEDIUM, Border::STYLE_SOLID)
    ->setBorderLeft(Color::BLACK, Border::WIDTH_MEDIUM, Border::STYLE_SOLID)
    ->setBorderBottom(Color::BLACK, Border::WIDTH_MEDIUM, Border::STYLE_SOLID)
    ->build();
$style = (new StyleBuilder())
           ->setFontBold()
           ->setFontSize(15)
           ->setBackgroundColor(Color::LIGHT_GREEN)
           ->setBorder($border)
           ->build();


$filePath = 'dados.xlsx';

$writer = WriterEntityFactory::createXLSXWriter();
$writer->openToFile($filePath);


$authorsAndInstitutionArray = [];

for ($i = 1; $i <= 19; $i++) {
    $authorName = "Author $i";
    $authorInstitution = "Author $i Institution";
    
    $authorsAndInstitutionArray[] = $authorName;
    $authorsAndInstitutionArray[] = $authorInstitution;
}

$TitleSpreadsheet = ["ID", "Title", "Type"];

$rowTitleSpreadsheet = array_merge($TitleSpreadsheet, $authorsAndInstitutionArray );





 $criaRow = WriterEntityFactory::createRowFromArray($rowTitleSpreadsheet, $style) ; 

$writer->addRow($criaRow);

$writer->close();

echo 'Ok';