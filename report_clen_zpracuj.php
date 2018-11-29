<?php
ob_start();
session_start();
if(isset($_POST['idclena'])){
    require 'db.php';
    $idclena = $_POST['idclena'];
    $query = mysql_query("SELECT * FROM clen where id_clena = '$idclena'") or die(mysql_error());
    while ($row = mysql_fetch_array($query))
        echo "<ul style='\"list-style-type:none, display: ruby-base; padding: 1px; text-align: center;\"'>    
                <li>Meno: $row[meno]</li>         
                <li>ID Clena: $row[id_clena]</li>  
                <li>Ulica: $row[ulica]</li>         
                <li>Mesto: $row[mesto]</li>   
                <li>PSC: $row[psc]</li>                                       
                </ul>";
    $queryUkony = mysql_query("SELECT vykonane_ukony.datum_poskytnutia as datum_poskytnutia, ukony.nazov as nazov, poskytovatel.meno as meno 
                                      FROM vykonane_ukony join poskytovatel on vykonane_ukony.idposkytovatela = poskytovatel.id_poskytovatela   
                                      join ukony on vykonane_ukony.id_ukonu = ukony.id
                                      WHERE vykonane_ukony.idclena = '$idclena'")or die(mysql_error());
    while ($row = mysql_fetch_array($queryUkony))
        echo "<ul style='\"list-style-type:none, display: ruby-base; padding: 1px; text-align: center;\"'>    
                <li>Datum sluzby: $row[datum_poskytnutia]</li>         
                <li>Meno poskytovatela: $row[meno]</li>  
                <li>Nazov sluzby: $row[nazov]</li>                                               
                </ul>";
        //$bl="index.php";
        /*header("location: $bl");*/}
    else{
        $query = mysql_query("SELECT * FROM `poskytovatel` WHERE `meno` = '$name'") or die (mysql_error());
        $Vysledok = mysql_fetch_array($query);
        if($Vysledok['meno']) {$bl = "index.php?page=login&Alert=9";}
        else {$bl="index.php?page=login&Alert=6";}
        header("location: $bl");}
    mysql_free_result($query);
ob_end_flush();
?>