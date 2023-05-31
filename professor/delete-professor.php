<?php
    require "../config.php";

    if (isset($_GET["id"])){
        $id = $_GET["id"];
        $repositorioProfessor->deleteProfessor($id);
    }

    header("location: /projeto-faculdade/index-adm.php");
    exit;
?>