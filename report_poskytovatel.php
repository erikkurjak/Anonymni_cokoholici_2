<?php
ob_start();
//session_start();
    require 'db.php';
    $idposkytovatela = trim($_SESSION['UserId']);
    $query = mysql_query("SELECT * FROM poskytovatel where id_poskytovatela = '$idposkytovatela'") or die(mysql_error());
    while ($row = mysql_fetch_array($query))
        echo "<ul style='\"list-style-type:none, display: ruby-base; padding: 1px; text-align: center;\"'>    
                <li>Meno: $row[meno]</li>         
                <li>ID Clena: $row[id_poskytovatela]</li>  
                <li>Ulica: $row[ulica]</li>         
                <li>Mesto: $row[mesto]</li>   
                <li>PSC: $row[psc]</li>                                       
                </ul>";
    $queryUkony = mysql_query("SELECT vykonane_ukony.datum_poskytnutia as datum_poskytnutia, vykonane_ukony.akt_datum as aktdatum, c2.meno as menocl, c2.id_clena as idcl,  ukony.id as kod, ukony.cena as cena  
                                      FROM vykonane_ukony join poskytovatel on vykonane_ukony.idposkytovatela = poskytovatel.id_poskytovatela   
                                      join ukony on vykonane_ukony.id_ukonu = ukony.id
                                      join clen c2 on vykonane_ukony.idclena = c2.id_clena
                                      WHERE vykonane_ukony.idclena = '$idposkytovatela'")or die(mysql_error());
    while ($row = mysql_fetch_array($queryUkony))
        echo "<ul style='\"list-style-type:none, display: ruby-base; padding: 1px; text-align: center;\"'>    
                <li>Datum sluzby: $row[datum_poskytnutia]</li>         
                <li>Datum zapisu: $row[aktdatum]</li>  
                <li>Meno clena: $row[menocl]</li>   
                <li>Cislo clena: $row[idcl]</li>       
                <li>Kod sluzby: $row[kod]</li>    
                <li>Cena sluzby: $row[cena]</li>                                       
                </ul>";

    $querySumy = mysql_query("SELECT count(vykonane_ukony.id) as pocet, sum(ukony.cena) as sumcena FROM vykonane_ukony join poskytovatel on vykonane_ukony.idposkytovatela = poskytovatel.id_poskytovatela   
                                      join ukony on vykonane_ukony.id_ukonu = ukony.id
                                      join clen c2 on vykonane_ukony.idclena = c2.id_clena
                                      WHERE vykonane_ukony.idclena = '$idposkytovatela'")or die(mysql_error());
    while ($row = mysql_fetch_array($querySumy))
        echo "<ul style='\"list-style-type:none, display: ruby-base; padding: 1px; text-align: center;\"'>    
                <li>Pocet sluzieb: $row[pocet]</li>         
                <li>Celkova suma: $row[sumcena]</li>
                </ul>";
   /* echo "<ul style='\"list-style - type:none, display: ruby - base; padding: 1px; text - align: center;\"'>
                <li>$row[pocet]</li>         
                <li>$row[sumcena]</li>
                </ul>";*/
    //$bl="index.php";
    /*header("location: $bl");*/
mysql_free_result($query);
ob_end_flush();
?>