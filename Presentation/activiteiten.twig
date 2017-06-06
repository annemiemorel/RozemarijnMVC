
<?php
    session_start();
    if (!IsSet($_SESSION['voornaam'])) {
    header("Location: loginForm.php");
    exit(0);
    
} else{
$gastId=$_SESSION['gast'];
//echo "gastid = ".$gastId; 
$teller=$_SESSION['teller'];
 $letter=$_SESSION['figletter'];
 $recnr=$_SESSION['recordnr'];
 
}

include("../Data/ButtonDAO.php");
?>
<!--//*
// * Opmerking: copieren van image files kan attribute E=encrypted veroorzaken: dan niet meer zichtbaar in tabel
 */-->
<html>
<head><title>Rozemarijn - Onderwerpen</title>
<link href="../styles/main.css" rel="stylesheet" type="text/css">
</head>

<script src="http://use.edgefonts.net/source-sans-pro:n6:default.js" type="text/javascript"></script>

<script >
    function messageWindow(){
            alert("Je krijgt meer te zien in Stap 2!");
    }
    function messageWindow2(butt){
            alert("Dit is " + butt);
    }

     function changeColor($buttonnr,keuze,foto)
     {      
                        
           if ( document.getElementById($buttonnr).style.backgroundColor == 'red' )
            {
               document.getElementById($buttonnr).style.backgroundColor = 'green';   
            }
            else if (document.getElementById($buttonnr).style.backgroundColor == 'green' )
            {  
               document.getElementById($buttonnr).style.backgroundColor='red';
            }
            else
            {
                  document.getElementById($buttonnr).style.backgroundColor='red';
            }   
           if (keuze == "") {
            document.getElementById("txtHint").innerHTML = "";
          //alert("string = leeg");
            return;
            } else { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    //alert("foto = " + foto + "keuze = " + keuze);
                    xmlhttp = new XMLHttpRequest();
                    
                } else {
                    // code for IE6, IE5
                    //alert("string = ActiveXObject");
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                };
                alert("we zijn hier. Keuze=" + keuze+ ",foto="+foto );
                xmlhttp.open("GET","../doeactie.php?action=veranderbutton&keuze=" + keuze + "&foto=" + foto ,true);
                xmlhttp.send();
            }
 
            
    } 
  
    function setColor($buttonNr,$keuze) //$buttonnr) //,$keuze)
     {
        
           if ($keuze==1 )
            {
                //alert("buttonnr = " + $buttonnr +", keuze = "+$keuze);
               document.getElementById($buttonNr).style.backgroundColor = 'red';                       
           }
            else if($keuze==0)
            {//alert("keuze <> 1");
                document.getElementById($buttonNr).style.backgroundColor = 'green'; 
            }
          
        }
  
</script>
<body onload="setColor('Button1',<?php print $_SESSION['Button1']?>);setColor('Button3',
    <?php print $_SESSION['Button3']?>);setColor('Button5',<?php print $_SESSION['Button5']?>);setColor('Button2',
    <?php print $_SESSION['Button2']?>);setColor('Button4',<?php print $_SESSION['Button4']?>);setColor('Button6',<?php print $_SESSION['Button6']?>)">

<div id="wrapper">
<?php include("header.php"); ?>
    <h2>::: Activiteiten van <?php print($_SESSION['voornaam']);?>  </h2> <h3><?php print $_SESSION['doetekst'];?>   </h3>

    <article id="main">
    <form name="form" method="post" > 
        <!--"-->
    <table  border="1">
        <caption>
            MAAK KEUZE 
        </caption>
        <tbody>
          
            <tr>
                <td><img src=""  id="IMG1" alt="" /></td>
                <td><img src=../images/B6.jpg alt=""></td>
                <td><img src=../images/B7.jpg  alt=""></td>
            </tr>
            <tr>     
                <?php if((($_SESSION['teller']-1)*3+1)<=($_SESSION['velden'])){$name="../images/".$_SESSION['figletter'].(($_SESSION['teller']-1)*3+1).".jpg";} else{ $name="images/leegvak.jpg";}?>
                 <td><img src="<?=$name; ?>"  alt="" /></td> 
                 <td><input type="button" class="kleurbutton" id="Button1" onClick="changeColor('Button1',1,((<?php print $_SESSION['teller']?>-1)*3+1))" ></td> 
                 <td><input type="button" class="kleurbutton" id="Button2" onClick="changeColor('Button2',2,((<?php print $_SESSION['teller']?>-1)*3+1))" ></td>     
            </tr>
            <tr>
                <?php if((($_SESSION['teller']-1)*3+2)<=($_SESSION['velden'])){$name="../images/".$_SESSION['figletter'].(($_SESSION['teller']-1)*3+2).".jpg";} else{ $name="images/leegvak.jpg";}?>

                <td><img src="<?=$name; ?>"  alt="" /></td>
                <td><input type="button" class="kleurbutton" id="Button3" onClick="changeColor('Button3',1,((<?php print $_SESSION['teller']?>-1)*3+2))"></td>
                <td><input type="button" class="kleurbutton" id="Button4" onClick="changeColor('Button4',2,((<?php print $_SESSION['teller']?>-1)*3+2))" ></td>

            </tr>
            <tr>
                <?php if((($_SESSION['teller']-1)*3+3)<=($_SESSION['velden'])){$name="../images/".$_SESSION['figletter'].(($_SESSION['teller']-1)*3+3).".jpg";} else{ $name="images/leegvak.jpg";}?>

                <td><img src="<?=$name; ?>" width="150" height="180" alt="" /></td>
                <td><input type="button" class="kleurbutton" id="Button5" onClick="changeColor('Button5',1,((<?php print $_SESSION['teller']?>-1)*3+3))"></td>
                <td><input type="button" class="kleurbutton"  id="Button6" onClick="changeColor('Button6',2,((<?php print $_SESSION['teller']?>-1)*3+3))" ></td>

            </tr>

        </tbody>
    </table></form>
    </article>
    <aside id="sidebar">
        

<tr>
    <td><a href="start.php" class="kaderknop">Terug naar Onderwerpen</a></td><br><br>
     <?php if ((($teller==1)&&($recnr==1))){?>
     <td>******</td> <?php } ?>
    <?php if (!(($teller==1)&&($recnr==1))){?>
    <td><a href="vorige.php?reeks=1" class="kaderknop">Vorige</a></td> <?php } ?>
    [ Pagina <?php print($_SESSION['recordnr']);?> - <?php print($_SESSION['teller']);?> ]
    <td><a href="volgende.php?reeks=1" class="kaderknop">Volgende</a></td>
</tr>
<hr size="1" >
<p><?php print $_SESSION['uitleg'];?></p>
        <br>
    </aside>

</div>

 

</body>

</html>