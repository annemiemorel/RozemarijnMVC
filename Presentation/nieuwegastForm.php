<?php
    session_start();
//    if (!IsSet($_SESSION['naam'])) {
//    header("Location: login.php");
//    exit(0);
//} 
?>
<html> 
<head><title>Rozemarijn - Nieuwe gast</title></head>

<?php include("header.php"); ?>

<link href="../styles/main.css" rel="stylesheet" type="text/css">    
<h2>::: Nieuwe gast invoeren? </h2>
<?php

if (isset($_GET["error"]) && $_GET["error"] == "gastbestaat") {
 ?>
 <p style="color: red">Gast bestaat al!</p>
 <?php
}
?>
        <form method="post" action="../voeggasttoe.php?action=process">
            <table  width="150" border="0">
                <tbody class="login">
                <tr> <td>Voornaam: </td><td><input type ="text" name="voornaam" required></td></tr><p>
            <tr> <td>Familienaam:</td><td> <input type ="text" name="familienaam" required></td></tr><p>
            <tr> <td>Geboortedatum:</td><td> <input type ="date" name="geboortedatum"></td></tr><p>
            <tr> <td>Geslacht(v,m):</td><td> <input type ="text" name="geslacht" maxlength="1" size="1"></td></tr><p>
            <tr> <td>Paswoord:</td><td> <input type="password" name="paswoord" required></td></tr>   
            </tbody>
            </table>    <br>
            
            <input type="submit" value="Bewaar" class="knop but1">
        </form>
<tr>
    <td><a href="../hoofdmenu.php" class="kaderknop">Terug naar Hoofdmenu</a></td>
    
</tr>
