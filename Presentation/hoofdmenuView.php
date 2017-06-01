<!DOCTYPE html>
<html>
    <head>
        <link href="styles/main.css" rel="stylesheet" type="text/css"> 
        <title>Rozemarijn - Hoofdmenu</title>
<!--        <script language="javascript" type="text/javascript">
            window.onload = function(){
               eImg = document.getElementsByTagName('img')[0];
               eImg.src = "images/social engineering.jpg";
            }
        </script>-->
    </head>
    <body>
        <?php
        include("header.php");
//        $connectie = mysqli_connect("localhost", "root", "", "rozemarijn");

         ?>

        <h2>::: Hoofdmenu</h2>
        
        <div style="border: 2px #3399CC solid; padding: 1em 1em" >
        <img src="images/rozemarijn-klein.jpg" alt="foto rozemarijn" >
        <p>Dit is een tool om beter te kunnen communiceren met volwassenen met een mentale beperking. </p>
        <p>De gasten die reeds ingeschreven zijn kan je terugvinden in het overzicht.</p>
        <p>Een gesprek kan je starten nadat je de gast hebt ingelogd.</p>
        <p>De gegevens worden per gast bewaard in een database.</p></div>
            
        <br>
        
         <a href="toonallegasten.php" class="kaderknop">Overzicht gasten</a>
          
           <a href="Presentation/loginForm.php" value="Start gesprek" class="knop but1" style="box-shadow: 1.5px 1.5px 0 1.5px rgba(0,0,0,0.5)">Start gesprek</a>
      
           <a href="../../Portfolio/rozemarijn.html" class="kaderknop">Terug naar Portfolio </a> 
    </body>
</html>