<?php

    require "../config.php";

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

    $sql_aluno = "SELECT * FROM aluno WHERE nome = '$user' AND id = '$pass'";
    $sql_prof = "SELECT * FROM professor WHERE nome = '$user' AND id = '$pass'";



    $result_a = mysqli_query($conn, $sql_aluno);
    $result_p = mysqli_query($conn, $sql_prof);

    if (mysqli_num_rows($result_a) === 1){
        $row = mysqli_fetch_assoc($result_a);
        if($row['nome'] === $user && $row['id'] === $pass){
            echo "Login efetuado com sucesso!";
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['id'] = $row['id'];
            header("location: /projeto-faculdade/aluno/index-aluno.php");
            exit;
        }
        
    }
    elseif (mysqli_num_rows($result_p) === 1){  
        echo "Login efetuado com sucesso!";
        
        $_SESSION['nome'] = $user;
        $_SESSION['id'] = $pass;
        
        header("location: /projeto-faculdade/professor/index-professor.php");
        
            exit;
    }
    else {
        header("location: /projeto-faculdade/index.php");
        exit;
    }