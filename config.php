<?php

    require_once "src/model/RepositorioAluno.php";
    require_once "src/model/RepositorioProfessor.php";

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "pdo";

    //Criação da conexão com o banco de dados
    $conn = new mysqli($server, $user, $pass, $database);

    //Checagem da conexão
    if ($conn->connect_error) {
        die("A conexão falhou: " . $conn->connect_error);
    }
    
    $repositorioAluno = new RepositorioAluno($conn);
    $repositorioProfessor = new RepositorioProfessor($conn);
?>
