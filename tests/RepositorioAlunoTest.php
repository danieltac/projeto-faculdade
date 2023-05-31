<?php
namespace tests;
use PHPUnit\Framework\TestCase;
use src\Model\Aluno;
use src\Model\Professor;
use src\Model\RepositorioAluno;


class RepositorioAlunoTest extends TestCase{
    public function test_todos_alunos(){
        $Repositorio = new RepositorioAluno('$conn');
        $this->assertEmpty($Repositorio->todosAlunos());
    }
    
    public function test_createAluno(){
        $Repositorio = new RepositorioAluno('$conn');
        $Aluno = new Aluno(1, "nome", "curso", "turno");

        $this->assertEmpty($Repositorio->createAluno($Aluno));
    }
    
    public function test_readAluno(){
        $Aluno = new Aluno(1, "nome", "curso", "turno");
        $Repositorio = new RepositorioAluno('$conn');
        $this->assertEmpty($Repositorio->readAluno($Aluno->getNome(), $Aluno->getId()));
    }

    public function test_deleteAluno(){
        $Aluno = new Aluno(1, "nome", "curso", "turno");
        $Repositorio = new RepositorioAluno('$conn');
        $this->assertEmpty($Repositorio->deleteAlunoId($Aluno->getId()));
    }

    public function test_updateAluno(){
        $Aluno = new Aluno(1, "nome", "curso", "turno");
        $Repositorio = new RepositorioAluno('$conn');

        $this->assertEmpty($Repositorio->updateAluno($Aluno));
    }
}