<?php
ob_start();
if(($_SESSION['username'] == "") || ($_SESSION['userpassword'] == "")) {
	$_SESSION['secury'] = "Login obrigatório";
	header('location: /../pa/index.php');
}
?>