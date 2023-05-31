<?php
    require "Aluno.php";

    class RepositorioAluno{

        private $conexao;

        public function __construct($conexao)
        {
            $this->conexao = $conexao;
        }

        public function createAluno(Aluno $aluno){
            $sqlInsert = "INSERT INTO aluno (nome, curso, turno, avp1, avp2, med) VALUES ('{$aluno->getNome()}', '{$aluno->getCurso()}', '{$aluno->getTurno()}', '{$aluno->getAvp1()}', '{$aluno->getAvp2()}', '{$aluno->getMed()}')";
            $sucesso = $this->conexao->query($sqlInsert);

            if($sucesso){
                $aluno->setId($this->conexao->insert_id);
            }

            return $sucesso;
        }
    }