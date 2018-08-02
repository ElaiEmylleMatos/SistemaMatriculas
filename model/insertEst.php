<?php
  date_default_timezone_set('America/Sao_Paulo');
  include 'conexao.php';

  $nome = $_POST["nomeEst"];
  $rg = $_POST["rgEst"];
  $cpf = $_POST["cpfEst"];
  $cep = $_POST["cepEst"];
  $num = $_POST["numEst"];
  $logra = $_POST["lograEst"];
  $bairro = $_POST["bairroEst"];
  $cidade = $_POST["cidadeEst"];
  $uf = $_POST["ufEst"];
  $email = $_POST["emailEst"];
  $cel = $_POST["celEst"];
  $serie = $_POST["serieEst"];
  $codu = 1;
  $data = date ("Y-m-d");

  echo "<script>
  alert($nome);
  </script>";

  if ($num == "") {
    $num = "s/n";
  }

if (!($nome==""&&$rg==""&&$cpf==""&&$cep==""&&$num==""&&$logra==""&&$bairro==""&&$cidade==""&&$uf==""&&$email==""&&$cel==""&&$serie=="")) {
  $sql = "INSERT INTO alunos (RG_alunos, CPF_alunos, cod_alunos, serie_alunos, nome_alunos, bairro_alunos, celular_alunos, email_alunos, celular_alunos, serie_alunos,cod_alunos, cod_alunos) VALUES ('$email', '$senha', '$bairro', '$rua', NULL, '$user', '$nome', '$tel', '$cnpj', '$codu','$num','$data','$uf','$cidade','$cep', '$codu')";
  $res = mysqli_query($link,$sql);
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
      text: 'Não foi possível cadastrar essa pessoa. Por favor, tente novamente.',
      icon: 'error',
    });</script>";
    header("location:../main/cadastro-est.php");
	}
  mysqli_close($link);
?>
