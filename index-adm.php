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


        <h2>Lista de Alunos</h2>
        <a href="/projeto-faculdade/aluno/create-aluno.php" class="btn btn-primary">Cadastrar Aluno</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Cursando</th>
                    <th>Turno</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "config.php";
                //Leitura de todas as colunas da tabela
                $sql = "SELECT * FROM aluno";
                $result = $conn->query($sql);

                if (!$result){
                    die("Query inválida: ". $conn->error);
                }

                //Disponibilização do resultado da busca na tela

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[nome]</td>
                        <td>$row[curso]</td>
                        <td>$row[turno]</td>
                        <td>
                            <a href='/projeto-faculdade/aluno/edit-aluno.php?id=$row[id]' class='btn btn-primary'>Editar</a>
                            <a href='/projeto-faculdade/aluno/delete-aluno.php?id=$row[id]' class='btn btn-primary'>Excluir</a>
                        </td>
                    </tr>
                    ";
                }

                ?>
                
            </tbody>
        </table>
    </div>
    <div class="container my-5">
            
    <h2>Lista de Professores</h2>
    <a href="/projeto-faculdade/professor/create-professor.php" class="btn btn-primary">Cadastrar Professor</a>
    <table class="table">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Ministrando</th>
                <th>Turno</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "config.php";
            //Leitura de todas as colunas da tabela
            $sql = "SELECT * FROM professor";
            $result = $conn->query($sql);

            if (!$result){
                die("Query inválida: ". $conn->error);
            }

           //Disponibilização do resultado da busca na tela

            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[nome]</td>
                    <td>$row[curso]</td>
                    <td>$row[turno]</td>
                    <td>
                        <a href='/projeto-faculdade/professor/edit-professor.php?id=$row[id]' class='btn btn-primary'>Editar</a>
                        <a href='/projeto-faculdade/professor/delete-professor.php?id=$row[id]' class='btn btn-primary'>Excluir</a>
                    </td>
                </tr>
                ";
            }

            ?>
                    
            </tbody>
        </table>
    </div>


</body>
</html>