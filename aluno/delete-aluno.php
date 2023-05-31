<?php

    require "../config.php";
    //Busca o aluno pelo ID
    if (isset($_GET["id"])){
        $id = $_GET["id"];
        $repositorioAluno->deleteAlunoId($id);
    }

    header("location: /projeto-faculdade/index-adm.php");
    exit;

?>