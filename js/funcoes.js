$(function(){
  
  $('.form').on('submit', function(){

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

        if(response.status == 1){

          $('.p-modal').text("Preencha os campos corretamente.");

        }

        if(response.status == 2){

          $('.p-modal').text("E-mail invalido!");

        }

        if(response.status == 3){

          $('.p-modal').text("Contato feito! Aguarde o retorno em seu e-mail.");

        }

        if(response.status == 4){

          $('.p-modal').text("Arquivo invalido para envio, só são permitidos arquivos: .docx, .doc, .pdf e .odt");

        }

        var modal = document.getElementById('modal-alerta');

        var span = document.getElementsByClassName("fechar")[0];

        var botao = document.getElementsByClassName("botao-modal")[0];

        modal.style.display = "block";

        if(response.status == 3){

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

        }else{

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

      },
      
      error: function(){

        $('.p-modal').text("Erro");

        var modal = document.getElementById('modal-alerta');

        var span = document.getElementsByClassName("fechar")[0];

        var botao = document.getElementsByClassName("botao-modal")[0];

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

  $("#select-contact" ).change(function() {

    var value = $('#select-contact').val();

    var divCurriculo = document.getElementsByClassName('aciona-curriculo')[0];

    if(value == 2){

      divCurriculo.style.display = "block";

    }else{

      divCurriculo.style.display = "none";

      $('#arquivo-contato').val("");

    }

  });

  $("#missao" ).click(function() {

    $('.p-modal').text("Ser o parceiro fundamental na busca de soluções em Automação, atuando de forma segura e sustentável, com responsabilidade social e ambiental, fornecendo produtos e serviços adequados às necessidades dos clientes e contribuindo para o desenvolvimento do setor de Automação Bancária e Comercial.");

    var modal = document.getElementById('modal-alerta');

    var span = document.getElementsByClassName("fechar")[0];

    var botao = document.getElementsByClassName("botao-modal")[0];

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

  });

  $("#visao" ).click(function() {

    $('.p-modal').text("Estar entre as melhores empresas de multimarcas em Automação Bancária e Comercial do país, sendo referência nacional no fornecimento de soluções para o setor, e reconhecida por oferecer soluções adequadas às necessidades dos nossos clientes.");

    var modal = document.getElementById('modal-alerta');

    var span = document.getElementsByClassName("fechar")[0];

    var botao = document.getElementsByClassName("botao-modal")[0];

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

  });

  $("#valores" ).click(function() {

    var modal = document.getElementById('modal-valores');

    var span = document.getElementsByClassName("fechar-valores")[0];

    var botao = document.getElementsByClassName("botao-modal-valores")[0];

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

  });

  $("#sustentabilidade" ).click(function() {

    $('.p-modal').text("Podemos ajudar sua empresa a preservar o meio ambiente, evitando descartes indevidos. Nossos processos de Recuperação é uma maneira simples e eficaz para eliminação para necessidade de descartes, aumentando a vida útil do seu patrimônio e também contribuindo "
+"para um mundo mais verde. Conheça nossos trabalhos de recuperação e contribua ainda mais para o bem-estar de nosso planeta.");

    var modal = document.getElementById('modal-alerta');

    var span = document.getElementsByClassName("fechar")[0];

    var botao = document.getElementsByClassName("botao-modal")[0];

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

  });

  function padronizaHeight() {

    $('.box-projetos').css('height', 'auto');

    var alturas = new Array();

    $('.box-projetos').each(function(){

      alturas.push($(this).height());

    });

    $('.box-projetos').css('height', Math.max.apply(null, alturas) + 'px');

  }

  padronizaHeight();

  $(window).on('load', function(){

    padronizaHeight();

  });

  $(window).on('resize', function(){

    padronizaHeight();

  });

});
