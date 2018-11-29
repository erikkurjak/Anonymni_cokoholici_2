<?php
ob_start();
session_start();
if(isset($_POST['idclena'])){
    require 'db.php';
    $idclena = $_POST['idclena'];
    $query = mysql_query("SELECT * FROM `clen` WHERE `id_clena` = '$idclena' AND zaplateneClenstvo = '1'") or die (mysql_error());
    $Vysledok = mysql_fetch_array($query);
    if($Vysledok['idclena']){
        $bl="index.php?page=clenovia&Alert=12";
        header("location: $bl");}
    else{
        $query = mysql_query("SELECT * FROM `clen` WHERE `id_clena` = '$idclena' AND zaplateneClenstvo = '1'") or die (mysql_error());
        $Vysledok = mysql_fetch_array($query);
        if($Vysledok['idclena']) {$bl = "index.php?page=login&Alert=9";}
        else {$bl="index.php?page=login&Alert=13";}
        header("location: $bl");}
    mysql_free_result($query);}
else{echo "HOW DID U GET HERE ?";
}
ob_end_flush();
?>