<?php
  require_once('class.DataManager.php'); //everything gets included by it

  function println($data) {
    print $data . "<br>\n";
  }

  $arContacts = DataManager::getAllEntitiesAsObjects();
  foreach($arContacts as $objEntity) {
 
    if(get_class($objEntity) == 'Individual') {
      print "<h1>Individual - {$objEntity->__toString()}</h1>";
    } else {
      print "<h1>Organization - {$objEntity->__toString()}</h1>";
    }
 
    print "<hr>\n";
  }
?>
