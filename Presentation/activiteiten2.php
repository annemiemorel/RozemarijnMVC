<?php
    session_start();
    if (!IsSet($_SESSION['voornaam'])) {
    header("Location: loginForm.php");
    exit(0);
} 

/*
 * Opmerking: copieren van image files kan attribute E=encrypted veroorzaken: dan niet meer zichtbaar in tabel
 */
if($_SESSION['figletter']=='A'){
    $_SESSION['figletter']='R';
    $_SESSION['doetekst']='Ga je graag op uitstap?';
   
}
elseif ($_SESSION['figletter']=='R'){$_SESSION['figletter']='U';}
$_SESSION['recordnr']=$_SESSION['recordnr']+1;
$_SESSION['teller']=1;


header("Location: activiteiten.php");
exit(0);