			<div id="modal-usuarios" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>

			    <p class="p-modal">Lista de usuários.</p>

			    <form action="home.php" method="get" id="pesquisar">

			    	<input type="text" name="pesquisa" placeholder="Buscar por nome e/ou e-mail" id="pesquisa" style="margin-bottom: 20px;">

			    	<button type="submit" style="margin-top: -100px; margin-bottom: 20px; width: 140px;">Pesquisar</button>

			    </form>

			    <div class="table-responsive">

			    	<table class="grid-usuarios table">

			    		<caption>Todos</caption>

			    		<tbody>

			    			<?php

			    				require_once '../control/Usuarios.php';

			    				$controlUsu = new Usuarios();

			    				$dados = $controlUsu->retornaUsuarios();

			    				foreach ($dados as $reg) {
			    					
			    			?>
			    		
				    		<tr>
				    			
				    			<td><?php echo $reg->user_nome; ?></td>

				    			<td><?php echo $reg->user_email; ?></td>

				    			<td><a href="?alterar=<?php echo md5($reg->user_id);?>">Alterar</a> | <a href="?excluir=<?php echo md5($reg->user_id);?>">Excluir</a> | <a href="?hup=<?php echo md5($reg->user_id);?>">Histórico de Ponto</a></td>

				    		</tr>

				    		<?php } ?>

			    		</tbody>

			    	</table>

			    </div>

			    <div class="table-responsive">

			    	<table class="grid-pesquisa table">

			    		<tbody>

			    			<?php

			    				if(isset($_GET['pesquisa'])){

				    				$busca = trim($_GET['pesquisa']);

				    				$dados = $controlUsu->retornaUsuario($_GET['pesquisa']);

				    				foreach ($dados as $reg) {
			    					
			    			?>
			    		
				    		<tr>
				    			
				    			<td><?php echo $reg->user_nome; ?></td>

				    			<td><?php echo $reg->user_email; ?></td>

				    			<td><a href="?alterar=<?php echo md5($reg->user_id);?>">Alterar</a> | <a href="?excluir=<?php echo md5($reg->user_id);?>">Excluir</a> | <a href="?hup=<?php echo md5($reg->user_id);?>">Histórico de Ponto</a></td>

				    		</tr>

				    		<?php 

				    				}

				    			}

				    		 ?>

			    		</tbody>

			    	</table>

			    </div>

			    <button class="botao-modal">Ok</button>

			    <?php

					if(isset($_GET['pesquisa'])){

				?>

				<script>
					
					var modal = document.getElementById('modal-usuarios');

			        var span = document.getElementsByClassName("fechar")[2];

			        var botao = document.getElementsByClassName("botao-modal")[2];

			        modal.style.display = "block";

			        var get = window.location.search;

					resul = get.substring(10);

			        if(resul != ""){

			        	$(".grid-usuarios").css('display', 'none');

			        	$(".grid-pesquisa").css('display', 'table');

			        	$("#pesquisa").val(resul);

			        	$("#pesquisa").focus();

			        }

			        span.onclick = function() {
			          modal.style.display = "none";
			          window.location.href = "../view/home.php";
			        }

			        botao.onclick = function() {
			          modal.style.display = "none";
			          window.location.href = "../view/home.php";
			        }

			        window.onclick = function(event) {
			          if (event.target == modal) {
			            modal.style.display = "none";
			            window.location.href = "../view/home.php";
			          }
			        }

			        $("#pesquisa").focus();

				</script>

				<?php

					}

				?>

			  </div>

			</div>