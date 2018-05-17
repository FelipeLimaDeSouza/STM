var responsivo = 0;

function display_menu(){

	var tamanho = $(window).width();

	if (tamanho >= 600) {

		responsivo = 0;

		$('#menu_responsivo').css('background-image' , 'url(images/menu_icon.png)');

		$('.menu').css('display', 'block');

	}else{

		responsivo = 0;

		$('.menu').css('display', 'none');

		$('#menu_responsivo').css('background-image' , 'url(images/menu_icon.png)');

	}

}

function menu_responsivo(){
	
	if(responsivo == 0){

		responsivo = 1;

		$('#menu_responsivo').css('background-image' , 'url(images/menu_close.png)');

		$(".menu" ).animate({
		
		    left: "+=50",
		
		    height: "toggle"
		
		}, 500, function() {
		
		    $('.menu').css('display' , 'block');
		
		});
			
	}else{

		responsivo = 0;

		$('#menu_responsivo').css('background-image' , 'url(images/menu_icon.png)');

		$(".menu" ).animate({
		
		    left: "+=50",
		
		    height: "toggle"
		
		}, 500, function() {
		
		    $('.menu').css('display' , 'none');
		
		});

	}


}

$('#menu_responsivo').click(function(){

	menu_responsivo();

});

$(document).ready(function() {
    
	display_menu();

	if (typeof($("table")) != "undefined") {   

		var px = 0;

		$('table').each(function() {

			px = px + $( this ).height();

		});

		if((px > 0) && (px > 200)){

			$('article').css('height', (px+300));

		}else{

			$('article').css('height', 800);

		}

	}

});

$(window).resize(function() {
	
	display_menu();

});

var id_entrada, id_pessoa = 0;

$('.button_reg_saida').click(function() {
	id_pessoa = 0;
	id_entrada = $(this).attr('id');
	modal();
});

$('.button_alt_pessoa').click(function() {
	id_entrada = 0;
	id_pessoa = $(this).attr('id');
	modal();
});

