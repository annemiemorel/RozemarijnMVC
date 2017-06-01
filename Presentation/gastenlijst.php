<!DOCTYPE HTML>
<!-- presentation/boekenlijst.php -->
<html>
 <head>
  <meta charset=utf-8>
  <link href="styles/main.css" rel="stylesheet" type="text/css"> 
  <title>Rozemarijn</title>
  <style>
   /*table { border-collapse: collapse; }*/
   td, th { border: 1px solid black; padding: 3px; }
   th { background-color: #ddd; }
  </style>
 </head>
 <body>
  <?php include("header.php"); ?>   
  <h2>::: Gastenlijst</h2>

  <a href="hoofdmenu.php" class="kaderknop" >Terug naar Hoofdmenu</a>***<a href="Presentation/nieuwegastForm.php" class="kaderknop"> Gast toevoegen</a>
  <br>
  <table >
    <tbody class="resultaten">
<br>
<th >Naam</th>
<th >Familienaam</th>
<th ></th>

</tr>
  <?php
foreach ($gastenLijst as $gast) {  //variabele $boekenlijst wordt aangemaakt in toonalleboeken.php !!!
    ?>
    <tr>
     <td>
       <!--ook hier hyperlink toevoegen om boekgegevens aan te passen-->
        <?php print($gast->getVoornaam());?>
    
     </td>
     <td> 
      <?php print($gast->getFamilienaam());?>
     </td>
     
     <td> 
         <a href="updategast.php?id=<?php print($gast->getId());?>">Aanpassen /</a><a href="verwijdergast.php?action=delete&id=<?php print($gast->getId());?>"> Verwijder</a>
    </td>

    </tr>
    <?php
   }
   ?>
    </tbody>
</table>
<p>


    
    

