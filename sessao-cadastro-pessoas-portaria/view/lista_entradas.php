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
	<title>Cadastro de Pessoas | Lista de Entradas</title>

</head>
<body>

	<?php

		require_once 'menu.php';

	?>

	<article>

		<h1 class="h1">Entradas Ativas Cadastradas</h1>

		<div class="table-responsive">

			<table class="table">
			
				<thead>

					<tr>
					
						<th>Data</th>

						<th>Nome</th>

						<th>RG</th>

						<th>CPF</th>

						<th>Empresa</th>

						<th>Placa</th>

						<th>Autorizado Por</th>

						<th>Hora Entrada</th>

						<th>Recebido Por</th>


					</tr>

				</thead>

				<tbody>

					<?php

						require_once '../control/EntradasControl.php';

						require_once '../control/VeiculosControl.php';

						$control = new EntradasControl();

						$controlVeiculos = new VeiculosControl();

						$dados = $control->retornaEntradasAtivas();

						foreach ($dados as $reg) {

							$data_br = implode('/', array_reverse(explode('-', $reg->entrada_data_entrada)));

							$veiculos = $controlVeiculos->retornaVeiculoPessoa($reg->pessoa_id);

							$placa = null;

							foreach ($veiculos as $reg_veiculo) {
								
								$placa = $reg_veiculo->veiculo_placa;

							}

					?>
					
					<tr>
						
						<td><?php echo $data_br; ?></td>

						<td><?php echo $reg->pessoa_nome; ?></td>

						<td><?php echo $reg->pessoa_rg; ?></td>

						<td><?php echo $reg->pessoa_cpf; ?></td>

						<td><?php echo $reg->empresa_nome; ?></td>

						<?php

							if($placa != null){

						?>

						<td><?php echo $placa; ?></td>

						<?php

							}else{

						?>

						<td></td>

						<?php

							}

						?>

						<td><?php echo $reg->funcionario_nome; ?></td>

						<td><?php echo $reg->entrada_hora_entrada; ?></td>

						<td><?php echo $reg->usuario_nome; ?></td>

						<?php

							if($_SESSION['usuario_nivel'] <= 1){

						?>

						<td><button type="button" id="<?php echo $reg->entrada_id; ?>" class="button_reg_saida">Registrar Saída</button></td>

						<?php

							}

						?>

					</tr>

					<?php

						}

					?>

				</tbody>

			</table>

		</div>

		<h1 class="h3" style="margin-top: 20px;">Entradas Cadastradas</h1>

		<div class="table-responsive">

			<table class="table">
			
				<thead>

					<tr>
					
						<th>Data</th>

						<th>Nome</th>

						<th>RG</th>

						<th>CPF</th>

						<th>Empresa</th>

						<th>Placa</th>

						<th>Autorizado Por</th>

						<th>Hora Entrada</th>

						<th>Hora Saída</th>

						<th>Data Saída</th>

						<th>Recebido Por</th>

					</tr>

				</thead>

				<tbody>

					<?php

						$dados = $control->retornaEntradas();

						foreach ($dados as $reg) {

							$data_br = implode('/', array_reverse(explode('-', $reg->entrada_data_entrada)));

							$data_saida_br = implode('/', array_reverse(explode('-', $reg->entrada_data_saida)));

							$veiculos = $controlVeiculos->retornaVeiculoPessoa($reg->pessoa_id);

							$placa = null;

							foreach ($veiculos as $reg_veiculo) {
								
								$placa = $reg_veiculo->veiculo_placa;

							}
							
					?>
					
					<tr>
						
						<td><?php echo $data_br; ?></td>

						<td><?php echo $reg->pessoa_nome; ?></td>

						<td><?php echo $reg->pessoa_rg; ?></td>

						<td><?php echo $reg->pessoa_cpf; ?></td>

						<td><?php echo $reg->empresa_nome; ?></td>

						<?php

							if($placa != null){

						?>

						<td><?php echo $placa; ?></td>

						<?php

							}else{

						?>

						<td></td>

						<?php

							}

						?>

						<td><?php echo $reg->funcionario_nome; ?></td>

						<td><?php echo $reg->entrada_hora_entrada; ?></td>

						<td><?php echo $reg->entrada_hora_saida; ?></td>

						<td><?php echo $data_saida_br; ?></td>

						<td><?php echo $reg->usuario_nome; ?></td>

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