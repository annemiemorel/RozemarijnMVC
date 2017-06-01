<?php
    session_start();
    if (!IsSet($_SESSION['voornaam'])) {
    header("Location: login.php");
    exit(0);
} 

/*
 * Opmerking: copieren van image files kan attribute E=encrypted veroorzaken: dan niet meer zichtbaar in tabel
 */
echo "<html>"; 
echo "<head><title>Rozemarijn - Onderwerpen</title></head>";
//function haalWaarde(){
         $teller=$_SESSION['teller'];
         $letter=$_SESSION['figletter'];
         $recnr=$_SESSION['recordnr'];
         $connectie = mysqli_connect("localhost", "phpgebruiker", "php", "rozemarijn");
               $query="SELECT * FROM `onderwerp".$recnr."-1` WHERE user_id=1";
            //print $query;
            $resultaat = mysqli_query($connectie, $query)or die("FOUT " . mysqli_errno($connectie) . ": " . mysqli_error($connectie));
            // Return the number of fields in result set
            $fieldcount=mysqli_num_fields($resultaat);
            //print "Result set fields is ".$fieldcount;
            $_SESSION['velden']=$fieldcount-1;
         $query="SELECT user_id FROM gasten WHERE voornaam='". $_SESSION['naam']."'";
         $resultaat = mysqli_query($connectie, $query)or die("FOUT " . mysqli_errno($connectie) . ": " . mysqli_error($connectie));
         if (mysqli_num_rows($resultaat) == 1) {
             $rij = mysqli_fetch_assoc($resultaat);
             $_SESSION['gast']=$rij;  //geeft user_id van gasten vb. user_id van louis is 1
             //print "gastnr=".$_SESSION['gast'];
             }
         for($gast=1;$gast<=2;$gast++){
            $query="SELECT * FROM `onderwerp".$recnr."-".$gast."` WHERE user_id = ".$rij['user_id'];
            //print $query;
            $resultaat = mysqli_query($connectie, $query)or die("FOUT " . mysqli_errno($connectie) . ": " . mysqli_error($connectie));
            if (mysqli_num_rows($resultaat) == 1) {
                $rij = mysqli_fetch_assoc($resultaat);
                if($gast==1){
                    $_SESSION['data1']=$rij;  //geeft alle onderwerp1-1 info voor gekozen user
                    if((($_SESSION['teller']-1)*3+1)<=($_SESSION['velden'])){$_SESSION['Button1']=$rij[$_SESSION['figletter'].(($teller-1)*3+1)];}else{header("Location: activiteiten2.php");exit(0);}
                    if((($_SESSION['teller']-1)*3+2)<=($_SESSION['velden'])){$_SESSION['Button3']=$rij[$_SESSION['figletter'].(($teller-1)*3+2)];}
                    if((($_SESSION['teller']-1)*3+3)<=($_SESSION['velden'])){$_SESSION['Button5']=$rij[$_SESSION['figletter'].(($teller-1)*3+3)];}
                }
                else if($gast==2){
                    $_SESSION['data2']=$rij;   //geeft alle onderwerp1-2 info voor gekozen user
                    if((($_SESSION['teller']-1)*3+1)<=($_SESSION['velden'])){$_SESSION['Button2']=$rij[$_SESSION['figletter'].(($teller-1)*3+1)];}
                    if((($_SESSION['teller']-1)*3+2)<=($_SESSION['velden'])){$_SESSION['Button4']=$rij[$_SESSION['figletter'].(($teller-1)*3+2)];}
                    if((($_SESSION['teller']-1)*3+3)<=($_SESSION['velden'])){$_SESSION['Button6']=$rij[$_SESSION['figletter'].(($teller-1)*3+3)];}
                } 
            }  
         }//print_r($_SESSION);
   

 function veranderWaarde(){
        //if($button===1){      
        if($_SESSION['Button1']==1){$_SESSION['Button1']=0;} else{ $_SESSION['Button1']=1;}
        $connectie = mysqli_connect("localhost", "phpgebruiker", "php", "rozemarijn");
        $query="UPDATE `onderwerp".$recnr."-1` SET `".$_SESSION['figletter']."1` = ".$_SESSION['Button1'].",`".$_SESSION['figletter']."2` = ".$_SESSION['Button3'].",`".$_SESSION['figletter']."3` = ". $_SESSION['Button5']." WHERE user_id =1";  //. $_SESSION['gast']['user_id'];
        $resultaat = mysqli_query($connectie, $query)or die("FOUT " . mysqli_errno($connectie) . ": " . mysqli_error($connectie));

        } 
