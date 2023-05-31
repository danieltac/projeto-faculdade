<?php

    require_once "Aluno.php";

    class RepositorioAluno{

        private mysqli $conexao;

        public function __construct(mysqli $conexao)
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

        public function deleteAlunoId(int $id){
            $sqlDelete = "DELETE FROM aluno WHERE id = $id";
            $sucesso = $this->conexao->query($sqlDelete);

            return $sucesso;
        }

        public function updateAluno(Aluno $aluno){
            $sqlUpdate = "UPDATE aluno " . "SET nome = '{$aluno->getNome()}', curso = '{$aluno->getCurso()}', turno = '{$aluno->getTurno()}' " . "WHERE id = '{$aluno->getId()}'";
            $sucesso  = $this->conexao->query($sqlUpdate);

            return $sucesso;
        }

        public function salvarAluno(Aluno $aluno){
            if($aluno->getId() === null){
                return $this->createAluno($aluno);
            }
            else{
                return $this->updateAluno($aluno);
            }
        }
    }