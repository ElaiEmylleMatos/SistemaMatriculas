<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

include '../model/conexao.php';
$sql="SELECT * FROM escolas WHERE cod_escolas = '".$q."'";
$result = mysqli_query($link,$sql);

echo "<table>
<tr>
<th>Nome</th>
<th>Telefone</th>
<th>Data de cadastro</th>
<th>CEP</th>
<th>Bairro</th>
<th>Cidade</th>
<th>UF</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['nome_escolas'] . "</td>";
  echo "<td>" . $row['telefone_escolas'] . "</td>";
  echo "<td>" . $row['data_cadastro'] . "</td>";
  echo "<td>" . $row['cep_escolas'] . "</td>";
  echo "<td>" . $row['bairro_escolas'] . "</td>";
  echo "<td>" . $row['cidade_escolas'] . "</td>";
  echo "<td>" . $row['uf_escolas'] . "</td>";
  echo "</tr>";
 }
  echo "</table>";
mysqli_close($link);
?>
</body>
</html>
