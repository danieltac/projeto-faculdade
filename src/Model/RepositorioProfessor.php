<?php
require "Professor.php";

class RepositorioProfessor{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }


    public function createProfessor(Professor $prof){
        $sql = "INSERT INTO professor (nome, curso, turno, tipo) VALUES ('{$prof->getNome()}', '{$prof->getNome()}', '{$prof->getNome()}', '{$prof->getNome()}')";
        $query = $this->conexao->query($sql);

        return $query;
    }
}