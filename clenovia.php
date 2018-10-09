<?php
    require 'db.php';
	$query = mysql_query("SELECT * FROM `pouzivatelia` ") or die (mysql_error());          
            while($row = mysql_fetch_object($query)){                 
                echo $row->id;
                echo "</br>";
                echo $row->meno;
                echo "</br>";
                echo $row->priezvisko;
                echo "</br>";
                echo $row->ulica;
                echo "</br>";
                echo $row->mesto;
                echo "</br>";
                echo $row->psc;
                echo "</br>";
                echo "</br>";
            }
?>

