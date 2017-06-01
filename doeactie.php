<?php
namespace Data;
require_once("Data/GastDAO.php");
require_once 'Exceptions/GastBestaatException.php';
use Exceptions\GastBestaatException;

session_start();
if (isset($_GET["action"]) && $_GET["action"] == "login"){

     // echo $_POST["naam"]. "," . $_POST["paswoord"];
    $_SESSION["voornaam"]=$_POST["voornaam"];
    $_SESSION["paswoord"]=$_POST["paswoord"];
//    echo $_SESSION["naam"]. "," . $_SESSION["paswoord"];
        $gDAO= new GastDAO();
        if($gDAO->checklogin($_POST["voornaam"],$_POST["paswoord"])){
//            $_SESSION['setbutton']=0;
            $_SESSION['teller']=1;
          header("location: Presentation/start.php");
            exit(0);
            
        }
        else{
        header("location: Presentation/loginForm.php");
        exit(0);}
    
}
if (isset($_GET["action"]) && $_GET["action"] == "buttonset"){
    $gDAO= new GastDAO();
    $gDAO->setbutton();
//    $_SESSION['setbutton']=1;
    header("location: Presentation/activiteiten.php");
    exit(0);
   
}
if (isset($_GET["action"]) && $_GET["action"] == "veranderbutton"){
    echo("veranderbutton");
    $gDAO= new GastDAO();
    $gDAO->veranderbutton($_GET["keuze"],$_GET["foto"]);
//    header("location: Presentation/activiteiten.php");
//    exit(0);
}