<?php 
	$spojenie = mysql_connect("localhost", "root", "") or die ('Zle zadane udaje (asi heslo, server alebo meno.) v inc/db.php');
	mysql_select_db("anonymni_cokoholici", $spojenie) or die ('Zle zadana databaza v inc/db.php<br />'.mysql_error());
	mysql_query("SET NAMES 'cp1250'");
?>
