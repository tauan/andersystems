<?php 
 	if(isset($_SESSION['logado']) and $_SESSION['logado'] == true):
 	else:
 		$url = "http://" . $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
 		header("Location: login.php?continuar={$url}");
 	endif;
 ?>