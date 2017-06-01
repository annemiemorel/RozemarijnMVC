<?php
//business/BoekService.php
//**maakt gebruik van class loader Doctrine**//
namespace Business;
require_once 'Data/GastDAO.php';
use Data\GastDAO;


class GastService {

 public function getGastenOverzicht() {
  $bDAO = new GastDAO();
  $lijst = $bDAO->getAll();
  return $lijst;
 }
 public function voegNieuweGastToe($voornaam,$familienaam,$geboortedatum,$geslacht,$actief,$paswoord) { //functie nodig om boek toe te voegen
    $gDAO = new GastDAO();
    $gDAO->create($voornaam, $familienaam, $geboortedatum,$geslacht,$actief,$paswoord);
} 

public function verwijderGast($id) {  //functie om boek te verwijderen
 $gDAO = new GastDAO();
 $gDAO->delete($id);
}  
public function checkGast($voornaam,$paswoord){
    $gDAO = new GastDAO();
    $gDAO->checklogin($voornaam, $paswoord);
}
//public function haalBoekOp($id) {  //functie om boekgegevens aan te passen
// $boekDAO = new BoekDAO();
// $boek = $boekDAO->getById($id);
// return $boek;
//}
//
//public function updateBoek($id, $titel, $genreId) {//functie om boekgegevens aan te passen
// $genreDAO = new GenreDAO();
// $boekDAO = new BoekDAO();
// $genre = $genreDAO->getById($genreId);
// $boek = $boekDAO->getById($id);
// $boek->setTitel($titel);
// $boek->setGenre($genre);
// $boekDAO->update($boek);
//} 
}
