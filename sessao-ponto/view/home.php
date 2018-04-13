<?php

	require_once '../control/ValidaSession.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ponto - STM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Felipe Lima de Souza">
    <link rel="icon" href="images/icone.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/estilo-min.css">

	<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>

	<div class="container-fluid">

		<div class="row">
			
			<?php

				require_once 'menu.php';

				require_once 'ponto.php';

			?>
			
			<?php

				require_once 'cadastro.php';

				require_once 'usuarios.php';

				require_once 'alterar.php';

				require_once 'excluir.php';

				require_once 'hup.php';

			?>

			<script src="js/bootstrap.bundle.min.js"></script>

		    <script src="js/funcoes-min.js"></script>

		</div>

	</div>

</body>
</html>