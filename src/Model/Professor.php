<?php

namespace src\model;


class Professor{
    private string $nome;
    private string $curso;
    private string $turno;
    private string $tipo;


    public function __construct($nome, $curso, $turno, $tipo)
    {
        $this -> nome = $nome;
        $this -> curso = $curso;
        $this -> turno = $curso;
        $this -> tipo = $tipo;
    }


    public function getNome(){
        return $this->nome;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function getTurno(){
        return $this->turno;
    }

    public function getTipo(){
        return $this->tipo;
    }
}