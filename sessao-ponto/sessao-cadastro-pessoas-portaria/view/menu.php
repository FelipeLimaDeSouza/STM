	<header class="header_topo">

		<button id="menu_responsivo"></button>

		<nav class="menu-container">

			<ul class="menu clearfix">

				<li>
					
					<a href="home.php">HOME</a>

				</li>
		
				<li>
				  
				  <a href="#">LISTAS</a>

					  <ul class="sub-menu clearfix">
					    
					    <li><a href="lista_empresas.php">LISTA DE EMPRESAS</a></li>

					    <?php

					    	if($_SESSION['usuario_nivel'] <= 2){

					    ?>

					    <li><a href="lista_entradas.php">LISTA DE ENTRADAS</a></li>

					    <?php

					    	}

					    	if($_SESSION['usuario_nivel'] <= 1){

					    ?>

					    <li><a href="lista_funcionarios.php">LISTA DE FUNCIONÁRIOS</a></li>

					    <?php

					    	}

					    ?>

					    <li><a href="lista_notas.php">LISTA DE NOTAS</a></li>

					    <?php

					    	if($_SESSION['usuario_nivel'] <= 2){

					    ?>

					    <li><a href="lista_pessoas.php">LISTA DE PESSOAS</a></li>

					    <?php

					    	}

					    	if($_SESSION['usuario_nivel'] <= 1){

					    ?>

					    <li><a href="lista_setores.php">LISTA DE SETORES</a></li>

					    <?php

					    	}

					    	if($_SESSION['usuario_nivel'] == 0){

					    ?>

					    <li><a href="lista_usuarios.php">LISTA DE USUÁRIOS</a></li>

					    <?php

					    	}

					    	if($_SESSION['usuario_nivel'] <= 2){

					    ?>

					    <li><a href="lista_veiculos.php">LISTA DE VEÍCULOS</a></li>

					    <?php

					    	}

					    ?>
					    
					  </ul>
				  
				</li>
				<?php

			    	if($_SESSION['usuario_nivel'] <= 1){

			    ?>
				<li>
				  
				  <a href="#">CADASTRO</a>

				  <ul class="sub-menu clearfix">

				  	

				    <li id="cadastro_empresas" class="selecionar-menu"><a href="#">CADASTRO DE EMPRESAS</a></li>
				    <li id="cadastro_entradas" class="selecionar-menu"><a href="#">CADASTRO DE ENTRADAS</a></li>
				    <li id="cadastro_funcionarios" class="selecionar-menu"><a href="#">CADASTRO DE FUNCIONÁRIOS</a></li>
				    <li id="cadastro_notas" class="selecionar-menu"><a href="#">CADASTRO DE NOTAS</a></li>
				    <li id="cadastro_pessoas" class="selecionar-menu"><a href="#">CADASTRO DE PESSOAS</a></li>
				    <li id="cadastro_setores" class="selecionar-menu"><a href="#">CADASTRO DE SETORES</a></li>

				    <?php

				    		if($_SESSION['usuario_nivel'] == 0){

				    ?>

				    <li id="cadastro_usuarios" class="selecionar-menu"><a href="#">CADASTRO DE USUÁRIOS</a></li>

				    <?php

				    		}

				    ?>

				    <li id="cadastro_veiculos" class="selecionar-menu"><a href="#">CADASTRO DE VEÍCULOS</a></li>

				    
				  </ul>      

				</li>
				<?php

			    	}

			    ?>
				<li>

					<a href="sair.php">SAIR</a>

				</li>
			</ul>
		</nav>

	</header>