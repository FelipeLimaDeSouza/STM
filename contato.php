		<div class="row">

		    <section id="contato">

		    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		    		
		    		<h1 class="h1-contato">Entre em contato conosco</h1>

		    	</div>

		      	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		      	
			      	<ul class="list-icons">

			      		<li class="li-contato"><i class="glyphicon glyphicon-map-marker"></i> Rua Coronel Jose Nunes dos Santos, 551 </li>
	                    
	                    <li class="li-contato">Vargem Grande Paulista- SP | CEP:06730-000 | Bairro Centro </li>
	                    
	                    <br /><br />
						<li class="li-contato"><i class="glyphicon glyphicon-earphone"></i> +55 11 4788-3000</li>

					</ul>

					<div class="social">

						<a href="https://www.facebook.com/Stm-Sistema-Brasil-174780302627371/?ref=ts&fref=ts" target="_blank"><i class="fa fa-facebook-f fb"></i></a>

						<a href="https://www.google.com.br/maps/place/STM+SISTEMA+BRASIL/@-23.6019811,-47.0179155,15z/data=!4m5!3m4!1s0x0:0x9c984f002384eb5b!8m2!3d-23.6019811!4d-47.0179155" target="_blank"><i class="fa fa-google-plus go"></i></a>

						<a href="https://www.linkedin.com/company/22335470/" target="_blank"><i class="fa fa-linkedin-square lin"></i></a>

					</div>

		    	</div>

		    	<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
				<script src="js/responsive-nav-min.js"></script>
				<script src="js/fastclick-min.js"></script>
			    <script src="js/scroll-min.js"></script>
			    <script src="js/fixed-responsive-nav-min.js"></script>
				<script src="js/funcoes-min.js"></script>

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