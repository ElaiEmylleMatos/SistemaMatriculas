<?php

include 'open.php';
//include '../model/conexao.php';

$count = 1;

	if (!($_SESSION['user'] && $_SESSION['senha'])) {
		if(session_destroy()) {
	      header("Location: index.php");
	    }
	} else {
		$login_session = $_SESSION['user'];
		#$nome_user = $_SESSION['nome_user'];

		$sql = "select nome_escolas,email_escolas,data_cadastro from escolas where nomeAcesso_escolas = '$login_session'";
    $res = mysqli_query($link,$sql);

	}


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
    <title>Relatório de Escolas</title>
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


    <!-- ============================================================== -->
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
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
                              <div class="d-flex">
                                  <div>
                                      <h1>Relatório de Escolas</h1>
                                      <p class="text-muted m-b-30 font-13"> Todas as escolas cadastradas.</p>
                                  </div>
                              </div>
                          </div>
                          <div class="table-responsive">
                              <table class="table table-hover" style="background-color:#fff;">
                                  <thead>
                                      <tr>
                                          <th>Nome da Escola</th>
                                          <th>Email</th>
                                          <th>Data de Cadastro</th>
                                          <th>Ação</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      while($row = mysqli_fetch_assoc($res)):
                                        echo "<tr>
                                            <td class='txt-oflo'>".$row['nome_escolas']."</td>
                                            <td class='txt-oflo'>".$row['email_escolas']."</td>
                                            <td class='txt-oflo'>".$row['data_cadastro']."</td>
                                            <td class='txt-oflo'><button class='btn btn-info waves-effect waves-light m-r-5' id='e$count' onclick='editarEsc(".$row['cod_escolas'].")'>Editar</button><button class='btn btn-danger waves-effect waves-light m-r-10' id='d$count' onclick='excluirEsc(".$row['cod_escolas'].")'>Excluir</button></td>
                                        </tr>";
                                        $count = $count + 1;
                                      endwhile;

                                      mysqli_close($link);
                                    ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <script type="text/javascript">
            function excluirEsc(cod) {
              swal({
                title: "Deletar escola?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          xmlhttp.open("GET", "getEscolas.php?q=" + cod, true);
                      }
                  };
                  xmlhttp.open("GET", "../model/deleteEsc.php?q=" + cod, true);
                  xmlhttp.send();

                  swal("Escola excluída", {
                    icon: "success",
                  });
                }
              });

            }

            function editarEsc(cod) {
              swal("Editar informações de escola", {
                buttons: {
                  cancel: "Cancelar",
                  catch: {
                    text: "Salvar",
                    value: "salvar",
                  },
                },
                content: "input",

              })
              .then((value) => {
                switch (value) {

                  case "salvar":
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                      }
                    };
                    xmlhttp.open("GET", "../model/updateEsc.php?q=" + cod, true);
                    xmlhttp.send();
                    swal("Sucesso", "Suas informações foram alteradas.", "success");
                    break;

                  default:
                    //swal("Got away safely!");
                }
              });



            }
        </script>
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
