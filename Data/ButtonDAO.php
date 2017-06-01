<?php
namespace Data;
require_once 'DBConfig.php';
//require_once 'GastDAO.php';
use Data\DBConfig;
//use Data\GastDAO;
use PDO;

  $gastId=$_SESSION['gast'];
        //echo "gastid = ".$gastId; 
        $teller=$_SESSION['teller'];
         $letter=$_SESSION['figletter'];
         $recnr=$_SESSION['recordnr'];
         //echo "teller=".$teller.",letter=".$letter.",recordnr=".$recnr;
         //Query om aantal gasten in database op te halen 
          $sql = "select * from gasten";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 
             $sth=$dbh->query($sql);$fieldcount=$sth->rowCount();
            //print "Result set fields is ".$fieldcount;
            $_SESSION['velden']=$fieldcount-1;
           
             //Query om onderwerp1-1 onderwerp1_2 enz op te halen voor bepaalde gast
       for($gast=1;$gast<=2;$gast++){
            $sql="SELECT * FROM `onderwerp".$recnr."_".$gast."` WHERE `user_id` = " . $gastId ;
            //echo $sql;
           $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD); 
            $stmt = $dbh->prepare($sql); $stmt->execute();
             $rij = $stmt->fetch(PDO::FETCH_ASSOC);
//            
//            
                if($gast==1){
//                    $_SESSION['data1']=$rij;  //geeft alle onderwerpx-y info voor gekozen user
                    if((($_SESSION['teller']-1)*3+1)<=($_SESSION['velden'])){$_SESSION['Button1']=$rij[$_SESSION['figletter'].(($teller-1)*3+1)];}else{header("Location: activiteiten2.php");exit(0);}
                    if((($_SESSION['teller']-1)*3+2)<=($_SESSION['velden'])){$_SESSION['Button3']=$rij[$_SESSION['figletter'].(($teller-1)*3+2)];}
                    if((($_SESSION['teller']-1)*3+3)<=($_SESSION['velden'])){$_SESSION['Button5']=$rij[$_SESSION['figletter'].(($teller-1)*3+3)];}
                   
                }
                else if($gast==2){
//                    $_SESSION['data2']=$rij;   //geeft alle onderwerp1-2 info voor gekozen user
                    if((($_SESSION['teller']-1)*3+1)<=($_SESSION['velden'])){$_SESSION['Button2']=$rij[$_SESSION['figletter'].(($teller-1)*3+1)];}
                    if((($_SESSION['teller']-1)*3+2)<=($_SESSION['velden'])){$_SESSION['Button4']=$rij[$_SESSION['figletter'].(($teller-1)*3+2)];}
                    if((($_SESSION['teller']-1)*3+3)<=($_SESSION['velden'])){$_SESSION['Button6']=$rij[$_SESSION['figletter'].(($teller-1)*3+3)];}
                } 
            }  
            $dbh=null;

