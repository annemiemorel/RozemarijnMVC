<?php
namespace Data;
require_once 'DBConfig.php';
require_once 'Entities/Gast.php';
require_once 'Entities/Login.php';
require_once 'Exceptions/GastBestaatException.php';
require_once 'Exceptions/FoutPaswoordException.php';
use Data\DBConfig;
use Entities\Login;
use Entities\Gast;
use Exceptions\GastBestaatException;
use Exceptions\FoutPaswoordException;
use PDO;
//session_start();

class GastDAO {

 public function getAll() {  
      $sql = "select * from gasten";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 
     
    $resultSet = $dbh->query($sql);
    $lijst = array();
    foreach ($resultSet as $rij) {
     $gast = Gast::create($rij["id"], $rij["voornaam"], $rij["familienaam"], $rij["geboortedatum"], $rij["geslacht"],$rij["actief"]);
     array_push($lijst, $gast);
    }
    $dbh = null;
    $_SESSION["velden"]=sizeof($lijst);
    //echo "velden in gastdao=".$_SESSION["velden"];
    return $lijst;
}

    public function create($voornaam, $familienaam, $geboortedatum,$geslacht,$actief,$paswoord) {  //nieuwe functie om boek te kunnen toevoegen
        //**foutafhandeling**//
        $bestaandeGast = $this->getByNaam($voornaam, $familienaam);
        if (!is_null($bestaandeGast)){
            throw new GastBestaatException();
        }
        //**foutafhandeling**//
        $sql = "insert into gasten (voornaam, familienaam, geboortedatum,geslacht,actief) values (:voornaam, :familienaam, :geboortedatum,:geslacht,:actief)";
        //echo $sql;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
          $stmt->execute(array(':voornaam' => $voornaam, ':familienaam' => $familienaam, ':geboortedatum'=>$geboortedatum,':geslacht'=>$geslacht,':actief'=>$actief));

        $gastId = $dbh->lastInsertId();
//        $dbh = null;
       
        $sql2 = "insert into login (id, paswoord) values ($gastId, :paswoord)";
        //echo $sql2;
//        $dbh2 = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt2 = $dbh->prepare($sql2);
          $stmt2->execute(array(':paswoord' => $paswoord));
         $sql="INSERT INTO `onderwerp1_1` VALUES ($gastId,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5)";
               $stmt = $dbh->prepare($sql); $stmt->execute();
            $sql="INSERT INTO `onderwerp1_2` VALUES ($gastId,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5)";
             $stmt = $dbh->prepare($sql); $stmt->execute();
            $sql="INSERT INTO `onderwerp2_1` VALUES ($gastId,5,5,5,5,5,5,5,5,5,5,5,5,5,5)";
            $stmt = $dbh->prepare($sql); $stmt->execute();
            $sql="INSERT INTO `onderwerp2_2` VALUES ($gastId,5,5,5,5,5,5,5,5,5,5,5,5,5,5)";
             $stmt = $dbh->prepare($sql); $stmt->execute();
            $sql="INSERT INTO `onderwerp3_1` VALUES ($gastId,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5)";
             $stmt = $dbh->prepare($sql); $stmt->execute();
            $sql="INSERT INTO `onderwerp3_2` VALUES ($gastId,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5)";
             $stmt = $dbh->prepare($sql); $stmt->execute();
        $dbh = null; 
        $gast = Gast::create($gastId, $voornaam, $familienaam, $geboortedatum,$geslacht,$actief);
        $login= Login::create($gastId, $paswoord);
        return $gast;
   } 
    
   
   public function delete($id) {   //nieuwe functie om boek te verwijderen
    $sql = "delete from gasten where id = :id" ; 
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
      $stmt->execute(array(':id' => $id)); 
    $sql = "delete from login where id = :id" ; 
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
      $stmt->execute(array(':id' => $id)); 
    $sql = "delete from onderwerp1_1 where user_id = :id" ; 
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
      $stmt->execute(array(':id' => $id));   
      $sql = "delete from onderwerp1_2 where user_id = :id" ; 
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
      $stmt->execute(array(':id' => $id)); 
      $sql = "delete from onderwerp2_1 where user_id = :id" ; 
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
      $stmt->execute(array(':id' => $id)); 
      $sql = "delete from onderwerp2_2 where user_id = :id" ; 
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
      $stmt->execute(array(':id' => $id)); 
      $sql = "delete from onderwerp3_1 where user_id = :id" ; 
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
      $stmt->execute(array(':id' => $id)); 
      $sql = "delete from onderwerp3_2 where user_id = :id" ; 
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    $stmt = $dbh->prepare($sql);
      $stmt->execute(array(':id' => $id)); 
    $dbh = null;
   }  
   public function checklogin($voornaam,$paswoord){ //functie die controleert of paswoord past bij voornaam gast
       
        $sql="SELECT gasten.id FROM gasten, login WHERE gasten.id=login.id and voornaam= :voornaam and paswoord= :paswoord";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 
        $stmt = $dbh->prepare($sql);
       $stmt->execute(array(':voornaam' => $voornaam, ':paswoord'=> $paswoord));
       $rij = $stmt->fetch(PDO::FETCH_ASSOC);

       if (!$rij) {  //niets gevonden
        echo "false";
        throw new FoutPaswoordException();
        
       } else {
//        $genre = Genre::create($rij["genre_id"], $rij["genre"]);
//        $boek = Boek::create($rij["boek_id"], $rij["titel"], $genre);
       
        $_SESSION["gast"]=$rij["id"];
        echo $_SESSION["gast"]; 
        $dbh = null;
        return true; //wel boek gevonden met titel $titel
       }
   }
   public function veranderbutton($keuze,$nr){  //functie die wijzigingen bij drukken op knop doorgeeft aan database
//       $keuze=($_GET['keuze']);
//    $nr=($_GET['foto']);
    $foto=$_SESSION['figletter'].$nr;
     $recnr=$_SESSION['recordnr'];
    //echo "recnr=".$recnr;
//     $connectie = mysqli_connect("localhost", "root", "", "rozemarijn");
     $sql="SELECT `".$foto."` FROM `onderwerp".$recnr."_".$keuze."` inner join gasten on gasten.id=`onderwerp".$recnr."_".$keuze."`.user_id WHERE voornaam='". $_SESSION['voornaam']."'";
//echo $query;   
     $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
       $rij = $stmt->fetch(PDO::FETCH_ASSOC);
         if ($rij[$foto] == 1){
            $sql="UPDATE `onderwerp".$recnr."_".$keuze."` inner join gasten on gasten.id=`onderwerp".$recnr."_".$keuze."`.user_id SET ".$foto." = 0 where voornaam='". $_SESSION['voornaam']."'";
          $stmt = $dbh->prepare($sql); $stmt->execute();
            echo $sql;    
            }else{
            $sql="UPDATE `onderwerp".$recnr."_".$keuze."` inner join gasten on gasten.id=`onderwerp".$recnr."_".$keuze."`.user_id SET ".$foto." = 1 where voornaam='". $_SESSION['voornaam']."'";
           $stmt = $dbh->prepare($sql); $stmt->execute();
           echo $query;
           $dbh=null;
   }}
   
   
 //    public function getById($id) {  //functie die 1 entiteit gaat ophalen
//     $sql = "select mvc_boeken.id as boek_id, titel, genre_id, genre from mvc_boeken, mvc_genres where genre_id = mvc_genres.id and mvc_boeken.id = :id" ;
//     $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
////    $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8;port=3307","cursusgebruiker","cursuspwd");//;DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 
//     $stmt = $dbh->prepare($sql);
//       $stmt->execute(array(':id' => $id));
//       $rij = $stmt->fetch(PDO::FETCH_ASSOC);
//
//     $genre = Genre::create($rij["genre_id"],  $rij["genre"]);
//     $boek = Boek::create($rij["boek_id"], $rij["titel"], $genre);
//     $dbh = null;
//     return $boek;
//    } 
    public function getByNaam($voornaam, $familienaam){  //functie om na te gaan of er reeds een boek met deze titel bestaat (foutafhandeling)
        $sql = "select * from gasten where voornaam= :voornaam and familienaam = :familienaam" ;
     $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
//         $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8;port=3307","cursusgebruiker","cursuspwd");//;DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 

     $stmt = $dbh->prepare($sql);
       $stmt->execute(array(':voornaam' => $voornaam, ':familienaam' => $familienaam));
       $rij = $stmt->fetch(PDO::FETCH_ASSOC);

       if (!$rij) {  //niets gevonden
        return null;
       } else {
//        $genre = Genre::create($rij["genre_id"], $rij["genre"]);
        $gast = "bestaat"; //Gast::create($rij["voornaam"], $rij["titel"], $genre);
        $dbh = null;
        return $gast; //wel boek gevonden met titel $titel
       }

    }  
//   public function update($boek) {  //nieuwe functie om boekgegevens aan te passen
//    //***foutafhandeling***//
//     $bestaandBoek = $this->getByTitel($boek->getTitel());
//    if (!is_null($bestaandBoek) && ($bestaandBoek->getId() != $boek->getId() )) {
//     throw new TitelBestaatException();
//    }   
//    //**einde foutafhandeling***//
//    $sql = "update mvc_boeken set titel = :titel, genre_id = :genreId  
//    where id = :id";
//    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 
////     $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8;port=3307","cursusgebruiker","cursuspwd");//;DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 
//      $stmt = $dbh->prepare($sql); 
//      $stmt->execute(array(':titel' => $boek->getTitel(), 
//     ':genreId' => $boek->getGenre()->getId(), ':id' => $boek->getId()));
//    $dbh = null;
//   }  
}
