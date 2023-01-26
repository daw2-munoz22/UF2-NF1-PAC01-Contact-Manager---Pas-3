<?php
require_once('class.Entity.php');  
require_once('class.Individual.php');
require_once('class.Organization.php');

class DataManager 
{
   private static function _getConnection() {
      static $hDB;
   
      if(isset($hDB)) {
         return $hDB;
      }
   
      $hDB = mysqli_connect('localhost', 'root', 'root') or 
        die ('Unable to connect. Check your connection parameters.');
    // make sure you're using the right database
      mysqli_select_db($hDB,'m7uf2') or die(mysqli_error($hDB));
      return $hDB;
  }
 
  public static function getEntityData($entityID) {
    $sql = "SELECT * FROM entities WHERE entityid = $entityID";
    $res = mysqli_query(DataManager::_getConnection(),$sql);
    if(! ($res && mysqli_num_rows($res))) {
      die("Failed getting entity $entityID");
    }
    return mysqli_fetch_assoc($res);
 }

 public static function getAllEntitiesAsObjects() {
    $sql = "SELECT entityid, type from entities";
    $res = mysqli_query(DataManager::_getConnection(), $sql);
   
    if(!$res) {
      die("Failed getting all entities");
    }
   
    if(mysqli_num_rows($res)) {
      $objs = array();
      while($row = mysqli_fetch_assoc($res)) {
        if($row['type'] == 'I') {
          $objs[] = new Individual($row['entityid']);
        } elseif ($row['type'] == 'O') {
          $objs[] = new Organization($row['entityid']);
        } else {
          die("Unknown entity type {$row['type']} encountered!");
        }
      }
      return $objs;
    } else {
      return array();
    }
  } 

   
}
?>
