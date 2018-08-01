<?php

//include 'open.php';

//echo $logado;
/*echo "  <script>
    alert('".$_SESSION['user']."');
  </script>";

	/*if (($_SESSION['user'] && $_SESSION['senha'])) {
		/*if(session_destroy()) {
	      header("Location: index.php");
	    }
      $login_session = $_SESSION['user'];
	} else {


	}*/

  ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Cadastro de escola</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet">
</head>

<body class="skin-default-dark fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Sistema de Matrículas</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(function() {
      $('#cnpjEsc').mask('00.000.000/0000-00', {reverse: true});
      $('#cepEsc').mask('00000-000', {reverse: true});

      var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      },
      spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
          }
      };

      $('#telEsc').mask(SPMaskBehavior, spOptions);

        function limpa_formulário_cep() {
            $("#logradouroEsc").val("");
            $("#bairroEsc").val("");
            $("#cidadeEsc").val("");
            $("#ufEsc").val("");

        }

        //Quando o campo cep perde o foco.
        $("#cepEsc").blur(function() {

            var cep = $(this).val().replace(/\D/g, '');

            if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            $("#logradouroEsc").val(dados.logradouro);
                            $("#bairroEsc").val(dados.bairro);
                            $("#cidadeEsc").val(dados.localidade);
                            $("#ufEsc").val(dados.uf);
                        } //end if.
                        else {
                            limpa_formulário_cep();
                            swal({
                              title: 'Erro!',
                              text: 'CEP inválido. Por favor, tente novamente.',
                              icon: 'warning',
                            });
                        }
                    });
                } //end if.
                else {
                    limpa_formulário_cep();
                    swal({
                      title: 'Erro!',
                      text: 'Formato de CEP inválido. Por favor, tente novamente.',
                      icon: 'warning',
                    });
                }
            } //end if.
            else {
                limpa_formulário_cep();
            }
        });

    function validarCNPJ(cnpj) {

        cnpj = cnpj.replace(/[^\d]+/g,'');

        if(cnpj == '') return false;

        if (cnpj.length != 14)
            return false;

        // Elimina CNPJs invalidos conhecidos
        if (cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999")
            return false;

        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0,tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
          soma += numeros.charAt(tamanho - i) * pos--;
          if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;

        tamanho = tamanho + 1;
        numeros = cnpj.substring(0,tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
          soma += numeros.charAt(tamanho - i) * pos--;
          if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
              return false;

        return true;

    }

    function telefone_validation(telefone){
    //retira todos os caracteres menos os numeros
    telefone = telefone.replace(/\D/g,'');

    //verifica se tem a qtde de numero correto
    if(!(telefone.length >= 10 && telefone.length <= 11)) {
      return false;
    }
    else if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) {
      return false;
    } else {
      return true;
    }

    //verifica se não é nenhum numero digitado errado (propositalmente)
    for(var n = 0; n < 10; n++){
    	//um for de 0 a 9.
      //estou utilizando o metodo Array(q+1).join(n) onde "q" é a quantidade e n é o
      //caractere a ser repetido
    	if(telefone == new Array(11).join(n) || telefone == new Array(12).join(n))
      {  return false;
      } else {
        return true;
      }
    }
      //DDDs validos
      var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 22, 24, 27, 28, 31, 32, 33, 34, 35, 37, 38, 41, 42, 43, 44, 45, 46, 47, 48, 49, 51, 53,
    54, 55, 61, 62,    64, 63, 65, 66, 67, 68, 69, 71, 73, 74, 75, 77, 79, 81, 82, 83, 84, 85,
    86, 87, 88, 89, 91, 92, 93, 94, 95, 96, 97, 98, 99];
      //verifica se o DDD é valido
      if(codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) {
        return false;
      } else if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) {
        return false;
      } else {
        return true;
      }

    }

});



