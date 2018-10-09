<?php

ob_start();
if (isset($_POST['sent'])) {
    $meno = trim($_POST['meno']);
    $priezvisko = trim($_POST['priezvisko']);
    $ulica = trim($_POST['ulica']);
    $mesto = trim($_POST['mesto']);
    $psc = trim($_POST['psc']);

    if ($meno == "" or $priezvisko == "" or $ulica == "" or $mesto == "" or $psc == "") {
        $backlink = "index.php?page=pridaj_clena&Alert=0";
    } else {
        require "db.php";
        $PocetRovnakychNazvov = mysql_result(mysql_query("SELECT COUNT(*) FROM `pouzivatelia` WHERE `meno`='$meno'"), 0);
        if ($PocetRovnakychNazvov != 0) {
            $backlink = "index.php?page=pridaj_clena&Alert=5";      
        } else {
            $VlozData = mysql_query("INSERT INTO pouzivatelia (meno, priezvisko, ulica, mesto, psc)
			VALUES ('$meno', '$priezvisko', '$ulica', '$mesto', '$psc')")or die(mysql_error());     
            $backlink = "index.php?page=clenovia&Alert=3";
        }
    }
} else {
    // náhodný prístup na stránku
    echo "ic v ric";
    //$backlink = "index.php?page=pridaj_clena";
}
header("Location: $backlink");
ob_end_flush();
?>
