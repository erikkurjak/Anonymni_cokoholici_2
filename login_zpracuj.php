x   <?php 
	ob_start();       
	session_start();
	if(isset($_POST['meno'])){
		require 'db.php';
		$name = $_POST['meno'];
		$query = mysql_query("SELECT * FROM `poskytovatel` WHERE `meno` = '$name'") or die (mysql_error());
		$Vysledok = mysql_fetch_array($query);
		if($Vysledok['meno']){
			$_SESSION['prihlaseny'] = 1;
			$_SESSION['UserId'] = $Vysledok['id_poskytovatela'];
			$_SESSION['UserName'] = $Vysledok['meno'];
			
			$bl="index.php"; 
			header("location: $bl");}
		else{
			$query = mysql_query("SELECT * FROM `poskytovatel` WHERE `meno` = '$name'") or die (mysql_error());
			$Vysledok = mysql_fetch_array($query);
			if($Vysledok['meno']) {$bl = "index.php?page=login&Alert=9";}
			else {$bl="index.php?page=login&Alert=6";}
			header("location: $bl");}
		mysql_free_result($query);}
	else{echo "HOW DID U GET HERE ?";
        }
	ob_end_flush();
?>