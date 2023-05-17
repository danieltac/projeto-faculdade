<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Faculdade</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>

    <body>


        <div class="container my-5">

            <div class="d-flex justify-content-between">
                <h2>Olá, <?php echo $_SESSION['nome'];?></h2>
                <a href="/faculdade/conexao/logout.php">Sair</a>
            </div>
            <h3>Alunos no seu Curso</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turno</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "../config.php";
//                     $id = $_SESSION['id'];
//                     $nome = $_SESSION['nome'];
//
//                     $sql = " SELECT curso FROM professor WHERE nome = $nome";
//                     $result = mysqli_query($conn, $sql);
                    
//                     $curso = $row["curso"];
                    
//                     //Leitura de todas as colunas da tabela
//                     $sql_a = " SELECT curso FROM aluno WHERE curso = $curso";
//                     $result = $conn->query($sql_a);
//
//                     #$result = mysqli_query($conn, "SELECT curso FROM professor");
                    
                    // $curso = mysqli_real_escape_string($conn, $_SESSION['curso']);
                    // $sql = "SELECT curso FROM professor"
                    // $result = mysqli_query($conn, "SELECT curso FROM aluno WHERE curso = $curso");
                    // $result = $conn->query($sql);
                    // if (!$result) {
                    //     die("Query inválida: " . $conn->error);
                    // }
                    
                    // $row = $result->fetch_assoc();
                    
                    echo "
                    <tr>
                        <td>$row[nome]</td>
                        <td>$row[turno]</td>
                        <td>
                        <a href='/faculdade/professor/edit-nota.php?id=$row[id]' class='btn btn-primary'>Atribuir notas</a>
                        </td>
                    </tr>
                    ";

                    ?>

                </tbody>
            </table>
        </div>
        <div class="container my-5">

        <?php
    } else {
        //Caso não esteja logado, será redirecionado para a página de login;
        header("location: ../index.php");
        exit;
    }
        ?>