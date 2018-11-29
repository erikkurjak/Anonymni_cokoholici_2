<h2>Ukony</h2>
    <?php
    require 'db.php';
    $query = mysql_query("SELECT * FROM ukony") or die(mysql_error());
    while ($row = mysql_fetch_array($query))
        echo "<ul style='\"list-style-type:none, display: ruby-base; padding: 1px; text-align: center;\"'>    
                <li>$row[id]</li>
                <li>$row[nazov]</li>  
                <li>$row[cena]</li>                                             
                </ul>";
