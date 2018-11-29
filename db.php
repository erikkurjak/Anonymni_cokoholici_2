<?php 
	$spojenie = mysql_connect("35.198.174.32:3306", "kurjak", "kurjak") or die ('Zle zadane udaje (asi heslo, server alebo meno.) v inc/db.php');
	mysql_select_db("KURJAK", $spojenie) or die ('Zle zadana databaza v inc/db.php<br />'.mysql_error());
	mysql_query("SET NAMES 'cp1250'");
?>
