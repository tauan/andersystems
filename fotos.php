<?php 
	if(isset($_POST['upload'])):
		include('config/conexao.php');


			$pdo = conectar();
			$file = $_FILES['img'];
			$numFile = count(array_filter($file['name']));

			$folder = "user-perfil";

			if($numFile <= 0):
				echo "Selecione uma imagem";
			else:
				$extensoesValidas = array('jpeg', 'jpg', 'png', 'gif');
				for($i=0; $i < $numFile; $i++):
					$nome = $file['name'][$i];
					$tmp = $file['tmp_name'][$i];
					$extensao = pathinfo($nome, PATHINFO_EXTENSION);
					if(in_array($extensao, $extensoesValidas)):
						$novonome = rand().md5($nome).".".$extensao;
						if(move_uploaded_file($tmp, $folder."/".$novonome)):
							echo "Upado";
						endif;
						echo "O arquivio selecionado é : {$file['name'][$i]} <br />";
			 			echo "Extensao valida<br /><br />";
			 			$dimencoes = getimagesize($folder."/".$novonome);
			 			echo $dimencoes[0]." x ".$dimencoes[1];

			 		else:
			 			echo "extensão invalida";
			 		endif;
				endfor;
			endif;

	else:

		?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Fotos</title>
</head>
<body>
	<form action="fotos.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="img[]" multiple /><br />
		<input type="submit" name="upload" value="upload">
	</form>
</body>
</html>

	<?php
	endif;
 ?>