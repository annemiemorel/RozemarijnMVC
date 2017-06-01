<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$_SESSION['teller']=$_SESSION['teller']+1;
if($_GET["reeks"]==1){ 
header("Location: activiteiten.php");
exit(0);}

