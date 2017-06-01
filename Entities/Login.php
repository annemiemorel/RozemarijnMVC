<?php
//entities/Genre.php
namespace Entities;

class Login {

 private static $idMap = array();  //bevat alle reeds aangemaakte objecten van klasse Genre; static: slechts 1 lijst voor alle Genre-objecten
 
 private $id;
 private $paswoord;
 
 private function __construct($id, $paswoord) {  //private: van buitenaf geen objecten van klas Genre aanmaken, alleen mogelijk vanuit klasse Genre zelf
  $this->id = $id;
  $this->paswoord = $paswoord;
 }
 
 public static function create($id, $paswoord) {  //nieuw object aanmaken (ipv via constructor!)
  if (!isset(self::$idMap[$id])) {  //geindexeerd met id van Genre-object: snel controleren of Genre-object met bepaalde id werd aangemaakt zonder hele array te overlopen
   self::$idMap[$id] = new Login($id, $paswoord);  //indien er nog geen Genre-object met dit id bestaat, dan nieuw Genre-object aanmaken via constructor en aan lijst toevoegen
  } 
  return self::$idMap[$id];  //indien er wel Genre-object met dit id bestaat, dan wordt het bestaande object teruggegeven
 }
 
 public function getId() {
  return $this->id;
 }
 public function getPaswoord () {
  return $this->paswoord;
 }
 
 public function setPaswoord ($paswoord) {
  $this->paswoord = $paswoord;
 }
 
}


