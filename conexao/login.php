<?php

    require "../config.php";
    use src\Model\RepositorioAluno;

    session_start();

    if (isset($_POST['nome']) && isset($_POST['id'])){

        function validate ($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    }

    $user = validate($_POST['nome']);
    $pass = validate($_POST['id']);

    $dadosAluno = $repositorioAluno->readAluno($user, $pass);
    $sql_prof = "SELECT * FROM professor WHERE nome = '$user' AND id = '$pass'";

    $result_p = mysqli_query($conn, $sql_prof);

    if ($dadosAluno != false){
        echo "Login efetuado com sucesso!";
        $_SESSION['nome'] = $dadosAluno['nome'];
        $_SESSION['id'] = $dadosAluno['id'];
        header("location: /projeto-faculdade/aluno/index-aluno.php");
        exit;
    }

    elseif (mysqli_num_rows($result_p) === 1){
        $row = mysqli_fetch_assoc($result_p);
        if($row['nome'] === $user && $row['id'] === $pass){
            echo "Login efetuado com sucesso!";
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['id'] = $row['id'];
            header("location: /projeto-faculdade/professor/index-professor.php");
            exit;
        }
    }
    else {
        header("location: /projeto-faculdade/index.php");
        exit;
    }