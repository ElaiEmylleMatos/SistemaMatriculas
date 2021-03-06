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
    <title>Cadastro de estudante</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet">
</head>

<body class="skin-default-dark fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Sistemat</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="dist/js/CE.js"></script>
    <script type="text/javascript">
    $(function() {
      $('#cpfEst').mask('000.000.000-00', {reverse: true});
      $('#cepEst').mask('00000-000', {reverse: true});

      var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      },
      spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
          }
      };

      $('#celEst').mask(SPMaskBehavior, spOptions);

        function limpa_formulário_cep() {
            $("#lograEst").val("");
            $("#bairroEst").val("");
            $("#cidadeEst").val("");
            $("#ufEst").val("");

        }

        //Quando o campo cep perde o foco.
        $("#cepEst").blur(function() {

            var cep = $(this).val().replace(/\D/g, '');

            if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            $("#lograEst").val(dados.logradouro);
                            $("#bairroEst").val(dados.bairro);
                            $("#cidadeEst").val(dados.localidade);
                            $("#ufEst").val(dados.uf);
                        } //end if.
                        else {
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                limpa_formulário_cep();
            }
        });
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
                        <li> <a class="waves-effect waves-dark" href="cadastro-est.php" aria-expanded="false"><i class="fa fa-drivers-license-o"></i><span class="hide-menu"></span>Matricular estudante</a></li>
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
                                <h1>Cadastro de Estudante</h1>
                                <p class="text-muted m-b-30 font-13"> Todos os campos são obrigatórios.</p><br>

                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <form action="../model/insertEst.php" method="POST" class="needs-validation" novalidate>
                                            <div class="row col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-8">
                                                    <label for="nomeEst">Nome do Estudante</label>
                                                    <input type="text" class="form-control" name="nomeEst" id="nomeEst">
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <label for="rgEst">RG</label>
                                                    <input type="text" class="form-control" name="rgEst" id="rgEst">
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <label for="cpfEst">CPF</label>
                                                    <input type="text" class="form-control" name="cpfEst" id="cpfEst">
                                                </div>
                                            </div>

                                            <div class="row col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-3">
                                                    <label for="cepEst">CEP</label>
                                                    <input type="text" class="form-control" name="cepEst" id="cepEst"> <a target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" class="link"><i class="fa fa-question-circle" title="Não sei meu cep"> Não sei meu cep </i></a>
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <label for="numEst">Número</label>
                                                    <input type="text" class="form-control" name="numEst" id="numEst">
                                                </div>
                                                <div class="form-group col-sm-7">
                                                    <label for="lograEst">Logradouro</label>
                                                    <input type="text" class="form-control" name="lograEst" id="lograEst" >
                                                </div>
                                            </div>

                                            <div class="row col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-5">
                                                    <label for="bairroEst">Bairro</label>
                                                    <input type="text" class="form-control" name="bairroEst" id="bairroEst" >
                                                </div>
                                                <div class="form-group col-sm-5">
                                                    <label for="cidadeEst">Cidade</label>
                                                    <input type="text" class="form-control" name="cidadeEst" id="cidadeEst" >
                                                </div>
                                                <div class="form-group col-sm-2">
                                                    <label for="ufEst">UF</label>
                                                    <input type="text" class="form-control" name="ufEst" id="ufEst" >
                                                </div>
                                            </div>
                                            <div class="row col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-6">
                                                    <label for="emailEst">Email</label>
                                                    <input type="email" class="form-control" name="emailEst" id="emailEst">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="celEst">Celular</label>
                                                    <input type="cel" class="form-control" name="celEst" id="celEst">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                  <label class="control-label col-sm-2">Série</label>
                                                    <div class="col-sm-10">
                                                      <select class="form-control" style="width:500px" name="serieEst">
                                                        <option value="um-fundamental">1ª série (2º Ano) - Ensino Fundamental</option>
                                                        <option value="dois-fundamental">2ª série (3º Ano) - Ensino Fundamental</option>
                                                        <option value="tres-fundamental">3ª série (4º Ano) - Ensino Fundamental</option>
                                                        <option value="quatro-fundamental">4ª série (5º Ano) - Ensino Fundamental</option>
                                                        <option value="cinco-fundamental">5ª série (6º Ano) - Ensino Fundamental</option>
                                                        <option value="seis-fundamental">6ª série (7º Ano) - Ensino Fundamental</option>
                                                        <option value="sete-fundamental">7ª série (8º Ano) - Ensino Fundamental</option>
                                                        <option value="oito-fundamental">8ª série (9º Ano) - Ensino Fundamental</option>
                                                        <option value="um-ensino-medio">1º Ano - Ensino Médio</option>
                                                        <option value="dois-ensino-medio">2º Ano - Ensino Médio</option>
                                                        <option value="tres-ensino-medio">3º Ano - Ensino Médio</option>
                                                        <option value="quatro-ensino-medio">4º Ano - Ensino Médio</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            <div class="row col-lg-12 align-center">
                                              <button type="reset" class="btn btn-inverse waves-effect waves-light m-r-10">Cancelar</button>
                                              <button type="submit" class="btn btn-dark waves-effect waves-light">Cadastrar</button>
                                            </div>

                                            <script type="text/javascript">
                                            function oi() {
                                              swal({
                                                title: 'Sucesso!',
                                                text: 'Estudante cadastrado',
                                                icon: 'success',
                                              });
                                            }
                                            });
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
            © 2018 <strong>Sistemat</strong> por SMILE.
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

    <script>
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
</body>

</html>
