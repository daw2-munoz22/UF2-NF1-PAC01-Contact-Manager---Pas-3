<?php
 
  class Individual extends Entity {
   
    public function __construct($userID) {
      parent::__construct($userID);
     
      $this->propertyTable['firstname'] = 'name1';
      $this->propertyTable['lastname'] = 'name2';

    }

    public function __toString() {
      return $this->firstname . ' ' . $this->lastname;
    }
   
    public function validate() {
      parent::validate();

      //add individual-specific validation
     
    }
 
  }
?>
