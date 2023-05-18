<?php

    require "../config.php";
    //Busca o aluno pelo ID
    if (isset($_GET["id"])){
        $id = $_GET["id"];
        //Excluí o aluno pelo ID
        $sql = "DELETE FROM aluno WHERE id=$id";
        $conn->query($sql);
    }

    header("location: /faculdade/index-adm.php");
    exit;

?>