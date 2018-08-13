<?php
  include_once '../model/conexao.php';
  $c = $_REQUEST['cnpj'];
  if($c) {
    $sql = "SELECT cnpj_escolas FROM escolas WHERE cnpj_escolas='".$c."'";
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
