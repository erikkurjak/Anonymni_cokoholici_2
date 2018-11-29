<?php
session_start();
ob_start();
if (isset($_POST['sent'])) {
    $idukonu = trim($_POST['idukonu']);
    $idclena = trim($_POST['idclena']);
    $datumposkytnutia = trim($_POST['datumposkytnutia']);
    $komentar = trim($_POST['komentar']);
    $id_poskytovatela = trim($_SESSION['UserId']);

    if ($idukonu == "" or $idclena == "" or $datumposkytnutia == "") {
        $backlink = "index.php?page=pridaj_clena&Alert=0";
    } else {
        require "db.php";
        $aktdatum = date("d-m-Y");
        if ($komentar == ""){
            $VlozVykonanyUkon = mysql_query("INSERT INTO vykonane_ukony (id_ukonu, idclena, datum_poskytnutia, idposkytovatela, akt_datum)
			VALUES ('$idukonu', '$idclena', '$datumposkytnutia', '$id_poskytovatela', '$aktdatum')")or die(mysql_error());
            $backlink = "index.php?page=fakturacia&Alert=11";
        }
        if ($komentar != "") {
            $VlozOsobu = mysql_query("INSERT INTO vykonane_ukony (id_ukonu, idclena, datum_poskytnutia, idposkytovatela, akt_datum, komentar)
			VALUES ('$idukonu', '$idclena', '$datumposkytnutia', '$id_poskytovatela', '$aktdatum', '$komentar')")or die(mysql_error());
            $backlink = "index.php?page=fakturacia&Alert=11";
        }
    }
} else {
    echo "something went wrong";
}
header("Location: $backlink");
ob_end_flush();
?>