</script>

    <!-- ============================================================== -->
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <b>
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                         <!-- dark Logo text -->
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Digite e tecle enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="img-circle fa fa-user-circle"></i> </a>
                            <ul class="nav-item dropdown-menu" id="dropdown">
                              <li> <a href="#"><?= $login_session?></a></li>
                              <li><hr></li>
                              <li> <a href="logout.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span style="color:#fff;">MENU</span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="cadastro-escola.php" aria-expanded="false"><i class="fa fa-pencil-square-o"></i><span class="hide-menu"></span>Cadastrar escola</a></li>
                        <li> <a class="waves-effect waves-dark" href="cadastro-est.php" aria-expanded="false"><i class="fa fa-drivers-license-o"></i><span class="hide-menu"></span>Matricular estudante</a></li>
                        <li> <a class="waves-effect waves-dark" href="rel-escola.php" aria-expanded="false"><i class="fa fa-file-text-o"></i><span class="hide-menu">Relatório de escolas</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="rel-est.php" aria-expanded="false"><i class="fa fa-file-text-o"></i><span class="hide-menu">Relatório de estudantes</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
        </aside>
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1>Cadastro de Escola</h1>
                                <p class="text-muted m-b-30 font-13"> Todos os campos são obrigatórios.</p><br>

                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <form action="../model/insertEsc.php" method="POST">
                                            <div class="row col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-8">
                                                    <label for="nomeEsc">Nome da Instituição</label>
                                                    <input type="text" class="form-control" name="nomeEsc" id="nomeEsc" required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="cnpjEsc">CNPJ</label>
                                                    <input type="text" class="form-control" name="cnpjEsc" id="cnpjEsc" required>
                                                </div>
                                            </div>

                                            <div class="row col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-3">
                                                    <label for="cepEsc">CEP</label>
                                                    <input type="text" class="form-control" name="cepEsc" id="cepEsc" required> <a target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" class="link"><i class="fa fa-question-circle" title="Não sei meu cep"> Não sei meu cep </i></a>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <label for="numeroEsc">Número</label>
                                                    <input type="text" class="form-control" name="numeroEsc" id="numeroEsc" required>
                                                </div>
                                                <div class="form-group col-sm-7">
                                                    <label for="logradouroEsc">Logradouro</label>
                                                    <input type="text" class="form-control" name="logradouroEsc" id="logradouroEsc" required>
                                                </div>
                                            </div>

                                            <div class="row col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-5">
                                                    <label for="bairroEsc">Bairro</label>
                                                    <input type="text" class="form-control" name="bairroEsc" id="bairroEsc" required>
                                                </div>
                                                <div class="form-group col-sm-5">
                                                    <label for="cidadeEsc">Cidade</label>
                                                    <input type="text" class="form-control" name="cidadeEsc" id="cidadeEsc" required>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <label for="ufEsc">UF</label>
                                                    <input type="text" class="form-control" name="ufEsc" id="ufEsc" required>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-6">
                                                    <label for="emailEsc">Email</label>
                                                    <input type="email" class="form-control" name="emailEsc" id="emailEsc" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="telEsc">Telefone</label>
                                                    <input type="tel" class="form-control" name="telEsc" id="telEsc" required>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12 col-xs-12">
                                              <div class="form-group col-sm-6">
                                                  <label for="userEsc">Nome de Usuário</label>
                                                  <input type="text" class="form-control" name="userEsc" id="userEsc" required>
                                              </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="senhaEsc">Senha</label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" name="senhaEsc" onfocus="showPass()" id="senhaEsc" required>
                                                        <div class="input-group-append">
                                                            <button class="btn " type="button"  id="mostrar"> <i class="fa fa-eye"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-lg-12 align-center">
                                              <button type="reset" class="btn btn-inverse waves-effect waves-light m-r-10" onclick="validarForm()">Cancelar</button>
                                              <button type="submit" class="btn btn-dark waves-effect waves-light">Cadastrar</button>
                                            </div>

                                            <script type="text/javascript">
                                            function showPass() {
                                              var botao = $('#mostrar');
                                              var senha = $('#senhaEsc');
                                              botao.mouseover(function() {
                                                senha.attr("type", "text");
                                              });
                                              botao.mouseout(function() {
                                                senha.attr("type", "password");
                                              });
                                            }

                                            $('#cnpjEsc').blur(function() {
                                              if (!($('#cnpjEsc').val()=="")) {
                                                if (!(validarCNPJ($('#cnpjEsc').val()))) {
                                                  swal({
                                                    title: 'Erro!',
                                                    text: 'CNPJ inválido. Por favor, tente novamente.',
                                                    icon: 'error',
                                                  });
                                                  $('#cnpjEsc').val("");
                                                }
                                              }
                                            });

                                            $('#telEsc').blur(function() {
                                              //alert($('#telEsc').val());
                                              if (!($('#telEsc').val()=="")) {
                                                if (!(telefone_validation($('#telEsc').val()))) {
                                                  swal({
                                                    title: 'Erro!',
                                                    text: 'Telefone inválido. Por favor, tente novamente.',
                                                    icon: 'error',
                                                  });
                                                  alert("erro");
                                                  $('#telEsc').val("");
                                                }
                                              }
                                            });

                                            function validarForm() {
                                              if(!($('input').val()=="")) {
                                                alert("arroz");
                                                $('form').submit();
                                              } else {
                                                swal({
                                                  title: 'Erro!',
                                                  text: 'Campos requeridos vazios.\n Por favor, tente novamente.',
                                                  icon: 'error',
                                                });
                                              }
                                            }
                                            </script>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <footer class="footer">
            © 2018 <strong>Sistema de Matrículas</strong> por SMILE.
        </footer>
    </div>
    <!-- ============================================================== -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="dist/js/jquery.mask.min.js"></script>
</body>

</html>
