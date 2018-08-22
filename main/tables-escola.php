<table id="datatable-buttons" class="table table-hover" style="background-color:#fff;">
  <thead>
    <tr>
      <th>#</th>
      <th>Nome da Escola</th>
      <th>Email</th>
      <th style="width:12%">Última Modificação</th>
      <th style="width:25%">Ação</th>
    </tr>
  </thead>
  <tbody id="body-table">
    <?php
      require('../model/conexao.php');
      $sql = "select * from escolas";
      $res = mysqli_query($link,$sql) or die("database error:". mysqli_error($link));

      while($row = mysqli_fetch_assoc($res)):
    ?>
    <tr>
      <td class='txt-oflo'>
        <?=$row["cod_escolas"]; ?>
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
        <?php
        $de = $row['data_cadastro'];
        $data_e = substr($de, 8,9) ."/".substr($de, 5,2)."/".substr($de, 0,4);
        echo $data_e;
        ?>
      </td>
      <td class='txt-oflo'>
        <button data-toggle="modal" data-target="#detalhes" data-id='<?php echo $row["cod_escolas"]; ?>' id="getDetalhes" class='btn btn-success waves-effect waves-light m-r-5'>Detalhes</button>
        <button data-toggle="modal" data-target="#editar" data-idi='<?php echo $row["cod_escolas"]; ?>' id="getEditar" class='btn btn-info waves-effect waves-light m-r-5'>Editar</button>
        <button class='btn btn-danger waves-effect waves-light m-r-10' data-id='<?php echo $row["cod_escolas"]; ?>' id='getExcluir'>Excluir</button>
      </td>
    </tr>
  <?php endwhile; mysqli_close($link);?>
  </tbody>
  <script type="text/javascript">
		$("#datatable-buttons").DataTable({dom:"Blfrtip",buttons:[{extend:"copy",className:"btn btn-secondary"},{extend:"csv",className:"btn btn-secondary"},{extend:"excel",className:"btn btn-secondary"},{extend:"pdfHtml5",className:"btn btn-secondary"},{extend:"print",className:"btn btn-secondary"}]});
	</script>
</table>
