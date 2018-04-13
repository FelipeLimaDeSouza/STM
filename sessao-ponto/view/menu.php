			<div id="wrapper">

		        <div id="sidebar-wrapper">
		            <ul class="sidebar-nav">
		                <li class="sidebar-brand menu-name">

		                	<?php

								echo "Olá, ".$_SESSION['usuario_nome']."!";

							?>
		                </li>
		                	<?php

		                		if($_SESSION['usuario_tipo'] == 1){

		                	?>

		                <li>
		                    <button id="menu-usuarios" class="button-menu">Usuários</button>
		                </li>
		                <li>
		                	<button id="menu-cadastrar-usuario" class="button-menu">Cadastrar Usuário</button>
		                </li>
		                

		                	<?php

		                		}

		                	?>
		                <li>
		                    <button id="menu-sair" class="button-menu">Sair</button>
		                </li>
		            </ul>
		        </div>
            
    		</div>

    		<header>
				
				<nav class="menu-responsivo">
					
					<a href="#menu-toggle" class="botao-responsivo" id="menu-toggle"></a>

				</nav>

			</header>