<link href="../dist/css/style.css" rel="stylesheet">
<script src="../../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<script src="ajaxData.js"></script>

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
                  <th>#</th>
                  <th>Nome da Escola</th>
                  <th>Email</th>
                  <th style="width:10%">Data de Cadastro</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody id="body-table">
                <?php
                  require('../../model/conexao.php');
                  $sql = "select * from escolas";
                  $res = mysqli_query($link,$sql) or die("database error:". mysqli_error($link));

                  while($row = mysqli_fetch_assoc($res)):
                ?>
                <tr>
                  <td class='txt-oflo'>
                    <?=$row['cod_escolas'];?>
                  </td>
                  <td class='txt-oflo'>
                    <?php
                    if(!($row['sigla_escolas']=="")){
                      echo $row['sigla_escolas']." - ";
                    }
                    echo $row['nome_escolas']; ?>
                  </td>
                  <td class='txt-oflo'>
                    <?=$row['email_escolas'];?>
                  </td>
                  <td class='txt-oflo'>
                    <?=$row['data_cadastro'];?>
                  </td>
                  <td class='txt-oflo'>
                    <button data-toggle="modal" data-target="#detalhes" data-id='<?php echo $row["cod_escolas"]; ?>' id="getDetalhes" class='btn btn-success waves-effect waves-light m-r-5'>Detalhes</button>
                    <button data-toggle="modal" data-target="#editar" data-idi='<?php echo $row["cod_escolas"]; ?>' id="getEditar" class='btn btn-info waves-effect waves-light m-r-5'>Editar</button>

                    <button class='btn btn-danger waves-effect waves-light m-r-10' id='d'>Excluir</button>
                  </td>
                </tr>
                <?php endwhile; ?>
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

<div id="detalhes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Detalhes da Escola</h3>
      </div>
      <div class="modal-body">
        <div id="escola_data-loader" style="display: none; text-align: center;">
          <img src="ajax-loader.gif">
        </div>
        <div id="detalhes-escola">
          <div class="col-md-12">
            <div class="row col-md-12">
              <div class="col-md-8">
                <h4>Escola:</h4>
                <h4><strong id="nome"></strong></h4>
              </div>
              <div class="col-md-4">
                <h4>CNPJ:</h4>
                <h4><strong id="cnpj"></strong></h4>
              </div>
            </div><br>
            <div class="row col-md-12">
              <div class="col-md-12">
                <h4>Endereço:</h4>
                <h4><strong id="end"></strong></h4>
              </div>
            </div><br>
            <div class="row col-md-12">
              <div class="col-md-5">
                <h4>Telefone:</h4>
                <h4><strong id="tel"></strong></h4>
              </div>
              <div class="col-md-7">
                <h4>Email:</h4>
                <h4><strong id="email"></strong></h4>
              </div>
            </div><br>
            <div class="row col-md-12">
              <div class="col-md-12">
                <h4>Data de Cadastro:</h4>
                <h4><strong id="cad"></strong></h4>
              </div>
            </div><br>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<div id="editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Editar dados da Escola</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">
        <form name="formulario">
        <div id="editar_data-loader" style="display: none; text-align: center;">
          <img src="ajax-loader.gif">
        </div>
        <div id="editar-escola">
          <div class="col-md-12">
            <!--form action="../model/updateEsc.php" method="POST" class="needs-validation" novalidate-->
                <div class="row col-sm-12 col-xs-12">
                    <div class="form-group col-sm-7">
                        <label for="nomeEsc">Nome da Instituição</label>
                        <input type='text' class='form-control' name='nomeEsc' id='nomeEsc' required>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="siglaEsc">Sigla</label>
                        <input type="text" class="form-control" name="siglaEsc" id="siglaEsc">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="cnpjEsc">CNPJ</label>
                        <input type='text' class='form-control' name='cnpjEsc' id='cnpjEsc' required>
                    </div>
                </div>

                <div class="row col-sm-12 col-xs-12">
                    <div class="form-group col-sm-3">
                        <label for="cepEsc">CEP</label>
                        <input type='text' class='form-control' name='cepEsc' id='cepEsc' required> <a target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" class="link"><i class="fa fa-question-circle" title="Não sei meu cep"> Não sei meu cep </i></a>
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
          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="submit"  class="btn btn-dark waves-effect waves-light">Salvar</button>
      </div>
    </div>
  </div>
</div>



<script src="../../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
