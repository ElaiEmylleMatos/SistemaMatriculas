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
            <p class="loader__label">Sistemat</p>
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
                <span><img src="../assets/images/logo-icon.png" alt="elegant admin template"></span>
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
                        <li> <a class="waves-effect waves-dark" href="rel-escola.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Relatório de escolas</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="rel-est.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Relatório de estudantes</span></a></li>
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
                                      <h5 class="card-title"><?php echo "Sales Overview"?></h5>
                                      <h6 class="card-subtitle">Check the monthly sales </h6>
                                  </div>
                                  <div class="ml-auto">
                                      <select class="custom-select b-0">
                                          <option>January</option>
                                          <option value="1">February</option>
                                          <option value="2" selected="">March</option>
                                          <option value="3">April</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="table-responsive">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th class="text-center">#</th>
                                          <th>NAME</th>
                                          <th>DATE</th>
                                          <th>PRICE</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td class="text-center">1</td>
                                          <td class="txt-oflo">Elite admin</td>
                                          <td class="txt-oflo">April 18, 2017</td>
                                          <td><span class="text-success">$24</span></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">2</td>
                                          <td class="txt-oflo">Real Homes WP Theme</td>
                                          <td class="txt-oflo">April 19, 2017</td>
                                          <td><span class="text-info">$1250</span></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">3</td>
                                          <td class="txt-oflo">Ample Admin</td>
                                          <td class="txt-oflo">April 19, 2017</td>
                                          <td><span class="text-info">$1250</span></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">4</td>
                                          <td class="txt-oflo">Medical Pro WP Theme</td>
                                          <td class="txt-oflo">April 20, 2017</td>
                                          <td><span class="text-danger">-$24</span></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">5</td>
                                          <td class="txt-oflo">Hosting press html</td>
                                          <td class="txt-oflo">April 21, 2017</td>
                                          <td><span class="text-success">$24</span></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">6</td>
                                          <td class="txt-oflo">Digital Agency PSD</td>
                                          <td class="txt-oflo">April 23, 2017</td>
                                          <td><span class="text-danger">-$14</span></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">7</td>
                                          <td class="txt-oflo">Helping Hands WP Theme</td>
                                          <td class="txt-oflo">April 22, 2017</td>
                                          <td><span class="text-success">$64</span></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">8</td>
                                          <td class="txt-oflo">Helping Hands WP Theme</td>
                                          <td class="txt-oflo">April 22, 2017</td>
                                          <td><span class="text-success">$64</span></td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">9</td>
                                          <td class="txt-oflo">Ample Admin</td>
                                          <td class="txt-oflo">April 19, 2017</td>
                                          <td><span class="text-info">$1250</span></td>
                                      </tr>
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
        <footer class="footer">
            © 2018 <strong>Sistemat</strong> por SMILE.
        </footer>
    </div>
    <!-- ============================================================== -->
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
