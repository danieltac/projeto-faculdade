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
            <h3>Dados do curso:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Turno</th>
                        <th>AVP1</th>
                        <th>AVP2</th>
                        <th>MÉDIA FINAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "../config.php";
                    $id = $_SESSION['id'];

                    //Leitura da coluna da tabela que seja igual ao id do aluno logado;
                    $sql = "SELECT * FROM aluno WHERE id=$id";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Query inválida: " . $conn->error);
                    }

                    //Disponibilização do resultado da busca na tela
                    $row = $result->fetch_assoc();

                    echo "
                    <tr>
                        <td>$row[curso]</td>
                        <td>$row[turno]</td>
                        <td>$row[avp1]</td>
                        <td>$row[avp2]</td>
                        <td>$row[med]</td>
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