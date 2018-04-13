<?php

	require_once 'validarSession.php';

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
	<title>Cadastro de Pessoas | Lista de Notas</title>
</head>
<body>

	<?php

		require_once 'menu.php';

	?>

	<article>

		<h1 class="h1">Notas Cadastradas</h1>

		<form action="lista_notas.php" method="GET">

			<div style="width: 100%;">

				<input type="text" name="txt_buscar" class="input_buscar" id="buscar" placeholder="Buscar por número da nota, empresa ou nome de quem entregou">

			</div>

			<button type="submit" class="button_buscar">Buscar</button>

		</form>

		<?php

				if($_SERVER['REQUEST_METHOD'] == 'POST'){

					$data_inicial = $_POST['txt_buscar_data_ini'];

					$data_final = $_POST['txt_buscar_data_fim'];

					$empresa = $_POST['txt_buscar_empresa'];

				}else{

					$data_inicial = "";

					$data_final = "";

					$empresa = "";

				}

		?>

		<form action="lista_notas.php" method="POST">

			<input type="text" name="txt_buscar_data_ini" maxlength="10" OnKeyPress="formatar('##/##/####', this)" placeholder="Data Inicial" value="<?php echo $data_inicial;?>">

			<input type="text" name="txt_buscar_data_fim" maxlength="10" OnKeyPress="formatar('##/##/####', this)" placeholder="Data Final" value="<?php echo $data_final;?>">

			<input type="text" name="txt_buscar_empresa" placeholder="Empresa" value="<?php echo $empresa;?>">

			<button type="submit" class="button_buscar">Busca Avançada</button>

		</form>

		<div class="div_imprimir">
			
			<button type="button" class="button_imprimir"></button>

		</div>

		<div class="table-responsive">

			<?php

				if($_SERVER['REQUEST_METHOD'] == 'POST'){

					require_once '../control/RetornaBuscaNotasControl.php';

					$controlBusca = new RetornaBuscaNotasControl();

			?>

			<table class="table" id="table">
			
				<thead>

					<tr>
					
						<th>Data</th>

						<th>Hora</th>

						<th>Número</th>

						<th>Empresa</th>

						<th>CNPJ</th>

						<th>Entregue Por</th>

						<th>Recebida Por</th>

					</tr>

				</thead>

				<tbody>

					<?php

						$dados = $controlBusca->retornaNotasBuscaAvancada($_POST['txt_buscar_data_ini'], $_POST['txt_buscar_data_fim'], $_POST['txt_buscar_empresa']);

						if($dados != null){

							foreach ($dados as $reg) {

								$data_br = implode('/', array_reverse(explode('-', $reg->nota_data)));
							
					?>
					
					<tr>
						
						<td><?php echo $data_br; ?></td>

						<td><?php echo $reg->nota_hora; ?></td>

						<?php

							if($reg->nota_numero != null){

						?>

						<td><?php echo $reg->nota_numero; ?></td>

						<?php

							}else{

						?>

						<td><?php echo $reg->nota_vale; ?></td>

						<?php 

							}

						?>

						<td><?php echo $reg->empresa_nome; ?> </td>

						<td><?php echo $reg->empresa_cnpj; ?></td>

						<td><?php echo $reg->pessoa_nome; ?></td>

						<td><?php echo $reg->usuario_nome; ?></td>

					</tr>

					<?php

							}

						}

					?>

				</tbody>

			</table>

			<?php

				}elseif((!isset($_GET['txt_buscar'])) || (trim($_GET['txt_buscar']) == "")){

					require_once '../control/NotasControl.php';

					$control = new NotasControl();

			?>

			<table class="table" id="table">
			
				<thead>

					<tr>
					
						<th>Data</th>

						<th>Hora</th>

						<th>Número</th>

						<th>Empresa</th>

						<th>CNPJ</th>

						<th>Entregue Por</th>

						<th>Recebida Por</th>

					</tr>

				</thead>

				<tbody>

					<?php

						$dados = $control->retornaNotas();

						foreach ($dados as $reg) {

							$data_br = implode('/', array_reverse(explode('-', $reg->nota_data)));
							
					?>
					
					<tr>

						<td><?php echo $data_br; ?></td>

						<td><?php echo $reg->nota_hora; ?></td>

						<?php

							if($reg->nota_numero != null){

						?>

						<td><?php echo $reg->nota_numero; ?></td>

						<?php

							}else{

						?>

						<td><?php echo $reg->nota_vale; ?></td>

						<?php 

							}

						?>

						<td><?php echo $reg->empresa_nome; ?> </td>

						<td><?php echo $reg->empresa_cnpj; ?></td>

						<td><?php echo $reg->pessoa_nome; ?></td>

						<td><?php echo $reg->usuario_nome; ?></td>

					</tr>

					<?php

						}

					?>

				</tbody>

			</table>

			<?php

				}else{

					require_once '../control/NotasControl.php';

					$control = new NotasControl();

			?>

			<table class="table" id="table">
			
				<thead>

					<tr>
					
						<th>Data</th>

						<th>Hora</th>

						<th>Número</th>

						<th>Empresa</th>

						<th>CNPJ</th>

						<th>Entregue Por</th>

						<th>Recebida Por</th>

					</tr>

				</thead>

				<tbody>

					<?php

						$dados = $control->retornaNotasBusca($_GET['txt_buscar']);

						if($dados != null){

							foreach ($dados as $reg) {

								$data_br = implode('/', array_reverse(explode('-', $reg->nota_data)));
							
					?>
					
					<tr>
						
						<td><?php echo $data_br; ?></td>

						<td><?php echo $reg->nota_hora; ?></td>

						<?php

							if($reg->nota_numero != null){

						?>

						<td><?php echo $reg->nota_numero; ?></td>

						<?php

							}else{

						?>

						<td><?php echo $reg->nota_vale; ?></td>

						<?php 

							}

						?>

						<td><?php echo $reg->empresa_nome; ?> </td>

						<td><?php echo $reg->empresa_cnpj; ?></td>

						<td><?php echo $reg->pessoa_nome; ?></td>

						<td><?php echo $reg->usuario_nome; ?></td>

					</tr>

					<?php

							}

						}

					?>

				</tbody>

			</table>

			<?php

				}

			?>

		</div>

	</article>

	<?php

		require_once 'modais.php';

		require_once 'footer.php';

	?>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="js/jquery.btechco.excelexport.js"></script>

<script src="js/jquery.base64.js"></script>

<script src="js/funcoes.js"></script>

</html>