	<div id="modal-alerta" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Confirmar Registro de Saída</p>
	    <button class="botao-modal">Ok</button>
	  </div>

	</div>

	<div id="modal-erro" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Erro</p>
	    <button class="botao-modal">Ok</button>
	  </div>

	</div>

	<div id="carregando" class="modal">

		<div class="modal-content">
	    
			<div class="loader"></div>

	  	</div>

	</div>

	<div id="modal-cad-empresa" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Cadastrar Empresa</p>

	    <form action="../control/EmpresasControl.php" method="post" class="form">

	    	<div style="width: 100%;">
	    	
	    		<input type="text" name="input_nome" class="input_modal" placeholder="Nome da Empresa">

	    		<input type="text" name="input_cnpj" class="input_modal" placeholder="CNPJ" maxlength="18" onkeyup="formatar('##.###.###/####-##', this);">

	    	</div>

	    	<button type="submit" class="botao-modal">Cadastrar</button>

	    </form>

	  </div>

	</div>

	<div id="modal-cad-entradas" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Cadastrar Entrada</p>

	    <form action="../control/EntradasControl.php" method="post" class="form">

	    	<div style="width: 100%;">

	    		<select name="input_pessoa">

	    			<option value="0">Selecione a Pessoa que entrou</option>

	    			<?php

	    				require_once '../control/PessoasControl.php';

	    				$pessoasControlEntrada = new PessoasControl();

	    				$dados = $pessoasControlEntrada->retornaPessoas();

	    				foreach ($dados as $reg) {
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->pessoa_id; ?>"><?php echo $reg->pessoa_nome; ?> / <?php echo $reg->empresa_nome; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>

	    		<select name="input_funcionario">

	    			<option value="0">Selecione o Funcionário que liberou a entrada</option>

	    			<?php

	    				require_once '../control/FuncionariosControl.php';

	    				require_once '../control/SetoresControl.php';

	    				$funcionariosControlEntrada = new FuncionariosControl();

	    				$setoresControlEntrada = new SetoresControl();

	    				$fun = $funcionariosControlEntrada->retornaFuncionarios();

	    				foreach ($fun as $reg) {

	    					$set = $setoresControlEntrada->retornaSetorId($reg->setor_id_funcionario);

	    					$setor_nome = "";

	    					foreach ($set as $reg_set) {
	    						
	    						$setor_nome = $reg_set->setor_nome;

	    					}
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->funcionario_id; ?>"><?php echo $reg->funcionario_nome; ?> / <?php echo $setor_nome; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>


	    	</div>

	    	<button type="submit" class="botao-modal">Cadastrar</button>

	    </form>

	  </div>

	</div>

	<div id="modal-cad-funcionarios" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Cadastrar Funcionário</p>

	    <form action="../control/FuncionariosControl.php" method="post" class="form">

	    	<div style="width: 100%;">
	    	
	    		<input type="text" name="input_nome" placeholder="Nome do Funcionário">

	    		<select name="input_setor">

	    			<option value="0">Selecione o Setor</option>

	    			<?php

	    				require_once '../control/SetoresControl.php';

	    				$setoresControl = new SetoresControl();

	    				$setfun = $setoresControl->retornaSetores();

	    				foreach ($setfun as $reg) {
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->setor_id; ?>"><?php echo $reg->setor_nome; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>

	    	</div>

	    	<button type="submit" class="botao-modal">Cadastrar</button>

	    </form>

	  </div>

	</div>

	<div id="modal-cad-notas" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Cadastrar Nota</p>

	    <form action="../control/NotasControl.php" method="post" class="form">

	    	<div style="width: 100%;">

	    		<select id="valeounota" name="input_tipo">
	    			
	    			<option value="0">Selecione o tipo de nota</option>
	    			<option value="1">Nota</option>
	    			<option value="2">Vale</option>

	    		</select>
	    	
	    		<input type="text" name="input_numero" placeholder="Número da Nota" id="input_numero_id" maxlength="20">

	    		<input type="text" name="input_vale" placeholder="Preço do vale" id="input_vale_id" maxlength="50">

	    		<select name="input_pessoa">

	    			<option value="0">Selecione a Pessoa que entregou a nota</option>

	    			<?php

	    				require_once '../control/PessoasControl.php';

	    				$pessoasControlNota = new PessoasControl();

	    				$pesNota = $pessoasControlNota->retornaPessoas();

	    				foreach ($pesNota as $reg) {
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->pessoa_id; ?>"><?php echo $reg->pessoa_nome; ?> / <?php echo $reg->empresa_nome; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>

	    		<select name="input_empresa">

	    			<option value="0">Selecione a Empresa na qual pertence a Nota</option>

	    			<?php

	    				require_once '../control/EmpresasControl.php';

	    				$empresasControlNota = new EmpresasControl();

	    				$empNota = $empresasControlNota->retornaEmpresas();

	    				foreach ($empNota as $reg) {
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->empresa_id; ?>"><?php echo $reg->empresa_nome; ?> / <?php echo $reg->empresa_cnpj; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>

	    	</div>

	    	<button type="submit" class="botao-modal">Cadastrar</button>

	    </form>

	  </div>

	</div>

	<div id="modal-cad-pessoas" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Cadastrar Pessoa</p>

	    <form action="../control/PessoasControl.php" method="post" class="form">

	    	<div style="width: 100%;">
	    	
	    		<input type="text" name="input_nome" placeholder="Nome da Pessoa">

	    		<input type="text" name="input_rg" placeholder="RG da Pessoa com UF" maxlength="14" onkeyup="formatar('##.###.###-###', this);">

	    		<input type="text" name="input_cpf" placeholder="CPF da Pessoa" maxlength="14" onkeyup="formatar('###.###.###-##', this);">

	    		<select name="input_empresa">

	    			<option value="0">Selecione a Empresa</option>

	    			<?php

	    				require_once '../control/EmpresasControl.php';

	    				$empresasControl = new EmpresasControl();

	    				$empresas = $empresasControl->retornaEmpresas();

	    				foreach ($empresas as $reg) {
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->empresa_id; ?>"><?php echo $reg->empresa_nome; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>

	    		<select name="input_veiculo">

	    			<option value="0">Selecione o Veículo</option>

	    			<?php

	    				require_once '../control/VeiculosControl.php';

	    				$veiculosControl = new VeiculosControl();

	    				$dados = $veiculosControl->retornaVeiculos();

	    				foreach ($dados as $reg) {
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->veiculo_id; ?>"><?php echo $reg->veiculo_placa; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>

	    	</div>

	    	<button type="submit" class="botao-modal">Cadastrar</button>

	    </form>

	  </div>

	</div>

	<div id="modal-cad-setores" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Cadastrar Setor</p>

	    <form action="../control/SetoresControl.php" method="post" class="form">

	    	<div style="width: 100%;">
	    	
	    		<input type="text" name="input_nome" class="input_modal" placeholder="Nome do Setor">

	    	</div>

	    	<button type="submit" class="botao-modal">Cadastrar</button>

	    </form>

	  </div>

	</div>

	<div id="modal-cad-usuarios" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Cadastrar Usuário</p>

	    <form action="../control/UsuariosControl.php" method="post" class="form">

	    	<div style="width: 100%;">
	    	
	    		<input type="text" name="input_nome" class="input_modal" placeholder="Nome do Usuário" style="width: 200px;">

	    		<input type="text" name="input_usuario" class="input_modal" placeholder="Login do Usuário" style="width: 200px;">

	    		<input type="password" name="input_senha" class="input_modal" placeholder="Senha do Usuário" style="width: 200px;">

	    		<select name="input_nivel">

	    			<option value="0">Selecione o Nível do Usuário</option>
	    			
	    			<option value="1">Administrador (a)</option>
	    			<option value="2">Porteiro (a)</option>
	    			<option value="3">Administrativo</option>

	    		</select>

	    	</div>

	    	<button type="submit" class="botao-modal">Cadastrar</button>

	    </form>

	  </div>

	</div>

	<div id="modal-cad-veiculos" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Cadastrar Veículo</p>

	    <form action="../control/VeiculosControl.php" method="post" class="form">

	    	<div style="width: 100%;">
	    	
	    		<input type="text" name="input_placa" class="input_modal" placeholder="Número da Placa sem traço" style="width: 200px;">

	    	</div>

	    	<button type="submit" class="botao-modal">Cadastrar</button>

	    </form>

	  </div>

	</div>

	<div id="modal-alt-pessoa" class="modal">

	  <div class="modal-content">
	    <span class="fechar">&times;</span>
	    <p class="p-modal">Alterar Informações Pessoa</p>

	    <form action="../control/AlterarPessoaControl.php" method="post" class="form">

	    	<div style="width: 100%;">
	    	
	    		<select name="input_empresa">

	    			<option value="0">Selecione a nova Empresa da Pessoa ou deixe vazio para não alterar</option>

	    			<?php

	    				require_once '../control/EmpresasControl.php';

	    				$empresasControl = new EmpresasControl();

	    				$empresas = $empresasControl->retornaEmpresas();

	    				foreach ($empresas as $reg) {
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->empresa_id; ?>"><?php echo $reg->empresa_nome; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>

	    		<select name="input_veiculo">

	    			<option value="0">Selecione o novo Veículo ou deixe vazio para não alterar</option>

	    			<?php

	    				require_once '../control/VeiculosControl.php';

	    				$veiculosControl = new VeiculosControl();

	    				$dados = $veiculosControl->retornaVeiculos();

	    				foreach ($dados as $reg) {
	    					
	    			?>
	    			
	    			<option value="<?php echo $reg->veiculo_id; ?>"><?php echo $reg->veiculo_placa; ?></option>

	    			<?php

	    				}

	    			?>

	    		</select>

	    	</div>

	    	<button type="submit" class="botao-modal">Alterar</button>

	    </form>

	  </div>

	</div>