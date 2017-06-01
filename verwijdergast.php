<?php

require_once 'Business/GastService.php';
//require_once 'Exceptions/TitelBestaatException.php';
use Business\GastService;
//use Exceptions\TitelBestaatException;
//require_once('bootstrap.php');

if (isset($_GET["action"]) && $_GET["action"] == "delete") {
        $gSvc = new GastService();
        $gSvc->verwijderGast($_GET["id"]);
        header("location: toonallegasten.php");
        exit(0);
    
} 
