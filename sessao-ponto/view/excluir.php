			<div id="modal-excluir" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>
			    <p class="p-modal">Tem certeza que deseja excluir?</p>
			    <button id="botao-excluir">Sim</button>
			    <button class="botao-modal">Não</button>
			  </div>

			</div>

			<div id="modal-alerta-exc" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>
			    <p class="p-excluir"></p>
			    <button class="botao-modal">Ok</button>
			  </div>

			</div>

			<?php

				if(isset($_GET['excluir'])){

			?>

			<script>
				
				var modal_excluir = document.getElementById('modal-excluir');

				var span = document.getElementsByClassName("fechar")[3];

				var botao = document.getElementsByClassName("botao-modal")[3];

				var botao_excluir = document.getElementById('botao-excluir');

		        modal_excluir.style.display = "block";

		        var get_excluir = window.location.search;

				resultado = get_excluir.substring(9);

		        span.onclick = function() {
		          modal_excluir.style.display = "none";
		          window.location.href = "home.php?pesquisa=";
		        }

		        botao_excluir.onclick = function() {
		          modal_excluir.style.display = "none";
		          window.location.href = "../control/ExcluirUsuario.php?uid="+resultado;
		        }

		        botao.onclick = function() {
		          modal_excluir.style.display = "none";
		          window.location.href = "home.php?pesquisa=";
		        }

		        window.onclick = function(event) {
		          if (event.target == modal_excluir) {
		            modal_excluir.style.display = "none";
		            window.location.href = "home.php?pesquisa=";
		          }
		        }

			</script>

			<?php 

				}elseif(isset($_GET['exc_success'])){

			?>

			<script>

				$('.p-excluir').text("Exclusão realizada com sucesso.");
				
				var modal_excluir_exc = document.getElementById('modal-alerta-exc');

				var span = document.getElementsByClassName("fechar")[4];

				var botao = document.getElementsByClassName("botao-modal")[4];

		        modal_excluir_exc.style.display = "block";

		        span.onclick = function() {
		          modal_excluir_exc.style.display = "none";
		          window.location.href = "home.php?pesquisa=";
		        }
		        botao.onclick = function() {
		          modal_excluir_exc.style.display = "none";
		          window.location.href = "home.php?pesquisa=";
		        }

		        window.onclick = function(event) {
		          if (event.target == modal_excluir_exc) {
		            modal_excluir_exc.style.display = "none";
		            window.location.href = "home.php?pesquisa=";
		          }
		        }

			</script>

			<?php

				}elseif(isset($_GET['exc_error'])) {
					
			?>

			<script>

				$('.p-excluir').text("Erro ao excluir.");
				
				var modal_excluir_exc = document.getElementById('modal-alerta-exc');

				var span = document.getElementsByClassName("fechar")[4];

				var botao = document.getElementsByClassName("botao-modal")[4];

		        modal_excluir_exc.style.display = "block";

		        span.onclick = function() {
		          modal_excluir_exc.style.display = "none";
		          window.location.href = "home.php?pesquisa=";
		        }
		        botao.onclick = function() {
		          modal_excluir_exc.style.display = "none";
		          window.location.href = "home.php?pesquisa=";
		        }

		        window.onclick = function(event) {
		          if (event.target == modal_excluir_exc) {
		            modal_excluir_exc.style.display = "none";
		            window.location.href = "home.php?pesquisa=";
		          }
		        }

			</script>

			<?php

				}

			?>