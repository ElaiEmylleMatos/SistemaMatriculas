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
                          <?php echo "<input type='text' class='form-control' name='nomeEsc' id='nomeEsc' required value='".$row['cod_escolas']."'>";?>
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

              </form>
          </div>
      </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-dark waves-effect waves-light"  onclick='editarEsc('<?=$row['cod_escolas']?>')'>Salvar</button>
        </div>
    </div>
  </div>
</div>
