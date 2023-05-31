<?php

    require_once "../config.php";
    require_once "../src/Model/Aluno.php";
    require_once "../src/Model/RepositorioAluno.php";

    $nome = '';
    $curso = '';
    $turno = '';
    $error = '';
    $certo = '';


    if(isset($_POST['salvar_aluno'])){
        $nome = $_POST['nome'];
        $curso = $_POST['curso'];
        $turno = $_POST['turno'];
        $tipo = 0;
        $avp1 = "Sem nota";
        $avp2 = "Sem nota";
        $med = 0;

        do {
            //Se algum dos campos estiver vazio, exibir mensagem de erro no HTML(L-70) e recarregar pag.
            if (empty($nome) || $curso == "null" || $turno == "null"){
                $error = "É necessário preencher todos os campos!";
                break;
            }

            $aluno = new Aluno(NULL, $nome, $curso, $turno);
            $repositorioAluno->salvarAluno($aluno);
            

            header("location: /projeto-faculdade/index-adm.php");
            exit;

        } while (false);

        
    }
    //Função do botão "Voltar";
    if(isset($_POST['voltar'])){
        header("location: /faculdade/index-adm.php");
        exit;
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
            <h2>Novo Aluno</h2>


            <?php
                if (!empty($error)){
                    echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$error</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div
                    ";
                    header( "Refresh:3; url=create-aluno.php");
                }
            ?>


            <form action="" method="POST" autocomplete="off">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nome</label>
                    <div class="col-sm-6">
                        <input type="text" name="nome" class="form-control" value="<?php echo $nome ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Curso</label>
                    <div class="col-sm-6">
                        <select name="curso" id="" class="form-control">
                            <option value="null">Selecione o Curso</option>
                            <option value="Análise e Desenvolvimento de Sistemas">Análise e Desenvolvimento de Sistemas</option>
                            <option value="Sistemas de Informações">Sistemas de Informações</option>
                            <option value="Engenharia">Engenharia</option>
                            <option value="Matemática">Matemática</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Turno</label>
                    <div class="col-sm-6">
                        <select name="turno" id="" class="form-control">
                            <option value="null">Selecione o Turno</option>
                            <option value="Manhã">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                        </select>
                    </div>
                </div>


                <?php
                /*
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
                */
                ?>


                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" name="salvar_aluno" class="btn btn-primary">Cadastrar</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <button name="voltar" type="submit" class="btn btn-primary">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>