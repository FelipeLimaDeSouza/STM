		<div class="row">

		    <section id="contato">

		    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    		
		    		<h1 class="h1-contato">Entre em contato conosco</h1>

		    	</div>

		      	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 div-contato">
		      	
			      	<ul class="list-icons">

			      		<li class="li-contato"><i class="glyphicon glyphicon-map-marker"></i> Rua Coronel Jose Nunes dos Santos, 551 </li>
	                    
	                    <li class="li-contato">Vargem Grande Paulista- SP | CEP:06730-000 | Bairro Centro </li>
	                    
	                    <br /><br />
						<li class="li-contato"><i class="glyphicon glyphicon-earphone"></i> +55 11 4788-3000</li>

					</ul>

		    	</div>

		    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		      	
			      	<form class="form" action="enviarEmail.php" method="post">
			      		
			      		<input type="text" name="nome" class="foc input-contato" placeholder="Nome" required>

			      		<input type="email" name="email" class="foc input-contato" placeholder="Email" required>

			      		<select class="input-contato select-contato" name="tipo" id="select-contact" required>
			      			
			      			<option value="0">Selecione o motivo do contato</option>

			      			<option value="1">Contato Comercial</option>

			      			<option value="2">Interesse em uma Vaga</option>

			      		</select>

			      		<textarea name="mensagem" class="foc area-contato" placeholder="Mensagem" required></textarea>

			      		<div class="aciona-curriculo">

				      		<p class="p-curriculo">Anexe seu currículo abaixo:</p>

				      		<input type="file" name="curriculo" class="input-contato" id="arquivo-contato">

				      		<div id="extensao"></div>

			      		</div>

			      		<button type="submit" class="botao-contato">Enviar</button>

			      	</form>

		      	</div>

		      	<div id="modal-alerta" class="modal">

				  <div class="modal-content">
				    <span class="fechar">&times;</span>
				    <p class="p-modal"></p>
				    <button class="botao-modal">Ok</button>
				  </div>

				</div>

				<div id="modal-valores" class="modal">

				  <div class="modal-content">
				    <span class="fechar-valores">&times;</span>
				    <p class="p-modal-valores">Valorizar os <strong>CLIENTES</strong>, buscando a satisfação de suas necessidades, a antecipação e superação de suas expectativas;<br><br> Garantir a <strong>EXCELÊNCIA</strong> na entrega de produtos e serviços inovadores, potencializando valor para os clientes, acionistas, colaboradores, e também para a sociedade de forma sustentável;<br><br> Promover a <strong>MELHORIA CONTÍNUA</strong> dos nossos processos por meio da <strong>INOVAÇÃO</strong> e o <strong>DESENVOLVIMENTO TECNOLÓGICO</strong>;<br><br> <strong>VALORIZAR</strong> as <strong>PESSOAS</strong>, o trabalho em <strong>EQUIPE</strong>, a <strong>QUALIDADE DE VIDA</strong> e os sensos de <strong>RESPEITO, RESPONSABILIDADE, ÉTICA</strong> e <strong>COMPROMETIMENTO</strong>.</p>
				    <button class="botao-modal-valores">Ok</button>
				  </div>

				</div>

				<div id="carregando" class="modal">

					<div class="modal-content">
				    
						<div class="loader"></div>

				  	</div>

				</div>
		    
		    </section>

	    </div>