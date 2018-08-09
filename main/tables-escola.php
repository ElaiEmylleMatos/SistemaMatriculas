<?php
include '../model/conexao.php';

$count = 1;

    $sql = "SELECT * from escolas order by nome_escolas";
    $res = mysqli_query($link,$sql);

  while($row = mysqli_fetch_assoc($res)):
    echo "<tr>
        <td class='txt-oflo'>".$row['cod_escolas']."</td>
        <td class='txt-oflo'>";
        if(!($row['sigla_escolas']=="")){
          echo $row['sigla_escolas']." - ";
        }
        echo $row['nome_escolas']."</td>
        <td class='txt-oflo'>".$row['email_escolas']."</td>
        <td class='txt-oflo'>".$row['data_cadastro']."</td>
        <td class='txt-oflo'><button class='btn btn-success waves-effect waves-light m-r-5' name='d$count' value=".$row['cod_escolas']." id='d$count' onclick='teste(this.value)'>Detalhes</button><button class='btn btn-info waves-effect waves-light m-r-5' name='e$count' value=".$row['cod_escolas']." id='e$count' onclick='mostrarModal(".$row['cod_escolas'].")'>Editar</button><button class='btn btn-danger waves-effect waves-light m-r-10' id='d$count' onclick='excluirEsc(".$row['cod_escolas'].")'>Excluir</button></td>
    </tr>";
    $count = $count + 1;
  endwhile;

  mysqli_close($link);

?>
