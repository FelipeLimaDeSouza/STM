			<div id="modal-hup" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>
			    <p class="p-modal">Histórico Pessoal</p>

			    <div class="table-responsive">

				    <table class="grid-hp table">

				    	<thead>
				    		
				    		<tr>
				    			
				    			<th>Data</th>
				    			<th>Entrada</th>
				    			<th>Saída Almoço</th>
				    			<th>Volta Almoço</th>
				    			<th>Saída</th>

				    		</tr>

				    	</thead>
				    	
				    	<tbody>

				    		<?php

				    			$dados = $controlHp->retornaHistoricoEspPessoal($_GET['hup']);

				    			foreach ($dados as $reg) {

				    				$date = date_create($reg->ponto_data);

	                                $date = date_format($date, 'd/m/Y');

	                                $dia_semana = null;

	                                $semana = $controlHp->retornaSemanaHp($reg->ponto_data);

	                                foreach ($semana as $reg_semana) {
	                                	
	                                	$dia_semana = $reg_semana->diadasemana;

	                                }
				    				
				    		?>
				    		
				    		<tr>
				    			
				    			<td><?php echo $date . " | " . $dia_semana; ?></td>
				    			<td><?php echo $reg->ponto_entrada; ?></td>
				    			<td><?php echo $reg->ponto_almoco; ?></td>
				    			<td><?php echo $reg->ponto_volta_almoco; ?></td>
				    			<td><?php echo $reg->ponto_saida; ?></td>

				    		</tr>

				    		<?php

				    			}

				    		?>

				    	</tbody>

				    </table>

				</div>

			    <button class="botao-modal">Ok</button>
			  </div>

			</div>

			<?php

				if(isset($_GET['hup'])){

			?>

			<script>
					
				var modal = document.getElementById('modal-hup');

		        var span = document.getElementsByClassName("fechar")[5];

		        var botao = document.getElementsByClassName("botao-modal")[5];

		        modal.style.display = "block";

		        span.onclick = function() {
		          modal.style.display = "none";
		          window.location.href = "home.php?pesquisa=";
		        }

		        botao.onclick = function() {
		          modal.style.display = "none";
		          window.location.href = "home.php?pesquisa=";
		        }

		        window.onclick = function(event) {
		          if (event.target == modal) {
		            modal.style.display = "none";
		            window.location.href = "home.php?pesquisa=";
		          }
		        }

			</script>

			<?php

				}

			?>

			<div id="modal-almoco" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>
			    <p class="p-modal">Confimar registro de ponto.</p>
			    <button id="botao-almoco" class="botao-modal">Ok</button>
			  </div>

			</div>

			<div id="modal-volta" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>
			    <p class="p-modal">Confimar registro de ponto.</p>
			    <button id="botao-volta" class="botao-modal">Ok</button>
			  </div>

			</div>

			<div id="modal-saida" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>
			    <p class="p-modal">Confimar registro de ponto.</p>
			    <button id="botao-saida" class="botao-modal">Ok</button>
			  </div>

			</div>