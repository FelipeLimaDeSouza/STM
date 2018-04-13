			<?php

				if((isset($_GET['alterar'])) && ($_GET['alterar'] != "")){

					$dados = $controlUsu->retornaUsuarioAlterar($_GET['alterar']);

					if($dados != null){

						foreach ($dados as $reg) {
							
			?>

			<div id="modal-alterar" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>
			    <p class="p-modal">Alterar Usuário</p>

			    <button id="botao-modal-alt">Ok</button>

			    <form action="../control/AlterarUsuario.php?uid=<?php echo $_GET['alterar'];?>" method="post" class="form" id="alterar-form">
			    	
			    	<input type="text" name="nome" placeholder="Nome" value="<?php echo $reg->user_nome; ?>" required>

			    	<input type="email" name="email" placeholder="E-mail" value="<?php echo $reg->user_email; ?>" required>

			    	<select name="tipo" required>

			    		<option value="">Selecione o tipo de usuário</option>

			    		<?php

			    			if($reg->user_tipo == 1){

			    		?>
			    		
			    		<option value="1" selected>Administrador</option>

			    		<option value="2">Comum</option>

			    		<?php

			    			}else{

			    		?>

			    		<option value="1">Administrador</option>

			    		<option value="2" selected>Comum</option>

			    		<?php

			    			}

			    		?>

			    	</select>

			    	<h4 style="margin-top: 40px;">Para não alterar a senha, basta manter os campos sem preenchimento.</h4>

			    	<input type="password" name="senha" placeholder="Senha">

			    	<input type="password" name="conf_senha" placeholder="Confirmar Senha">

			    	<button type="submit" class="botao-modal">Alterar</button>

			    </form>

			  </div>

			</div>

			<script>
					
				var modal = document.getElementById('modal-alterar');

		        var span = document.getElementsByClassName("fechar")[3];

		        modal.style.display = "block";

		        span.onclick = function() {
		          modal.style.display = "none";
		          window.location.href = "home.php";
		        }

		        window.onclick = function(event) {
		          if (event.target == modal) {
		            modal.style.display = "none";
		            window.location.href = "home.php";
		          }
		        }

			</script>

			<?php

						}


					}else{

			?>

			<script>

				$(".p-modal").text("Usuário não encontrado.");
					
				var modal = document.getElementById('modal-alerta');

		        var span = document.getElementsByClassName("fechar")[0];

		        var botao = document.getElementsByClassName("botao-modal")[0];

		        modal.style.display = "block";

		        span.onclick = function() {
		          modal.style.display = "none";
		          window.location.href = "home.php";
		        }

		        botao.onclick = function() {
		          modal.style.display = "none";
		          window.location.href = "home.php";
		        }

		        window.onclick = function(event) {
		          if (event.target == modal) {
		            modal.style.display = "none";
		            window.location.href = "home.php";
		          }
		        }

			</script>

			<?php

					}

				}

			?>