function modal() {

	var modal = 0;

    var span = "";

    var botao = "";

	var caminho = "";

	if(id_entrada != 0){

		modal = document.getElementById('modal-alerta');

		span = document.getElementsByClassName("fechar")[0];

		botao = document.getElementsByClassName("botao-modal")[0];

		caminho = '../control/RegistarSaidaControl.php?entrada_id='+id_entrada;

	}else if(id_pessoa != 0){

		modal = document.getElementById('modal-alt-pessoa');

		span = document.getElementsByClassName("fechar")[10];

		botao = document.getElementsByClassName("botao-modal")[10];

	}

    modal.style.display = "block";

    span.onclick = function() {
      modal.style.display = "none";
    }

    botao.onclick = function() {

		if(id_entrada != 0){

      		modal.style.display = "none";

	    	$.ajax({

		      url: caminho,
		      dataType: 'json',
		      processData: false,
		      contentType:false,

		      beforeSend: function(){

		        $("#carregando").show("fast");

		      },

		      complete: function(){

		        $("#carregando").hide("slow");

		      },

		      success: function(response){

		      	$('.p-modal').text(response.mensagem);

		      	var modal = document.getElementById('modal-alerta');

		        var span = document.getElementsByClassName("fechar")[0];

		        var botao = document.getElementsByClassName("botao-modal")[0];

		        modal.style.display = "block";

		        span.onclick = function() {
		          modal.style.display = "none";
		          $('.p-modal').text('Confirmar Registro de Saída');
		          location.reload();
		        }

		        botao.onclick = function() {
		          modal.style.display = "none";
		          $('.p-modal').text('Confirmar Registro de Saída');
		          location.reload();
		        }

	            window.onclick = function(event) {
	              if (event.target == modal) {
	                modal.style.display = "none";
	                $('.p-modal').text('Confirmar Registro de Saída');
	                location.reload();
	              }
	            }

		      },
		      
		      error: function(){

		      	var modal = document.getElementById('modal-erro');

		        var span = document.getElementsByClassName("fechar")[1];

		        var botao = document.getElementsByClassName("botao-modal")[1];

		        modal.style.display = "block";

		        span.onclick = function() {
		          modal.style.display = "none";
		        }

		        botao.onclick = function() {
		          modal.style.display = "none";
		        }

		        window.onclick = function(event) {
		          if (event.target == modal) {
		            modal.style.display = "none";
		          }
		        }

		      }

		    });

		    return false;

		}else if(id_pessoa != 0){

		    $('.form').on('submit', function(){

		    	modal.style.display = "none";

			    $.ajax({

			      url: $(this).attr('action') + '?pessoa_id=' + id_pessoa,
			      type: $(this).attr('method'),
			      data: new FormData(this),
			      dataType: 'json',
			      processData: false,
			      contentType:false,

			      beforeSend: function(){

			        $("#carregando").show("fast");

			      },

			      complete: function(){

			        $("#carregando").hide("slow");

			      },

			      success: function(response){

			      	var p = document.getElementsByClassName("p-modal")[0];

			      	var modal = document.getElementById('modal-alerta');

			    	var span = document.getElementsByClassName("fechar")[0];

			    	var botao = document.getElementsByClassName("botao-modal")[0];

			      	if(response.status == 5){

			      		$(p).text(response.mensagem);

			      		modais_load(span, botao, modal);

			        	modal.style.display = "block";


					}

			      },
			      
			      error: function(){

			        var modal = document.getElementById('modal-erro');

			        var span = document.getElementsByClassName("fechar")[1];

			        var botao = document.getElementsByClassName("botao-modal")[1];

			        modal.style.display = "block";

			        span.onclick = function() {
			          modal.style.display = "none";
			        }

			        botao.onclick = function() {
			          modal.style.display = "none";
			        }

			        window.onclick = function(event) {
			          if (event.target == modal) {
			            modal.style.display = "none";
			          }
			        }

			      }

			    });

			    return false;

			});

		}

    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

}

function enviarForm() {
	
	$('.form').on('submit', function(){

		$('.modal').css('display', 'none');

	    $.ajax({

	      url: $(this).attr('action'),
	      type: $(this).attr('method'),
	      data: new FormData(this),
	      dataType: 'json',
	      processData: false,
	      contentType:false,

	      beforeSend: function(){

	        $("#carregando").show("fast");

	      },

	      complete: function(){

	        $("#carregando").hide("slow");

	      },

	      success: function(response){

	      	var p = $('.p-modal');

	      	var modal = document.getElementById('modal-alerta');

	    	var span = $('.fechar');

	    	var botao = $('.botao-modal');

	      	if(response.status == 0){

	      		modais(span, botao, modal);

	        	modal.style.display = "block";

	        	$(p).text('Usuário ou senha inválidos');


			}else if(response.status == 1){

				modais(span, botao, modal);

				window.location.href = "home.php";
				
			}else if(response.status == 2){

				modais(span, botao, modal);

				modal.style.display = "block";

	        	$(p).text(response.mensagem);

			}else if(response.status == 3){

				modais(span, botao, modal);

				modal.style.display = "block";

	        	$(p).text('Erro');

			}else if(response.status == 4){

				modais_load(span, botao, modal);

				$(p).text(response.mensagem);

				modal.style.display = "block";

			}else if(response.status == 6){

				modais_load(span, botao, modal);

				$(p).text(response.mensagem);

				modal.style.display = "block";

			}else if(response.status == 7){

				modais_load(span, botao, modal);

				$(p).text(response.mensagem);

				modal.style.display = "block";

			}

	      },
	      
	      error: function(){

	        var modal = document.getElementById('modal-erro');

	        var span = document.getElementsByClassName("fechar")[1];

	        var botao = document.getElementsByClassName("botao-modal")[1];

	        modal.style.display = "block";

	        span.onclick = function() {
	          modal.style.display = "none";
	        }

	        botao.onclick = function() {
	          modal.style.display = "none";
	        }

	        window.onclick = function(event) {
	          if (event.target == modal) {
	            modal.style.display = "none";
	          }
	        }

	      }

	    });

	    return false;

	});

}

enviarForm();

function modais(span, botao, modal) {

	span.onclick = function() {
		modal.style.display = "none";
	}

	botao.onclick = function() {
		modal.style.display = "none";
	}

	window.onclick = function(event) {
		if (event.target == modal) {
	  		modal.style.display = "none";
		}
	}

}

function modais_load(span, botao, modal) {

	span.onclick = function() {
		modal.style.display = "none";
		location.reload();
	}

	botao.onclick = function() {
		modal.style.display = "none";
		location.reload();
	}

	window.onclick = function(event) {
		if (event.target == modal) {
	  		modal.style.display = "none";
	  		location.reload();
		}
	}

}

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}

