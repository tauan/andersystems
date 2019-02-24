<?php 
	include('config/conexao.php');
	$pdo = conectar();

	if(isset($_POST['nome']) and isset($_POST['email']) and isset($_POST['idade']) and isset($_POST['login']) and isset($_POST['senha'])):
		
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$idade = addslashes($_POST['idade']);
			$login = addslashes(trim($_POST['login']));
			$senha = md5($_POST['senha']);

			$insere = $pdo->prepare("INSERT INTO usuarios(id, nome, email, idade, login, senha, permicao) VALUES('', :nome, :email, :idade, :login, :senha, '1')");
			$insere->bindValue(":nome", $nome);
			$insere->bindValue(":email", $email);
			$insere->bindValue(":idade", $idade);
			$insere->bindValue(":login", $login);
			$insere->bindValue(":senha", $senha);

				$busca = $pdo-> prepare("SELECT * FROM usuarios WHERE login = :login or email = :email");
				$busca->bindValue(":login", $login);
				$busca->bindValue(":email", $email);
				$busca->execute();

				if($busca->rowCount()==1):
					$newbusca = $pdo-> prepare("SELECT * FROM usuarios WHERE login = :login");
					$newbusca->bindValue(":login", $login);
					$newbusca->execute();

					$newbusca_ = $pdo-> prepare("SELECT * FROM usuarios WHERE email = :email");
					$newbusca_->bindValue(":email", $email);
					$newbusca_->execute();
					if($newbusca->rowCount()==1):
						header("Location: cadastro.php?msg=falha&cod=1");
					elseif($newbusca_->rowCount()==1):
						header("Location: cadastro.php?msg=falha&cod=2");
					endif;
				else:
					$insere->execute();
					header("Location: cadastro.php?msg=sucesso");	
				endif;


		else: 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/processamento.css">
</head>
<body>

<section id="login-cadastro" class="login-on">
	<!-- hora de retornar mensagem de erro ou sucesso -->
<?php 
	if(isset($_GET['msg']) and $_GET['msg'] == 'falha'):
		if(isset($_GET['cod']) and $_GET['cod']==1):
?>
<div class="msg-falha">O login Informado ja esta sendo usado por outro usuario.</div>
<?php
		elseif(isset($_GET['cod']) and $_GET['cod']==2):
?>
<div class="msg-falha">O email Informado ja esta sendo usado por outro usuario.</div>
<?php
		endif;
	elseif(isset($_GET['msg']) and $_GET['msg'] == 'sucesso'):
		?>
	<div class="sucesso">Cadastro efetuado com sucesso, efetue login ou retorne ao <a href="index.php"> Inicio </a></div>
	<?php
	endif;
 ?>

	<!-- fim da hora de retornar mensagem de erro ou sucesso -->
	
	<div class="container">
		<article class="login-painel">
			<div class="opcoes-login">
				<p id='option-login' onclick="menuOpcaoLogin()">Login</p>
				<p id='option-cadastro' class="opition-login-active" onclick="menuOpcaoCadastro()">registre-se</p>
			</div>
			<div class="box-opcoes">
				<div id="form-login" class="form-login-not-active">
					<form action="" method="post" >
						<p>Login</p>
						<input type="text" name="login" placeholder="Insira seu login ou email" />
						<input type="password" name="senha" placeholder="insira sua senha" />
						<input type="submit" value="Login" />
					</form>
				</div>
					
				<div id="form-cadastro" class="form-login-active">
					<form action="" method="post" >
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