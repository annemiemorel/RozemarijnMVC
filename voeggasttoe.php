<?php

require_once 'Business/GastService.php';
require_once 'Exceptions/GastBestaatException.php';
use Business\GastService;
use Exceptions\GastBestaatException;
//require_once('bootstrap.php');

if (isset($_GET["action"]) && $_GET["action"] == "process") {
    try {
        $gSvc = new GastService();
        $gSvc->voegNieuweGastToe($_POST["voornaam"],$_POST["familienaam"], $_POST["geboortedatum"],$_POST["geslacht"],1,$_POST["paswoord"]);
        header("location: toonallegasten.php");
        exit(0);
    } catch (GastBestaatException $ex) {
        header("location: Presentation/nieuwegastForm.php?error=gastbestaat");
        exit(0);
}}else {
 
 if (isset($_GET["error"])){
     
 $error = $_GET["error"];echo "erreur=".$error;
 }

    
//    header("location: Presentation/nieuwegastForm.php?error=".$_GET["error"]); exit(0);
        
 }
 
if (isset($_GET["action"]) && $_GET["action"] == "init"){
    header("location: nieuwegastForm.php");
        exit(0);
}
