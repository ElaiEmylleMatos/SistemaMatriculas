<?php
    include_once 'conexao.php';

    $value = $_REQUEST["id"];
    $del = "DELETE from escolas where cod_escolas=$value";
    $ans = mysqli_query($link,$del);
    //IMPLEMENTAR METODO PARA EXCLUIR ALUNOS TAMBÉM
    mysqli_close($link);
?>
