<?php
  include_once '../model/conexao.php';
  $u = $_REQUEST['user'];
  if($u) {
    $sql = "SELECT nomeAcesso_escolas FROM escolas WHERE nomeAcesso_escolas='".$u."'";
  	$resultset = mysqli_query($link, $sql) or die("database error:". mysqli_error($link));
  	if (mysqli_num_rows($resultset) > 0) {
      $data = false;
    } else {
      $data = true;
    }
  } else {
  	$data = false;
  }
  echo $data;
?>
