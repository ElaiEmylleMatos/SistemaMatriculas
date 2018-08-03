<?php
  date_default_timezone_set('America/Sao_Paulo');
  require '../main/open.php';
  require 'conexao.php';

  $nome = addslashes($_POST["nomeEst"]);
  $rg = addslashes($_POST["rgEst"]);
  $cpf = addslashes($_POST["cpfEst"]);
  $cep = addslashes($_POST["cepEst"]);
  $num = addslashes($_POST["numEst"]);
  $logra = addslashes($_POST["lograEst"]);
  $bairro = addslashes($_POST["bairroEst"]);
  $cidade = addslashes($_POST["cidadeEst"]);
  $uf = addslashes($_POST["ufEst"]);
  $email = addslashes($_POST["emailEst"]);
  $cel = addslashes($_POST["celEst"]);
  $serie = addslashes($_POST["serieEst"]);
  $data = date ("Y-m-d");
  $cod = $_SESSION['cod'];

  if ($num == "") {
    $num = "s/n";
  }

if (!($nome==""&&$rg==""&&$cpf==""&&$cep==""&&$num==""&&$logra==""&&$bairro==""&&$cidade==""&&$uf==""&&$email==""&&$cel=="")) {
$sql="INSERT INTO alunos(RG_alunos,CPF_alunos,cod_alunos,serie_alunos,nome_alunos,bairro_alunos,celular_alunos,email_alunos,cod_escolas,rua_alunos,data_matricula_alunos,num_alunos,cidade_alunos,uf_alunos,cep_alunos)VALUES('$rg','$cpf',NULL,'$serie','$nome','$bairro','$cel','$email','$cod','$logra','$data','$num','$cidade','$uf','$cep')";
  $res = mysqli_query($link,$sql);
  echo $sql;
}

	if ($res) {
    echo "<script>
    swal({
      title: 'Sucesso!',
      text: 'Estudante matriculado',
      icon: 'success',
    });</script>";
    header("location:../main/rel-est.php");

	} else {
		echo "<script>
    swal({
      title: 'Erro!',
      text: 'Não foi possível cadastrar estudante. Por favor, tente novamente.',
      icon: 'error',
    });</script>";
    header("location:../main/cadastro-est.php");
	}
  mysqli_close($link);
?>