?>
<script src="http://use.edgefonts.net/source-sans-pro:n6:default.js" type="text/javascript"></script>

<link href="styles/main.css" rel="stylesheet" type="text/css">

<body onload="setColor('Button1',<?php print $_SESSION['Button1']?>);setColor('Button3',<?php print $_SESSION['Button3']?>);setColor('Button5',<?php print $_SESSION['Button5']?>);setColor('Button2',<?php print $_SESSION['Button2']?>);setColor('Button4',<?php print $_SESSION['Button4']?>);setColor('Button6',<?php print $_SESSION['Button6']?>)">

<div id="wrapper">
<?php include("header.php"); ?>
<h2>::: Activiteiten van <?php print($_SESSION['naam']);?> -<?php print $_SESSION['doetekst'];?>   </h2>

    <article id="main">
    <form name="form" method="post" > 
        <!--"-->
    <table width="400" height="330" border="1">
        <caption>
            MAAK KEUZE 
        </caption>
        <tbody>

            <tr>
                <td><img src="" width="150" id="IMG1" alt="" /></td>
                <td><img src=images/B6.jpg width="150" alt=""></td>
                <td><img src=images/B7.jpg width="150" alt=""></td>
            </tr>
            <tr>     
                <?php if((($_SESSION['teller']-1)*3+1)<=($_SESSION['velden'])){$name="images/".$_SESSION['figletter'].(($_SESSION['teller']-1)*3+1).".jpg";} else{ $name="images/leegvak.jpg";}?>
                 <td><img src="<?=$name; ?>" width="150" height="180" alt="" /></td> 
                 <td><input type="button" width="150"  id="Button1" onClick="changeColor('Button1',1,((<?php print $_SESSION['teller']?>-1)*3+1))" ></td> 
                 <td><input type="button" width="150" id="Button2" onClick="changeColor('Button2',2,((<?php print $_SESSION['teller']?>-1)*3+1))" ></td>     
            </tr>
            <tr>
                <?php if((($_SESSION['teller']-1)*3+2)<=($_SESSION['velden'])){$name="images/".$_SESSION['figletter'].(($_SESSION['teller']-1)*3+2).".jpg";} else{ $name="images/leegvak.jpg";}?>

                <td><img src="<?=$name; ?>" width="150" height="180" alt="" /></td>
                <td><input type="button" width="150" id="Button3" onClick="changeColor('Button3',1,((<?php print $_SESSION['teller']?>-1)*3+2))"></td>
                <td><input type="button" width="150" id="Button4" onClick="changeColor('Button4',2,((<?php print $_SESSION['teller']?>-1)*3+2))" ></td>

            </tr>
            <tr>
                <?php if((($_SESSION['teller']-1)*3+3)<=($_SESSION['velden'])){$name="images/".$_SESSION['figletter'].(($_SESSION['teller']-1)*3+3).".jpg";} else{ $name="images/leegvak.jpg";}?>

                <td><img src="<?=$name; ?>" width="150" height="180" alt="" /></td>
                <td><input type="button" width="150" id="Button5" onClick="changeColor('Button5',1,((<?php print $_SESSION['teller']?>-1)*3+3))"></td>
                <td><input type="button" width="150" id="Button6" onClick="changeColor('Button6',2,((<?php print $_SESSION['teller']?>-1)*3+3))" ></td>

            </tr>

        </tbody>
    </table></form>
    </article>
    <aside id="sidebar">
        <p><?php print $_SESSION['uitleg'];?></p>
    </aside>

</div>

 <br>
<hr size="1" >
<tr>
    <td><a href="start.php">Terug naar Onderwerpen</a></td>
    <?php if (!(($teller==1)&&($recnr==1))){?>
    <td><a href="vorige.php">Vorige</a></td> <?php } ?>
    [ Pagina <?php print($_SESSION['recordnr']);?> - <?php print($_SESSION['teller']);?> ]
    <td><a href="volgende.php">Volgende</a></td>
</tr>
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
           // alert("string = leeg");
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
                //alert("we zijn hier");
                xmlhttp.open("GET","veranderwaarden.php?keuze=" + keuze + "&foto=" + foto ,true);
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
</body>

</html>