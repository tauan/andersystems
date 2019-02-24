<?php 
session_start();
include("config/conexao.php");
$pdo = conectar();


if(isset($_GET['logoff']) and $_GET['logoff'] == true):
	session_destroy();
	header("Location: index.php");
endif;
if(isset($_POST['login']) and isset($_POST['senha'])):
		$login = addslashes(trim($_POST['login']));
		$senha = md5($_POST['senha']);

		$verifica = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login and senha = :senha");
		$verifica->bindValue(":login", $login);
		$verifica->bindValue(":senha", $senha);
		$verifica->execute();

		if($verifica->rowCount()==1):
			$linha = $verifica->fetchAll(PDO::FETCH_OBJ);
			foreach ($linha as $dados) {
				$id = $dados->id;
				$nome = $dados->nome;
				$idade = $dados->idade;

				echo "Seja bem vindo {$nome}, seu id de usuarios é: {$id} e você tem {$idade} anos.";

				}
			$_SESSION['logado'] = true;
			$_SESSION['user'] = $login;
			$_SESSION['idUser'] = $id;
			if(isset($_GET['continuar'])):
				header("Location: {$_GET['continuar']}");
			else:
				header("Location: index.php");
			endif;
		else:
			echo "Não logado";
		endif;
else:
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<section id="login-cadastro" class="login-on">
	<div class="fechar-login" onclick="showLogin()">
		<div class="ponto-um"></div>
		<div class="ponto-dois"></div>
	</div>
	<div class="container">
		<article class="login-painel">
			<div class="opcoes-login">
				<p id='option-login' class="opition-login-active" onclick="menuOpcaoLogin()">Login</p>
				<p id='option-cadastro' onclick="menuOpcaoCadastro()">registre-se</p>
			</div>
			<div class="box-opcoes">
				<div id="form-login" class="form-login-active">
					<form action="" method="post" >
						<p>Login</p>
						<input type="text" name="login" placeholder="Insira seu login ou email" />
						<input type="password" name="senha" placeholder="insira sua senha" />
						<input type="submit" value="Login" />
					</form>
				</div>
					
				<div id="form-cadastro" class="form-login-not-active">
					<form action="cadastro.php" method="post" >
					<p>Registre-se</p>
					<input type="text" name="nome" placeholder="Insira seu nome" required />
					<input type="email" name="email" placeholder="Insira seu email" required />
					<input type="number" name="idade" placeholder="Insira sua idade" required />
					<input type="text" name="login" placeholder="Insira seu login" required />
					<input type="password" name="senha" placeholder="Insira sua senha" required />
					
					<input type="submit" value="Enviar" />
				</form>
				</div>
				
			</div>
			
		</article>
	</div>
	</section>
<script type="text/javascript" src="config/inicio.js"></script>
</body>
</html>
<?php
endif;


 ?>