<?php

  class Organization extends Entity {
   
    public function __construct($userID) {
      parent::__construct($userID);
     
      $this->propertyTable['name'] = 'name1';

    }

    public function __toString() {
      return $this->name;
    }
   
    public function validate() {
      parent::validate();
      //do organization-specific validation
    }
 
  }
?>
