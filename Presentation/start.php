<?php
    session_start();
    if (!IsSet($_SESSION['voornaam'])) {
    header("Location: loginForm.php");
    exit(0);
} ?>
<html>
<head><title>Rozemarijn - Start</title></head>
<link href="../styles/main.css" rel="stylesheet" type="text/css">
<body>
<?php
include("header.php");
//$connectie = mysqli_connect("localhost", "root", "", "rozemarijn");
?>

<h2>::: Onderwerpen voor <?php print($_SESSION['voornaam']);?></h2>
<ul>
   <input type="button" onClick="window.location.href='activiteiten.php'" value="Activiteiten en ontplooiing" class="knop but1"> 
   <br><br>
    <input type="button" onClick="window.location.href='onderwerp2.php'" value="Onderwerp 2" class="knop but2" >
    <br><br>
    <input type="button" onClick="window.location.href='onderwerp3.php'" value="Onderwerp 3" class="knop but3" >
   <br>
</ul>
<?php include("footer.php"); ?> *** <a href="loginForm.php" class="kaderknop"> Andere gast kiezen </a>
</body>
</html>
