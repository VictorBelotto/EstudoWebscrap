<?php
libxml_use_internal_errors(true);
require './vendor/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

$filePath = 'dados.xlsx';

$writer = WriterEntityFactory::createXLSXWriter();
$writer->openToFile($filePath);

$arrayNomes = ['Victor', 'Ellen', 'Felipe'] ;

$criaRow = WriterEntityFactory::createRowFromArray($arrayNomes) ;

$writer->addRow($criaRow);

$writer->close();

echo 'Ok';