<?php
namespace tests;
use PHPUnit\Framework\TestCase;
use src\Model\Professor;

class ProfessorTest extends TestCase{
    public function test_return_nome(){
        $Professor = new Professor("nome", "curso", "turno",1);
        $this->assertEquals($Professor->getNome(), "nome");
    }
    
    public function test_return_curso(){
        $Professor = new Professor("nome", "curso", "turno",1);
        $this->assertEquals($Professor->getCurso(), "curso");
    }
    
    public function test_return_turno(){
        $Professor = new Professor("nome", "curso", "turno",1);
        $this->assertEquals($Professor->getTurno(), "turno");
    }
}