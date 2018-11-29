<?php   
	ob_start();
	if(isset($_GET['logout']) and $_GET['logout']=="yes") {
  		Session_Start();
  		Session_Destroy();}
	header ("location: index.php?Alert=2");
	ob_end_flush();
?>