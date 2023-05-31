<?php


    class Aluno{

        private ?int $id;
        private string $nome;
        private string $curso;
        private string $turno;
        private int $tipo;
        private string $avp1;
        private string $avp2;
        private string $avf;
        private string $med;
        private mysqli $conexao;

        public function __construct(string $nome, string $curso, string $turno, mysqli $conexao)
        {
            $this->nome = $nome;
            $this->curso = $curso;
            $this->turno = $turno;
            $this->tipo = 0;
            $this->avp1 = "Sem Nota";
            $this->avp2 = "Sem Nota";
            $this->med = 0;
            $this->conexao = $conexao;
        }

        public function getId(){
            return $this->id;
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

        public function getAvp1(){
            return  $this->avp1;
        }

        public function getAvp2(){
            return $this->avp2;
        }

        public function getAvf(){
            return $this->avf;
        }

        public function getMed(){
            return $this->med;
        }

        public function setId(?int $id){
            $this->id = $id;
        }

        public function setNome(string $nome){
            $this->nome = $nome;
        }

        public function setCurso(string $curso){
            $this->curso = $curso;
        }

        public function setTurno(string $turno){
            $this->turno = $turno;
        }

        public function setTipo(int $tipo){
            $this->tipo = $tipo;
        }

        public function setAvp1(string $avp1){
            $this->avp1 = $avp1;
        }

        public function setAvp2(string $avp2){
            $this->avp1 = $avp2;
        }

        public function setAvf(string $avf){
            $this->avf = $avf;
        }

        public function setMed(string $med){
            $this->med = $med;
        }

        public function createAluno(){
            $sqlInsert = "INSERT INTO aluno (nome, curso, turno, avp1, avp2, med) VALUES ('{$this->getNome()}', '{$this->getCurso()}', '{$this->getTurno()}', '{$this->getAvp1()}', '{$this->getAvp2()}', '{$this->getMed()}')";
            $sucesso = $this->conexao->query($sqlInsert);

            echo $sucesso;
        }
    }