<?php
  include '../model/conexao.php';
  $q = $_REQUEST["q"];
  //$botao = $_POST[''];
  $query = "SELECT * FROM escolas WHERE cod_escolas = '$q'";

  $resp = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($resp);
 //SOCORRO! NÃO POSSO ESCREVER O HTML POR ECHOS! QUE HORROR
//echo "<script>$('#detalhes').modal('show');</script>";
echo '<div id="detalhes" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" data-backdrop="true" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2>'.$row['nome_escolas'].'</h2><br>
      </div>
      <br>

      <div class="modal-body">
          <div class="col-sm-12 col-xs-12">';
          if(!($row['sigla_escolas']=="")){
            echo '<h4>Sigla: '.$row['sigla_escolas'].'</h4><br>';
          }
            echo '<h4>Endereço: <br>'.$row['rua_escolas'].', '.$row['num_escolas'].'<br>'.$row['bairro_escolas'].', '.$row['cidade_escolas'].' - '.$row['uf_escolas'].'</h4><br>
            <h4>Telefone: '.$row['telefone_escolas'].'</h4><br>
            <h4>Email: '.$row['email_escolas'].'</h4><br>
          </div>
      </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
    </div>
  </div>
</div>';
?>
