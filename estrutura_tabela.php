<?php



$authorsAndInstitutionArray = [];

for ($i = 1; $i <= 5; $i++) {
    $authorName = "Author $i";
    $authorInstitution = "Author $i Institution";
    
    $authorsAndInstitutionArray[] = $authorName;
    $authorsAndInstitutionArray[] = $authorInstitution;
}

$TitleSpreadsheet = ["ID", "Title", "Type"];

$rowTitleSpreadsheet = array_merge($TitleSpreadsheet, $authorsAndInstitutionArray );


foreach($rowTitleSpreadsheet as $cell){
  echo '<td>' . $cell . '</td>' . ' | ';
};