function abrir_modal(modal, pos_f, pos_b){

	$('.modal').css('display', 'none');

	var modal = document.getElementById(modal);

    var span = document.getElementsByClassName("fechar")[pos_f];

    var botao = document.getElementsByClassName("botao-modal")[pos_b];

    modal.style.display = "block";

    span.onclick = function() {
      modal.style.display = "none";
    }

    botao.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

}

$('#cadastro_empresas').click(function(){

	abrir_modal("modal-cad-empresa", 2, 2);

});

$('#cadastro_entradas').click(function(){

	abrir_modal("modal-cad-entradas", 3, 3);

});

$('#cadastro_funcionarios').click(function(){

	abrir_modal("modal-cad-funcionarios", 4, 4);

});

$('#cadastro_notas').click(function(){

	abrir_modal("modal-cad-notas", 5, 5);

});

$('#cadastro_pessoas').click(function(){

	abrir_modal("modal-cad-pessoas", 6, 6);

});

$('#cadastro_setores').click(function(){

	abrir_modal("modal-cad-setores", 7, 7);

});

$('#cadastro_usuarios').click(function(){

	abrir_modal("modal-cad-usuarios", 8, 8);

});

$('#cadastro_veiculos').click(function(){

	abrir_modal("modal-cad-veiculos", 9, 9);

});

$('#esqueci-minha-senha').click(function(){

	$('#voltar-senha').css('display', 'none');

	$('#esqueci-senha').css('display', 'block');

});

$('#voltar-minha-senha').click(function(){

	$('#esqueci-senha').css('display', 'none');

	$('#voltar-senha').css('display', 'block');

});

$('.selecionar-menu').click(function(){

	var tamanho = $(window).width();

	if (tamanho < 600) {

		menu_responsivo();

	}
	
});

$('#voltar-ao-site').click(function(){

    window.location.href = "http://www.stm-sistema.com.br/sessao-ponto/view/index.php";

});

$('.button_imprimir').click(function () {
    $('#table').btechco_excelexport({
        containerid: "table"
       , datatype: $datatype.Table
       , filename: 'tabela'
    });
});

$('.fechar').click(function(){

	$('.modal').css('display', 'none');

});

$('#botao-modal-alerta').click(function(){

	$('.modal').css('display', 'none');

	location.reload();

});

$('.button_alt_nota').click(function(){

	var id = $(this).attr('id');

	$('#modal-alt-nota'+id).css('display', 'block');

	window.onclick = function(event) {
		modal = document.getElementById('modal-alt-nota'+id);
		if (event.target == modal) {
			modal.style.display = 'none';
	  	}
	}

});

$('#valeounota').change(function(){

	var tipo = $('#valeounota').val();

	if(tipo == 1){

		$('#input_numero_id').css('display', 'inline-block');

		$('#input_vale_id').css('display', 'none');

	}else if(tipo == 2){

		$('#input_numero_id').css('display', 'none');

		$('#input_vale_id').css('display', 'inline-block');

	}else{

		$('#input_numero_id').css('display', 'none');

		$('#input_vale_id').css('display', 'none');

	}

});

$('#ver-mais-entradas').click(function() {
	var d = new Date();
    d.setTime(d.getTime() + (15 * 60 * 1000));
    var expires = 'expires='+d.toUTCString();
	document.cookie = 'entradas_all=1;'+expires+'; path=/;';
	location.reload();
});

$('#ver-menos-entradas').click(function() {
	var d = new Date();
    d.setTime(d.getTime() + (15 * 60 * 1000));
    var expires = 'expires='+d.toUTCString();
	document.cookie = 'entradas_all=0;'+expires+'; path=/;';
	location.reload();
});