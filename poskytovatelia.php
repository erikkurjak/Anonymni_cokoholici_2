<?php
require 'db.php';
$query = mysql_query("SELECT * FROM `poskytovatel`") or die (mysql_error());
while($row = mysql_fetch_object($query)){
    echo $row->id_poskytovatela;
    echo "</br>";
    echo $row->meno;
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

