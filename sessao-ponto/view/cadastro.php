			<div id="modal-usuario-cad" class="modal">

			  <div class="modal-content">
			    <span class="fechar">&times;</span>

			    <p class="p-modal">Cadastrar novo usuário.</p>

			    <button id="botao-modal-cad">Ok</button>

			    <form action="../control/CadastrarUsuario.php" method="post" class="form" id="cadastro">
			    	
			    	<input type="text" name="nome" placeholder="Nome" required>

			    	<input type="email" name="email" placeholder="E-mail" required>

			    	<select name="tipo" required>

			    		<option value="">Selecione o tipo de usuário</option>
			    		
			    		<option value="1">Administrador</option>

			    		<option value="2">Comum</option>

			    	</select>

			    	<input type="password" name="senha" placeholder="Senha" required>

			    	<input type="password" name="conf_senha" placeholder="Confirmar Senha" required>

			    	<button type="submit" class="botao-modal">Cadastrar</button>

			    </form>

			  </div>

			</div>