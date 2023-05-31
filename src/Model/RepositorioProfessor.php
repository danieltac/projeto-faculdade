<?php
require "Professor.php";

class RepositorioProfessor{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }


    public function createProfessor(Professor $prof){
        $sql = "INSERT INTO professor (nome, curso, turno, tipo) VALUES ('{$prof->getNome()}', '{$prof->getCurso()}', '{$prof->getTurno()}', '{$prof->getTipo()}')";
        $query = $this->conexao->query($sql);

        return $query;
    }

    public function getProfessor($id){
        $sql = "SELECT * FROM professor WHERE id = $id";
        $sql_query = $this->conexao->query($sql);

        $row = $sql_query->fetch_assoc();

        $professor = new Professor(
            $row['nome'],
            $row['curso'],
            $row['turno'],
            1
        );

        return $professor;
    }

    public function deleteProfessor($id){
        $sql = "DELETE FROM professor WHERE id=$id";
        $this->conexao->query($sql);
    }


    public function editarProfessor(Professor $prof,$id){
        //Atualiza os dados recebidos no banco de dados
        $sql = "UPDATE professor " . "SET nome = '{$prof->getNome()}', curso = '{$prof->getCurso()}', turno = '{$prof->getTurno()}' WHERE id = '$id'";

        $this->conexao->query($sql);

        header("location: /projeto-faculdade/index-adm.php");
        exit;
    }
}