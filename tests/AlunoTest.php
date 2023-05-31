<?php
namespace tests;
use PHPUnit\Framework\TestCase;
use src\Model\Aluno;

class AlunoTest extends TestCase{
    public function test_return_nome(){
        $aluno = new Aluno(1, "nome", "curso", "turno");
        $this->assertEquals($aluno->getNome(), "nome");
    }
    
    public function test_return_curso(){
        $aluno = new Aluno(1, "nome", "curso", "turno");
        $this->assertEquals($aluno->getCurso(), "curso");
    }
    
    public function test_return_turno(){
        $aluno = new Aluno(1, "nome", "curso", "turno");
        $this->assertEquals($aluno->getTurno(), "turno");
    }
}