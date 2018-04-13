<?php

	session_start();

	if((isset($_SESSION['usuario_id'])) && ($_SESSION['id'] == session_id())){

		header('Location:home.php');

	}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Felipe Lima de Souza">
	<title>Cadastro de Pessoas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

	<div class="voltar">

		<button id="voltar-ao-site" title="Voltar ao Acesso Restrito"><i class="glyphicon glyphicon-menu-left"></i></button>

	</div>
	<article>

		<div class="div_center" id="voltar-senha">

			<img src="images/logo-sobre.png" class="img_sobre">
		
			<form action="../control/SessionControl.php" method="post" class="form_index form">
				
				<input type="text" name="input_usuario" placeholder="Usuário" class="input_usuario" maxlength="50">

				<br><br>

				<input type="password" name="input_senha" placeholder="Senha" class="input_senha" maxlength="50">

				<br><br>

				<a href="#" id="esqueci-minha-senha">Esqueci Minha Senha</a>

				<button type="submit" class="button_entrar">Entrar</button>

			</form>

		</div>

		<div class="div_center" id="esqueci-senha">

			<img src="images/logo-sobre.png" class="img_sobre">
		
			<form action="../control/EsqueciMinhaSenhaControl.php" method="post" class="form_index form">
				
				<input type="text" name="input_usuario" placeholder="Usuário" class="input_usuario" maxlength="50">

				<br><br>

				<a href="#" id="voltar-minha-senha">Voltar</a>

				<button type="submit" class="button_entrar">Enviar Solicitação de Troca de Senha</button>

			</form>

		</div>

	</article>

	<?php

		require_once 'modais.php';

	?>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="js/funcoes.js"></script>

</html>