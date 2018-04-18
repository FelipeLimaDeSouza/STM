			<div id="modal-entrada" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>
			    <p class="p-modal">Confimar registro de ponto.</p>
			    <button id="botao-entrada" class="botao-modal">Ok</button>
			  </div>

			</div>

			<article>

				<div class="pontos">

			<?php

				require_once '../control/HistoricoPessoal.php';

				$controlHp = new HistoricoPessoal();

				$p1 = null;

				$p2 = null;

				$p3 = null;

				$p4 = null;

				if(isset($_GET['ent'])){

					$ent = $controlHp->retornaHpHj($_SESSION['usuario_id']);

					if($ent != null){

						$id = null;

						$entrada = null;

						foreach ($ent as $reg) {

							$entrada = $reg->ponto_entrada;

							$id = $reg->ponto_id;

						}

						if($entrada == null){

							$retorna = $controlHp->inserirPontoEntrada($id);

							if($retorna == true){

								header('Location:home.php');

							}else{

								header('Location:home.php');

							}

						}else{

							header('Location:home.php');

						}

					}else{

						header('Location:home.php');

					}

				}elseif(isset($_GET['alm'])) {

					$alm = $controlHp->retornaHpHj($_SESSION['usuario_id']);

					if($alm != null){

						$id = null;

						$almoco = null;

						foreach ($alm as $reg) {

							$almoco = $reg->ponto_almoco;

							$id = $reg->ponto_id;

						}

						if($almoco == null){

							$retorna = $controlHp->inserirPontoAlmoco($id);

							if($retorna == true){

								header('Location:home.php');

							}else{

								header('Location:home.php');

							}

						}else{

							header('Location:home.php');

						}

					}else{

						header('Location:home.php');

					}
					
				}elseif(isset($_GET['vlt'])) {

					$vlt = $controlHp->retornaHpHj($_SESSION['usuario_id']);

					if($vlt != null){

						$id = null;

						$volta = null;

						foreach ($vlt as $reg) {

							$volta = $reg->ponto_volta_almoco;

							$id = $reg->ponto_id;

						}

						if($volta == null){

							$retorna = $controlHp->inserirPontoVoltaAlmoco($id);

							if($retorna == true){

								header('Location:home.php');

							}else{

								header('Location:home.php');

							}

						}else{

							header('Location:home.php');

						}

					}else{

						header('Location:home.php');

					}
					
				}elseif(isset($_GET['sid'])) {

					$sid = $controlHp->retornaHpHj($_SESSION['usuario_id']);

					if($sid != null){

						$id = null;

						$saida = null;

						foreach ($sid as $reg) {

							$saida = $reg->ponto_saida;

							$id = $reg->ponto_id;

						}

						if($saida == null){

							$retorna = $controlHp->inserirPontoSaida($id);

							if($retorna == true){

								header('Location:home.php');

							}else{

								header('Location:home.php');

							}

						}else{

							header('Location:home.php');

						}

					}else{

						header('Location:home.php');

					}
					
				}else{

					$dados = $controlHp->retornaHpHj($_SESSION['usuario_id']);

					if($dados != null){

						foreach ($dados as $reg) {
							
							$p1 = $reg->ponto_entrada;

							$p2 = $reg->ponto_almoco;

							$p3 = $reg->ponto_volta_almoco;

							$p4 = $reg->ponto_saida;

						}

						if(($p1 == null) && ($p2 == null) && ($p3 == null) && ($p4 == null)){

							echo "<h2 class='h2-ponto'>Registrar ponto de hoje: ".date('d/m/Y')."</h2>

								<button type='button' id='entrada'>Entrada</button>

								<button type='button' class='disable' disable>Saída Almoço</button>

								<button type='button' class='disable' disable>Volta Almoço</button>

								<button type='button' class='disable' disable>Saída</button>";

						}elseif(($p1 != null) && ($p2 == null) && ($p3 == null) && ($p4 == null)){

							echo "<h2 class='h2-ponto'>Registrar ponto de hoje: ".date('d/m/Y')."</h2>

								<button type='button' class='disable' disable>Entrada</button>

								<button type='button' id='almoco'>Saída Almoço</button>

								<button type='button' class='disable' disable>Volta Almoço</button>

								<button type='button' class='disable' disable>Saída</button>";

						}elseif(($p1 != null) && ($p2 != null) && ($p3 == null) && ($p4 == null)){

							echo "<h2 class='h2-ponto'>Registrar ponto de hoje: ".date('d/m/Y')."</h2>

								<button type='button' class='disable' disable>Entrada</button>

								<button type='button' class='disable' disable>Saída Almoço</button>

								<button type='button' id='volta'>Volta Almoço</button>

								<button type='button' class='disable' disable>Saída</button>";

						}elseif(($p1 != null) && ($p2 != null) && ($p3 != null) && ($p4 == null)){

							echo "<h2 class='h2-ponto'>Registrar ponto de hoje: ".date('d/m/Y')."</h2>

								<button type='button' class='disable' disable>Entrada</button>

								<button type='button' class='disable' disable>Saída Almoço</button>

								<button type='button' class='disable' disable>Volta Almoço</button>

								<button type='button' id='saida'>Saída</button>";

						}else{

							echo "<h3>Ponto de hoje (".date('d/m/Y').") registrado.</h3>";

						}

					}else{

						echo "<script>location.reload();</script>";

					}

				}

			?>

				</div>				

			</article>