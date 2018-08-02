<?php
  include '../model/conexao.php';
  $value = $_REQUEST["q"];
  echo "<script>alert('$value');</script>";
  $query = "SELECT * from escolas where cod_escolas = '$value'";

  $resp = mysqli_query($link, $query);
  $linha = mysqli_fetch_assoc($resp);
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="dist/js/CE.js"></script>

<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Editar cadastro de Escola</h2><br>
      </div>
      <br>

      <div class="row modal-body">
          <div class="col-sm-12 col-xs-12">
              <form action="../model/updateEsc.php" method="POST">
                  <div class="row col-sm-12 col-xs-12">
                      <div class="form-group col-sm-8">
                          <label for="nomeEsc">Nome da Instituição</label>
                          <?php echo "<input type='text' class='form-control' name='nomeEsc' id='nomeEsc' required value='".$linha['nome_escolas']."'>";?>
                      </div>
                      <div class="form-group col-sm-4">
                          <label for="cnpjEsc">CNPJ</label>
                          <?php echo "<input type='text' class='form-control' name='cnpjEsc' id='cnpjEsc' required value='".$linha['cnpj_escolas']."'>";?>
                      </div>
                  </div>

                  <div class="row col-sm-12 col-xs-12">
                      <div class="form-group col-sm-3">
                          <label for="cepEsc">CEP</label>
                          <?php echo "<input type='text' class='form-control' name='cepEsc' id='cepEsc' required value='".$linha['cep_escolas']."'>";?> <a target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" class="link"><i class="fa fa-question-circle" title="Não sei meu cep"> Não sei meu cep </i></a>
                      </div>
                      <div class="form-group col-sm-2">
                          <label for="numeroEsc">Número</label>
                          <?php echo '<input type="text" class="form-control" name="numeroEsc" id="numeroEsc" required value="'.$linha['num_escolas'].'">';?>
                      </div>
                      <div class="form-group col-sm-7">
                          <label for="logradouroEsc">Logradouro</label>
                          <?php echo '<input type="text" class="form-control" name="logradouroEsc" id="logradouroEsc" required value="'.$linha['rua_escolas'].'">';?>
                      </div>
                  </div>

                  <div class="row col-sm-12 col-xs-12">
                      <div class="form-group col-sm-5">
                          <label for="bairroEsc">Bairro</label>
                          <?php echo '<input type="text" class="form-control" name="bairroEsc" id="bairroEsc" required  value="'.$linha['bairro_escolas'].'">';?>
                      </div>
                      <div class="form-group col-sm-5">
                          <label for="cidadeEsc">Cidade</label>
                          <?php echo '<input type="text" class="form-control" name="cidadeEsc" id="cidadeEsc" required  value="'.$linha['cidade_escolas'].'">';?>
                      </div>
                      <div class="form-group col-sm-2">
                          <label for="ufEsc">UF</label>
                          <?php echo '<input type="text" class="form-control" name="ufEsc" id="ufEsc" required value="'.$linha['uf_escolas'].'">';?>
                      </div>
                  </div>
                  <div class="row col-sm-12 col-xs-12">
                      <div class="form-group col-sm-6">
                          <label for="emailEsc">Email</label>
                          <?php echo '<input type="email" class="form-control" name="emailEsc" id="emailEsc" required value="'.$linha['email_escolas'].'">';?>
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="telEsc">Telefone</label>
                          <?php echo '<input type="tel" class="form-control" name="telEsc" id="telEsc" required value="'.$linha['telefone_escolas'].'">';?>
                      </div>
                  </div>
                  <div class="row col-sm-12 col-xs-12">
                    <div class="form-group col-sm-6">
                        <label for="userEsc">Nome de Usuário</label>
                        <?php echo '<input type="text" class="form-control" name="userEsc" id="userEsc" required value="'.$linha['nomeAcesso_escolas'].'">';?>
                    </div>
                      <div class="form-group col-sm-6">
                          <label for="senhaEsc">Senha</label>
                          <div class="input-group mb-3">
                              <?php echo '<input type="password" class="form-control" name="senhaEsc" onfocus="showPass()" id="senhaEsc" required  value="'.$linha['senha_escolas'].'">';?>
                              <div class="input-group-append">
                                  <button class="btn " type="button"  id="mostrar"> <i class="fa fa-eye"></i> </button>
                              </div>
                          </div>
                      </div>
                  </div>

              </form>
          </div>
      </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <?php echo '<button type="submit" class="btn btn-dark waves-effect waves-light"  onclick="editarEsc('.$value.')">Salvar</button>';?>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
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

function editarEsc(codi) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "../model/updateEsc.php?q=" + codi, true);
  xmlhttp.send();

  mudarDisplayTabela();
  swal("Sucesso", "Suas informações foram alteradas.", "success");

}

</script>
