<?php 
	session_start();
	include("config/trava.php");
 ?>
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
 	<meta charset="UTF-8">
 	<title>PAINEL</title>
 	<link rel="stylesheet" href="css/painel.css" />
 </head>
 <body>
 <aside id="barra-lateral">
 	<div class="info-perfil">
 		<div class="foto-perfil">
 			<img src="user-perfil/1935125_1036797006372637_5460010461677962637_n.jpg" alt="">
 		</div>
 		<p>Seja bem vindo</p>
 	</div>
 	<nav>
 		<ul>
 			<li><a href="#"></a></li>
 		</ul>
 	</nav>
 	
 </aside>
 <header id="barra-menu"></header>
 <section id="corpo">
 <br> <br>
 	<?php 
 		$arquivo = "foto.png";
 		$extensao = pathinfo($arquivo, PATHINFO_EXTENSION);

 		$extensoesValidas = array('jpeg', 'jpg', 'png', 'gif');

 		$nomeArquivo = pathinfo($arquivo, PATHINFO_FILENAME);

 		if(in_array($extensao, $extensoesValidas)):
 			echo "Você chamou {$nomeArquivo}.{$extensao}";
 			echo "Extensao valida";
 		else:
 			echo "extensão invalida";
 		endif;
 	 ?>
 </section>
 	
 </body>
 </html>