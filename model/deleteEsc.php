<?php
    include 'conexao.php';

    $value = $_REQUEST["q"];
    $del = "DELETE from escolas where cod_escolas=$value";
    $ans = mysqli_query($link,$del);

    /*if ($ans) {

    } else {

    }*/
    #se deletar uma escola, não tem que deletar os alunos também?
    #nao tem como dar um refresh na pag nao
    echo "<script>mudarDisplayTabela();</script>";
    mysqli_close($link);
?>
