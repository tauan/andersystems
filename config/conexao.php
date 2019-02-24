<?php 
	function conectar() {
		try {
			$pdo = new PDO("mysql:host=localhost;dbname=anderson", "root", "");
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $pdo;
	}
 ?>