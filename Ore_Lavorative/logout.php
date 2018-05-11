<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	$msg = "LOG-OUT EFFETTUATO.";
	$msg = urlencode($msg); 
	header("location: homepage.php?msg=$msg");
	exit();

?>
	<link rel="stylesheet" type="text/css" href="homepage.css" />
