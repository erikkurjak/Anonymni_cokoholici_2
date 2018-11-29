<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
body {margin:0;}
ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
  display: inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: 0.3s;
  font-size: 17px;
}

ul.topnav li a:hover {background-color: #555;}

ul.topnav li.icon {display: none;}

@media screen and (max-width:680px) {
  ul.topnav li:not(:first-child) {display: none;}
  ul.topnav li.icon {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width:680px) {
  ul.topnav.responsive {position: relative;}
  ul.topnav.responsive li.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  ul.topnav.responsive li {
    float: none;
    display: inline;
  }
  ul.topnav.responsive li a {
    display: block;
    text-align: left;
  }
}
</style>
        <link rel='stylesheet' type='text/css' href='css/styly.css' />  
        <title>Anonymni cokoholici</title>
    </head>
    <body>  
        <div id="box">
            <div id="menu">
                <?php
                echo ('<ul class="topnav" id="myTopnav">');
                echo ('<li><a href="index.php">Domov</a></li>');
                echo ('<li><a href="index.php?page=verifikacia">Verifikacia clena</a></li>');
                echo ('<li><a href="index.php?page=report_clen">Report clena</a></li>');
                echo ('<li><a href="index.php?page=clenovia">Clenovia</a></li>');
                echo ('<li><a href="index.php?page=poskytovatelia">Poskytovatelia</a></li>');
                if (isset($_SESSION['prihlaseny'])) {
                    echo ('<li><a href="index.php?page=ukony">Ukony</a></li>');
                    echo ('<li><a href="index.php?page=fakturacia">Fakturacia</a></li>');
                    echo ('<li><a href="index.php?page=report_poskytovatel">Report poskytovatela</a></li>');
                    echo "<li><a href='logout.php?logout=yes'>Logout</a></li>";
                }else {
                    echo "<li><a href='index.php?page=login'>Prihlasit</a></li> "
                    . "<li><a href='index.php?page=pridaj_clena'>Pridaj pouzivatela</a></li>";
                }
                echo ('<li class="icon"><a href="javascript:void(0);" onclick="myFunction()"-->&#9776;</a></li>');
                echo ('</ul>');
                ?>                
            </div>
            <script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
            <div id="obsah">
                <?php
                if (isset($_GET['Alert'])) {
                    require "inc/error_msg.php";
                    $vypis = $_GET['Alert'];
                    if (array_key_exists($vypis, $alerty))
                        echo ('<div id="hlaska"><h2>' . $alerty[$vypis] . '</h2></div>');
                }
                if (isset($_GET['page'])) {
                    $subor = $_GET['page'];
                    $subor2 = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $subor . ".php";
                    if (file_exists($subor2)) {
                        include $subor2;
                    }
                } else {
                    include "homeText.php";
                }
                ?>
            </div>
            
        </div>
        
    </body>
</html>
