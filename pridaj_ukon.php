<?php
ob_start();
session_start();
if (isset($_GET['nazov'])) {
    $nazov = trim($_GET['nazov']);
    $cena = trim($_GET['cena']);
    $poskytovatel = trim($_GET['poskytovatel']);
    $clen = trim($_SESSION['UserName']);
        require "db.php";
        /*$PocetRovnakychNazvov = mysql_result(mysql_query("SELECT COUNT(*) FROM vykonane WHERE `nazov`='$nazov'"), 0);
        if ($PocetRovnakychNazvov != 0) {
            $backlink = "index.php?page=saty&Alert=5";
        } else {*/
            $VlozData = mysql_query("INSERT INTO vykonane_ukony (nazov, cena, poskytovatel, idclena)
			VALUES ('$nazov', '$cena', '$poskytovatel', '$clen')")or die(mysql_error());
            $backlink = "index.php?page=ukony&Alert=3";
       // }
}else {
    $backlink = "index.php?page=ukony&Alert=1";
}
header("Location: $backlink");
ob_end_flush();
?>