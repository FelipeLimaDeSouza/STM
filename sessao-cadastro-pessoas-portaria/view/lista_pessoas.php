<?php

	require_once 'validarSession.php';

	if($_SESSION['usuario_nivel'] > 2){

		header('Location:home.php');

	}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Felipe Lima de Souza">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Cadastro de Pessoas | Lista de Pessoas</title>
</head>
<body>

	<?php

		require_once 'menu.php';

	?>

	<article>

		<h1 class="h1">Pessoas Cadastradas</h1>

		<div class="table-responsive">

			<table class="table">
			
				<thead>

					<tr>
					
						<th>ID</th>

						<th>Nome</th>

						<th>Empresa</th>

						<th>Placa Veículo</th>

					</tr>

				</thead>

				<tbody>

					<?php

						require_once '../control/PessoasControl.php';

						require_once '../control/VeiculosControl.php';

						$control = new PessoasControl();

						$controlVeiculos = new VeiculosControl();

						$dados = $control->retornaPessoas();

						foreach ($dados as $reg) {
							
					?>
					
					<tr>
						
						<td><?php echo $reg->pessoa_id; ?></td>

						<td><?php echo $reg->pessoa_nome; ?></td>

						<td><?php echo $reg->empresa_nome; ?></td>

						<?php

							$vei = $controlVeiculos->retornaVeiculoPessoa($reg->pessoa_id);

							if($vei != null){

								foreach ($vei as $re) {
								
						?>

						<td><?php echo $re->veiculo_placa; ?></td>

						<?php

								}

							}else{

						?>

						<td></td>

						<?php

							}

						?>

						<td><button type="button" id="<?php echo $reg->pessoa_id; ?>" class="buttons_alt button_alt_pessoa">Alterar</button></td>

					</tr>

					<?php

						}

					?>

				</tbody>

			</table>

		</div>

	</article>

	<?php

		require_once 'modais.php';

		require_once 'footer.php';

	?>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="js/funcoes.js"></script>

</html>