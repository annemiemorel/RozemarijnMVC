

<?php  //werd geintegreerd in GastDAO als functie veranderbutton($,$)
 session_start();
    
    //$_SESSION['naam']='louis';
    echo "veranderwaarden";
    $keuze=($_GET['keuze']);
    $nr=($_GET['foto']);
    $foto=$_SESSION['figletter'].$nr;
     $recnr=$_SESSION['recordnr'];
    echo "recnr=".$recnr;
     $connectie = mysqli_connect("localhost", "root", "", "rozemarijn");
     $query="SELECT `".$foto."` FROM `onderwerp".$recnr."_".$keuze."` inner join gasten on gasten.id=`onderwerp".$recnr."_".$keuze."`.user_id WHERE voornaam='". $_SESSION['voornaam']."'";
echo $query;   
     
     $resultaat = mysqli_query($connectie, $query)or die("FOUT " . mysqli_errno($connectie) . ": " . mysqli_error($connectie));
     if (mysqli_num_rows($resultaat) == 1) { 
         $rij = mysqli_fetch_assoc($resultaat);
    // echo "Waarde=".$rij[$foto];}
         if ($rij[$foto] == 1){
            $query="UPDATE `onderwerp".$recnr."_".$keuze."` inner join gasten on gasten.id=`onderwerp".$recnr."_".$keuze."`.user_id SET ".$foto." = 0 where voornaam='". $_SESSION['voornaam']."'";
            ?><p><?php
            echo $query;        
            $resultaat = mysqli_query($connectie, $query)or die("FOUT " . mysqli_errno($connectie) . ": " . mysqli_error($connectie));
        }else{
            $query="UPDATE `onderwerp".$recnr."_".$keuze."` inner join gasten on gasten.id=`onderwerp".$recnr."_".$keuze."`.user_id SET ".$foto." = 1 where voornaam='". $_SESSION['voornaam']."'";
           ?><p><?php
           echo $query;
           $resultaat = mysqli_query($connectie, $query) or die("FOUT " . mysqli_errno($connectie) . ": " . mysqli_error($connectie));
           

         }}
    
        ?> 


