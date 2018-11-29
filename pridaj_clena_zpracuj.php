<?php
ob_start();
if (isset($_POST['sent'])) {
    $meno = trim($_POST['meno']);
    $ulica = trim($_POST['ulica']);
    $mesto = trim($_POST['mesto']);
    $psc = trim($_POST['psc']);
    $typ = trim($_POST['typ']);

    if ($meno == "" or $ulica == "" or $mesto == "" or $psc == "" or $typ =="") {
        $backlink = "index.php?page=pridaj_clena&Alert=0";
    } else {
        require "db.php";
        if ($typ=="p"){
            $VlozOsobu = mysql_query("INSERT INTO poskytovatel (meno, ulica, mesto, psc)
			VALUES ('$meno', '$ulica', '$mesto', '$psc')")or die(mysql_error());
            $backlink = "index.php?page=poskytovatelia&Alert=3";
        }
        if ($typ=="c") {
            $VlozOsobu = mysql_query("INSERT INTO clen (meno, ulica, mesto, psc)
			VALUES ('$meno', '$ulica', '$mesto', '$psc')")or die(mysql_error());
            $backlink = "index.php?page=clenovia&Alert=4";
        }
        if ($typ!="p"||$typ!="c") {
            $backlink = "index.php?page=clenovia&Alert=8";
        }
        }
} else {
    echo "something went wrong";
}
header("Location: $backlink");
ob_end_flush();
?>
