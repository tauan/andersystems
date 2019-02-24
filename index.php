/* sepre sempre o php do html, aqui esta por motivo didatico para aula de construções dessa pagina */

<?php 
	session_start();
	include("config/conexao.php");
	$pdo=conectar();
	if(isset($_SESSION['logado']) and $_SESSION['logado'] == true):
		$idUser = $_SESSION['idUser'];

		$busca = $pdo->prepare("SELECT * FROM usuarios WHERE id = :idUser");
		$busca->bindValue(":idUser", $idUser);
		$busca->execute();

		$linha = $busca->fetchAll(PDO::FETCH_OBJ);
		foreach ($linha as $dados) {
			$nome = $dados->nome;
			$email = $dados->email;
			$idade = $dados->idade;
			$login = $dados->login;
			$permicao = $dados->permicao;
		}
	endif;
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta property="og:locale" content="pt_BR">
	<meta property="og:site_name" content="AnderSystems">
	<meta property="og:title" content="AnderSystems">
	<meta property="og:description" content="AnderSystems, sua empresa de monitoramento esta aqui.">
	<meta property="og:image" content="http://andersystems.com.br/nt-dev/imagens/miniatura.fw.png">
	<title>Ander Systems</title>
	<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link rel="image_src" href="http://andersystems.com.br/nt-dev/imagens/miniatura.fw.png" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/animate.css">
