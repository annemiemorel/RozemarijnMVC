<?php
//toonalleboeken.php
namespace Business;
require_once("Business/GastService.php");


$gService = new GastService();
$gastenLijst = $gService->getGastenOverzicht();
include("Presentation/gastenlijst.php");
?>
