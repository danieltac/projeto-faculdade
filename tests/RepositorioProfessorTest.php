<?php
namespace tests;
use PHPUnit\Framework\TestCase;
use src\Model\Professor;
use src\Model\RepositorioProfessor;

class RepositorioProfessorTest extends TestCase{
    public function test_create(){
        $Professor = new Professor("nome", "curso", "turno",1);
        $repositorio = new RepositorioProfessor('$conn');


        $this->assertEmpty($repositorio->createProfessor($Professor));
    }
    
    public function test_get_professor(){
        $Professor = new Professor("nome", "curso", "turno",1);
        $repositorio = new RepositorioProfessor('$conn');


        $this->assertEmpty($repositorio->getProfessor(1));
    }
}