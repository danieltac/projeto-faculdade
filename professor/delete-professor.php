<?php

    require "../config.php";
    if (isset($_GET["id"])){
        $id = $_GET["id"];

        $sql = "DELETE FROM professor WHERE id=$id";
        $conn->query($sql);
    }

    header("location: /faculdade/index-adm.php");
    exit;

?>