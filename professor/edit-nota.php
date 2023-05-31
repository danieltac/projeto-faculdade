<?php

    require "../config.php";
    $id = '';
    $avp1 = '';
    $avp2 = '';
    $avf = '';
    $med = '';

    $error = '';
    $certo = '';

        //Função do botão "Voltar";
    if(isset($_POST['voltar'])){
        header("location: /projeto-faculdade/professor/index-professor.php");
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        // Se o usuário não existe, redirecionar página para o index.
        if (!isset($_GET["id"])){
            header("location: /projeto-faculdade/professor/index-professor.php");
            exit;
        }

        $id = $_GET["id"];
        //Leitura dos dados do cliente selecionado pelo ID no banco de dados.
        $sql = "SELECT * FROM aluno WHERE id=$id";
        $result = $conn->query($sql);
        
        $row = $result->fetch_assoc();


        if (!$row) {
            header("location: /projeto-faculdade/professor/index-professor.php");
            exit;
        }
        
        $id = $row["id"];
        $nome = $row["nome"];
        $avp1 = $row["avp1"];
        $avp2 = $row["avp2"];
        $avf = $row["avf"];
        $med = $row["med"];
    }
    else {
        $id = $_POST["id"];
        $avp1 = $_POST["avp1"];
        $avp2 = $_POST["avp2"];
        $med = ($avp1 + $avp2) / 2;

        if ($med < 7){
            $avf = "Sim";
        }
        else {
            $avf = "Não";
        }


        do {
            //Verificação se não há algum input vazio.
            if (empty($id)){
                $error = "É necessário preencher todos os campos!";
                break;
            }
            //Atualiza os dados recebidos no banco de dados
            $sql = "UPDATE aluno SET avp1 = $avp1, avp2 = $avp2, med = $med WHERE id = $id";

            $result = $conn->query($sql);
            //Verifica se a query executou corretamente e se tiver algum erro, ele será exibido na tela.
            if (!$result){
                $error = "Invalid query: " . $conn->error;
                break;
            }

            header("location: /projeto-faculdade/professor/index-professor.php");
            exit;

        } while (false);
    }

?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Faculdade</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container my-5">

            <?php echo "<h2>Editar nota do Aluno: $nome</h2>"?>


            <?php
                if (!empty($error)){
                    echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$error</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div
                    ";
                    header( "Refresh:3; url=edit.php?id=$id");
                }
            ?>


            <form action="" method="POST" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Avaliação 1</label>
                    <div class="col-sm-6">
                        <input type="number" name="avp1" class="form-control" placeholder="<?php echo "A nota atual é ". $avp1 ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Avaliação 2</label>
                    <div class="col-sm-6">
                        <input type="number" name="avp2" class="form-control" placeholder="<?php echo "A nota atual é ". $avp2 ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label"><?php echo 'Média = '.$med; ?></label>
                </div>

                <?php
                    if (!empty($certo)){
                        echo"
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>$certo</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                ?>


                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" name="salvar_aluno" class="btn btn-primary">Confirmar</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <button name="voltar" type="submit" class="btn btn-primary">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>