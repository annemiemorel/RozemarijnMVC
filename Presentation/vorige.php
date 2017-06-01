<?php
session_start();
if($_SESSION['teller']>1){
$_SESSION['teller']=$_SESSION['teller']-1;}
elseif($_SESSION['figletter']=='R'){
    $_SESSION['figletter']='A';
    $_SESSION['doetekst']='Wat doe jij graag in je vrije tijd?';
   $_SESSION['recordnr']=$_SESSION['recordnr']-1;
$_SESSION['teller']=1;}

elseif($_SESSION['figletter']=='U'){$_SESSION['figletter']='R';
$_SESSION['recordnr']=$_SESSION['recordnr']-1;
$_SESSION['teller']=1;}
header("Location: activiteiten.php");
exit(0);