</head>
<body>

	<section id="login-cadastro" class="login-off">
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
					<form action="login.php" method="post" >
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
	<section id="inicio">
		<header>
			<div class="container">
				<div class="logo"><img src="imagens/logo.png" alt="" /></div>
				<div class="header-user">
					<p><img src="imagens/user.png" alt=""> Seja bem vindo <span><?php if(isset($login)): echo $login; else: echo "Visitante"; endif; ?></span><br />
					<?php 

					if(isset($_SESSION['logado']) and $_SESSION['logado'] == true):
					?>
				  	<a href="painel.php">(Ir ao painel -</a> <a href="login.php?logoff=true">Desconectar)</a>
				<?php
					else:
					?>
					<a href="#" id="minhaAncora" onclick="showLogin()">(login / Cadastro)</a></p>
				<?php endif;?>
				</div>
				<div class="menu-mobile">
					<p><img src="imagens/user.png" alt="" /> Seja bem vindo</p>
					<div class="show-menu" onclick="showMenu()">
					</div>
				</div>
				<nav id="menu" class="mobileViewOff">
					<ul>
						<li><a href="#"><img src="imagens/home.png" alt=""><span>Inicio</span></a></li>
						<li class="mcvoff"><div class="mcv"></div></li>
						<li><a href="#quem-somos"><img src="imagens/users.png" alt=""><span>Quem somos</span></a></li>
						<li class="mcvoff"><div class="mcv"></div></li>
						<li><a href="#nossos-servicos"><img src="imagens/list.png" alt=""><span>Nossos serviços</span></a></li>
						<li class="mcvoff"><div class="mcv"></div></li>
						<li><a href="#fotos"><img src="imagens/foto.png" alt=""><span>Fotos</span></a></li>
						<li class="mcvoff"><div class="mcv"></div></li>
						<li><a href="#contato"><img src="imagens/contatos.png" alt=""><span>Contato</span></a></li>
					</ul>
				</nav>
			</div>
		</header>
		<div class="pseudo-menu"></div>
	</section>
	<div class="bg-before"></div>
	<section id="quem-somos">
	<a name="quem-somos"></a>
		<div class="container">
			<article class="quem-somos">
				<div class="align-center">
					<p class="txt-destaque s1 wow bounceInRight">Quem somos?</p>
				</div>
				<p class="txt-descricao dc">A Andersystem é uma empresa que esta a x anos no mercado, prestando servico com qualidade e competencia, instalada em x lugar é indicada pela qualidade no serviçõ A Andersystem é uma empresa que esta a x anos no mercado, prestando servico com qualidade e competencia, instalada em x lugar é indicada pela qualidade no serviçõ</p>
				<p class="txt-descricao dc">A Andersystem é uma empresa que esta a x anos no mercado, prestando servico com qualidade e competencia, instalada em x lugar é indicada pela qualidade no serviçõ</p>
			</article>
			<div class="linha"></div>
		</div>
	</section>
	<section id="servicos">
	<a name="nossos-servicos"></a>
		<article class="servicos-disponiveis">
			<div class="align-center">
				<p class="txt-destaque s1 wow bounceInRight">Serviços disponiveis</p>
			</div>
			<p class="txt-descricao wow rubberBand">A Andersystem trabalha com: Instalação de cameras de monitoramento, Instalação de cercas eletrificadas, Instalação de internet, entre outros</p>
		</article>
	</section>
	<section id="fotos">
	<a name="fotos"></a>
		<article class="section-fotos container">
			<div class="align-center">
				<p class="txt-destaque s2">Fotos</p>
			</div>
			<ul class="wow bounce" data-wow-delay=".3s">
				<li class="l1" >
					<img src="fotos/1.jpg" alt="">
					<div class="ft-conteudo">
						<p class="info-local">Porto Rico</p>
						<p class="info-servico">Instalação de cameras</p>
						<a href="#" class="btn-more-ft">Ver mais</a>
					</div>
				</li>
				<li>
					<img src="fotos/1.jpg" alt="">
					<div class="ft-conteudo">
						<p class="info-local">Porto Rico</p>
						<p class="info-servico">Instalação de cameras</p>
						<a href="#" class="btn-more-ft">Ver mais</a>
					</div>
				</li>
				<li>
					<img src="fotos/1.jpg" alt="">
					<div class="ft-conteudo">
						<p class="info-local">Porto Rico</p>
						<p class="info-servico">Instalação de cameras</p>
						<a href="#" class="btn-more-ft">Ver mais</a>
					</div>
				</li>
			</ul>
			<a href="#" class="ver-td-img"> <img src="imagens/ver-todas.png" class="more-more" alt=""> <span> Ver todas </span> </a>
		</article>
	</section>
	<section id="contato">
	<a name="contato"></a>
		<div class="container">
			<section class="contato-left">
				<p class="txt-destaque-secundario">Nos envie uma mensagem</p>
				<form action="" method="post">
					<input type="text" name="nome" id="fnome" value="<?php if(isset($nome)): echo $nome; endif;?>" class="" placeholder="Nome" onblur="fNome()" required />
					<input type="text" name="email" id="femail" value="<?php if(isset($email)): echo $email; endif;?>" class="" placeholder="Email" onblur="fEmail()" required />
					<input type="text" name="tell" id="ftell" class=""  maxlength="15" placeholder="Telefone" onblur="fTell()" required />
					<textarea name="mensagem" id="fmensagem" class="" placeholder="Mensagem" onblur="fMensagem()"></textarea>
					<input type="submit" class="btn-enviar-msg" value="Enviar" />
				</form>
			</section>
			<section class="contato-right">
				<div class="circulo wow flipInY" data-wow-duration="2s" >
					<p class="txt-destaque h2">Nossos contatos</p>
					<div class="linha-2"></div>
					<ul class="tell-numbers">
						<li><img src="imagens/tell.png" alt="">Anderson Almeida <span>(44) 9122-8335</span></li>
						<li><img src="imagens/tell.png" alt="">Fernando Miquelotto <span>(44) 9929-0232</span></li>
					</ul>
					<p class="email">
						<img src="imagens/env.png" alt=""> atendimento@andersystems.com
					</p>
					<div class="linha-2"></div>
					<ul class="redes-sociais">
						<li><a href="#"><img src="imagens/fb.png" alt=""></a></li>
						<li><a href="#"><img src="imagens/tt.png" alt=""></a></li>
						<li><a href="#"><img src="imagens/ig.png" alt=""></a></li>
					</ul>
					<p class="localizacao">
						Avenida Imaginaria, n° 10<br />
						Jd. Nova holinda <br />
						<img src="imagens/local.fw.png" alt="">
					</p>
				</div>
			</section>
		</div>
	</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="config/formatar.js"></script>
	<script src="config/wow.min.js"></script>
	<script>
              new WOW().init();
    </script>
	<script type="text/javascript" src="config/inicio.js"></script>
	<script src="config/01.js"></script>
</body>
</html>

<?php 
	function paga($variable){
		for($i=1; $i<=3; $i++):
			if($num.$i):

			endif;
		endfor;
	}
 ?>