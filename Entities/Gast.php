<?php
//entities/Boek.php 

namespace Entities;
use Entities\Gast;

class Gast {

 private static $idMap = array();  //bevat alle reeds aangemaakte objecten van klasse Voornaam; static: slechts 1 lijst voor alle Voornaam-objecten   
 private $id;
 private $familienaam;
 private $voornaam;
 private $geboortedatum;
 private $geslacht;
 private $actief;

 private function __construct($id, $familienaam, $voornaam, $geboortedatum, $geslacht,$actief) {
 $this->id = $id;
 $this->familienaam = $familienaam;
 $this->voornaam = $voornaam;
 $this->geboortedatum = $geboortedatum;
 $this->geslacht = $geslacht;
 $this->actief = $actief;
}

 public static function create($id, $familienaam, $voornaam,$geboortedatum, $geslacht, $actief){
     if (!isset(self::$idMap[$id])) {  //geindexeerd met id van Boek-object: snel controleren of Boek-object met bepaalde id werd aangemaakt zonder hele array te overlopen
   self::$idMap[$id] = new Gast($id, $voornaam, $familienaam, $geboortedatum, $geslacht, $actief);  //indien er nog geen Boek-object met dit id bestaat, dan nieuw Boek-object aanmaken via constructor en aan lijst toevoegen
  } 
  return self::$idMap[$id];  //indien er wel Boek-object met dit id bestaat, dan wordt het bestaande object teruggegeven
 }
 
 public function getId() {
  return $this->id;
 }
 
 public function getFamilienaam() {
  return $this->familienaam;
 }
 
 public function getVoornaam(){
     return $this->voornaam;
 }
 
public function getGeboortedatum(){
    return $this->geboortedatum;
}

public function getGeslacht(){
    return $this->geslacht;
}
 
public function getActief(){
    return $this->actief;
}
 public function setFamilienaam($familienaam) {
  $this->familienaam = $familienaam;
 }
 
 public function setVoornaam($voornaam){
     $this->voornaam=$voornaam;
}
 
 public function setGeboortedatum($geboortedatum) {  
  $this->geboortedatum = $geboortedatum;
 }
 
 public function setGeslacht($geslacht){
     $this->geslacht = $geslacht;
 }
 public function setActief($actief){
     $this->actief = $actief;
 }
}