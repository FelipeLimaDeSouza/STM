$(function(){

	var on;

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");

        if(on == null){

        	$("#menu-toggle").css('background-image', 'url(images/menu_close.png)');

        	$("#menu-toggle").css('background-color', '#000');

        	on = 1;

        }else{

        	$("#menu-toggle").css('background-image', 'url(images/menu_icon.png)');

        	$("#menu-toggle").css('background-color', '#0a0029');

        	on = null;

        }

    });

    $('#entrada').click(function(){

        $('#modal-usuarios').css('display', 'none');

        $('#modal-hp').css('display', 'none');

        $('#modal-usuario-cad').css('display', 'none');

        $('#modal-saida').css('display', 'none');

        $('#modal-volta').css('display', 'none');

        $('#modal-almoco').css('display', 'none');

        var modal = document.getElementById('modal-entrada');

        var span = document.getElementsByClassName("fechar")[0];

        var botao = document.getElementById("botao-entrada");

        modal.style.display = "block";

        span.onclick = function() {
          modal.style.display = "none";
        }

        botao.onclick = function() {
          modal.style.display = "none";
          window.location.href = "home.php?ent=true";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }

    });

    $('#almoco').click(function(){

        $('#modal-usuarios').css('display', 'none');

        $('#modal-hp').css('display', 'none');

        $('#modal-usuario-cad').css('display', 'none');

        $('#modal-saida').css('display', 'none');

        $('#modal-volta').css('display', 'none');

        $('#modal-entrada').css('display', 'none');

        var modal = document.getElementById('modal-almoco');

        var span = document.getElementsByClassName("fechar")[6];

        var botao = document.getElementById("botao-almoco");

        modal.style.display = "block";

        span.onclick = function() {
          modal.style.display = "none";
        }

        botao.onclick = function() {
          modal.style.display = "none";
          window.location.href = "home.php?alm=true";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }

    });

    $('#volta').click(function(){

        $('#modal-usuarios').css('display', 'none');

        $('#modal-hp').css('display', 'none');

        $('#modal-usuario-cad').css('display', 'none');

        $('#modal-saida').css('display', 'none');

        $('#modal-almoco').css('display', 'none');

        $('#modal-entrada').css('display', 'none');

        var modal = document.getElementById('modal-volta');

        var span = document.getElementsByClassName("fechar")[7];

        var botao = document.getElementById("botao-volta");

        modal.style.display = "block";

        span.onclick = function() {
          modal.style.display = "none";
        }

        botao.onclick = function() {
          modal.style.display = "none";
          window.location.href = "home.php?vlt=true";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }

    });

    $('#saida').click(function(){

        $('#modal-usuarios').css('display', 'none');

        $('#modal-hp').css('display', 'none');

        $('#modal-usuario-cad').css('display', 'none');

        $('#modal-volta').css('display', 'none');

        $('#modal-almoco').css('display', 'none');

        $('#modal-entrada').css('display', 'none');

        var modal = document.getElementById('modal-saida');

        var span = document.getElementsByClassName("fechar")[8];

        var botao = document.getElementById("botao-saida");

        modal.style.display = "block";

        span.onclick = function() {
          modal.style.display = "none";
        }

        botao.onclick = function() {
          modal.style.display = "none";
          window.location.href = "home.php?sid=true";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }

    });

    $('.esqueci-minha-senha').click(function(){

        var divLogin = document.getElementsByClassName("login")[0];

        var divAlterar = document.getElementsByClassName("alterar-senha")[0];

        divLogin.style.display = "none";

        divAlterar.style.display = "block";

    });

    $('.voltar-login').click(function(){

        var divLogin = document.getElementsByClassName("login")[0];

        var divAlterar = document.getElementsByClassName("alterar-senha")[0];

        divAlterar.style.display = "none";

        divLogin.style.display = "block";

    });

    $('#voltar-ao-site').click(function(){

        window.location.href = "http://www.stm-sistema.com.br";

    });

    $('#menu-cadastrar-usuario').click(function(){

        $('#modal-usuarios').css('display', 'none');

        $('#modal-hp').css('display', 'none');

        $('#modal-saida').css('display', 'none');

        $('#modal-volta').css('display', 'none');

        $('#modal-almoco').css('display', 'none');

        $('#modal-entrada').css('display', 'none');

        var modal = document.getElementById('modal-usuario-cad');

        var span = document.getElementsByClassName("fechar")[1];

        $("#wrapper").toggleClass("toggled");

        if(on == null){

            $("#menu-toggle").css('background-image', 'url(images/menu_close.png)');

            $("#menu-toggle").css('background-color', '#000');

            on = 1;

        }else{

            $("#menu-toggle").css('background-image', 'url(images/menu_icon.png)');

            $("#menu-toggle").css('background-color', '#0a0029');

            on = null;

        }

        modal.style.display = "block";

        span.onclick = function() {
          modal.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }

    });

    $('#menu-historico-pessoal').click(function(){

        $('#modal-usuarios').css('display', 'none');

        $('#modal-usuario-cad').css('display', 'none');

        $('#modal-saida').css('display', 'none');

        $('#modal-volta').css('display', 'none');

        $('#modal-almoco').css('display', 'none');

        $('#modal-entrada').css('display', 'none');

        var modal = document.getElementById('modal-hp');

        var span = document.getElementsByClassName("fechar")[3];

        var botao = document.getElementsByClassName("botao-modal")[3];

        $("#wrapper").toggleClass("toggled");

        if(on == null){

            $("#menu-toggle").css('background-image', 'url(images/menu_close.png)');

            $("#menu-toggle").css('background-color', '#000');

            on = 1;

        }else{

            $("#menu-toggle").css('background-image', 'url(images/menu_icon.png)');

            $("#menu-toggle").css('background-color', '#0a0029');

            on = null;

        }

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

    $('#menu-usuarios').click(function(){

        $('#modal-hp').css('display', 'none');

        $('#modal-usuario-cad').css('display', 'none');

        $('#modal-saida').css('display', 'none');

        $('#modal-volta').css('display', 'none');

        $('#modal-almoco').css('display', 'none');

        $('#modal-entrada').css('display', 'none');

        var modal = document.getElementById('modal-usuarios');

        var span = document.getElementsByClassName("fechar")[2];

        var botao = document.getElementsByClassName("botao-modal")[2];

        $("#wrapper").toggleClass("toggled");

        if(on == null){

            $("#menu-toggle").css('background-image', 'url(images/menu_close.png)');

            $("#menu-toggle").css('background-color', '#000');

            on = 1;

        }else{

            $("#menu-toggle").css('background-image', 'url(images/menu_icon.png)');

            $("#menu-toggle").css('background-color', '#0a0029');

            on = null;

        }

        modal.style.display = "block";

        span.onclick = function() {
          modal.style.display = "none";
          window.location.href = "../view/home.php";
        }

        botao.onclick = function() {
          modal.style.display = "none";
          window.location.href = "../view/home.php";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
            window.location.href = "../view/home.php";
          }
        }

    });

    $('#menu-sair').click(function(){

        window.location.href = "../control/Logout.php";

    });

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

            if(response.status == 0){

                $('.p-modal').text(response.mensagem);

            }

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

            if(response.status == 5){

              window.location.href = response.link;

            }

            if(response.status == 6){

                $('.p-modal').text("Cadastro efetuado.");

                var modal = document.getElementById('modal-alerta');

                var form = document.getElementById('cadastro');

                var span = document.getElementsByClassName("fechar")[1];

                var botao = document.getElementById("botao-modal-cad");

                modal.style.display = "block";

                form.style.display = "none";

                botao.style.display = "block";

                span.onclick = function() {
                    modal.style.display = "none";
                    window.location.href = response.link;
                }

                botao.onclick = function(){

                    modal.style.display = "none";
                    window.location.href = response.link;

                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                        window.location.href = response.link;
                    }
                }


            }else if (response.status != 5){

                if(response.status == 7){

                    $('.p-modal').text("Alteração realizada.");

                    var modal = document.getElementById('modal-alerta');

                    var form = document.getElementById('alterar-form');

                    var span = document.getElementsByClassName("fechar")[1];

                    var botao = document.getElementById("botao-modal-alt");

                    modal.style.display = "block";

                    form.style.display = "none";

                    botao.style.display = "block";

                    span.onclick = function() {
                        modal.style.display = "none";
                        window.location.href = response.link;
                    }

                    botao.onclick = function(){

                        modal.style.display = "none";
                        window.location.href = response.link;

                    }

                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                            window.location.href = response.link;
                        }
                    }

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

    $('#acessar-webmail').click(function(){

        window.location.href = "https://webmail-seguro.com.br/stm-sistema.com.br/v2/";

    });

    $('#acessar-cad-portaria').click(function(){

        window.location.href = "../../../sessao-cadastro-pessoas-portaria/view/index.php";

    });

});