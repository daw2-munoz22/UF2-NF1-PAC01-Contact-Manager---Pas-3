<?php

  require_once('class.PropertyObject.php');

  abstract class Entity extends PropertyObject {
 
    public function __construct($entityID) {
      $arData = DataManager::getEntityData($entityID);
     
      parent::__construct($arData);
  
      $this->propertyTable['entityid'] = 'entityid';
      $this->propertyTable['id'] = 'entityid';
      $this->propertyTable['name1'] = 'sname1';
      $this->propertyTable['name2'] = 'sname2';
      $this->propertyTable['type'] = 'ctype';
  
    }
     
    function setID($val) {
      throw new Exception('You may not alter the value of the ID field!');
    }

    function setEntityID($val) {
      $this->setID($val);
    }

    public function validate() {
      //Add common validation routines     
    }

  }
?>
