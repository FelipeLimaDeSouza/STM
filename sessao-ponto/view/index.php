<?php

	session_start();

	function getRealIPAddress(){ 

		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return $ip;

	}

	if((isset($_SESSION['usuario_id'])) && ($_SESSION['usuario_ip'] == getRealIPAddress()) && ($_SESSION['id'] == session_id())){

		header('Location:home.php');
	
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Acesso Restrito - STM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Felipe Lima de Souza">
    <link rel="icon" href="images/icone.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/estilo-min.css">

</head>
<body>

	<div class="container-fluid">

		<div class="row">

			<div class="voltar">

				<button id="voltar-ao-site" title="Voltar ao Site"><i class="glyphicon glyphicon-menu-left"></i></button>

			</div>

			<article>

				<div class="login">

					<img src="images/logo-sobre.png" class="img-login">
				
					<form class="form" action="../control/Session.php" method="post">
						
						<input type="email" name="email" placeholder="E-mail" required>

						<input type="password" name="senha" placeholder="Senha" required>

						<br><br>

						<a href="#" class="esqueci-minha-senha">Esqueci Minha Senha</a>

						<button type="submit">Entrar</button>

						<button type="button" id="acessar-webmail">Acessar WebMail</button>

						<button type="button" id="acessar-cad-portaria">Acessar Controle de Acesso</button>

					</form>

				</div>

				<div class="alterar-senha">

					<img src="images/logo-sobre.png" class="img-login">

					<h3>Digite o e-mail para redefinirmos sua senha</h3>
				
					<form class="form" action="../control/EsqueceuSenha.php" method="post">
						
						<input type="email" name="email" placeholder="E-mail" required>

						<button type="submit">Enviar</button>

						<br><br>

						<a href="#" class="voltar-login">Voltar</a>

					</form>

				</div>

				<div id="carregando" class="modal" style="background-color: rgba(0,0,0,0);">

					<div class="modal-content">
				    
						<div class="loader"></div>

				  	</div>

				</div>

				<div id="modal-alerta" class="modal" style="background-color: rgba(0,0,0,0);">

				  <div class="modal-content">
				    <span class="fechar">&times;</span>
				    <p class="p-modal"></p>
				    <button class="botao-modal">Ok</button>
				  </div>

				</div>

			</article>

			<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
			<script src="js/funcoes-min.js"></script>

		</div>

	</div>

</body>
</html>