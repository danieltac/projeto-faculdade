<?php
    namespace src\Model;

    require_once "Aluno.php";
    use src\model\Aluno;
    use mysqli;

    class RepositorioAluno{

        private mysqli $conexao;

        public function __construct(mysqli $conexao)
        {
            $this->conexao = $conexao;
        }

        public function todosAlunos(){
            $listaAlunos = [];
            $sqlConsult = "SELECT * FROM aluno";
            $result = $this->conexao->query($sqlConsult);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $listaAlunos[] = $row;
                }
            }

            return $listaAlunos;

        }

        public function createAluno(Aluno $aluno){
            $sqlInsert = "INSERT INTO aluno (nome, curso, turno, avp1, avp2, med) VALUES ('{$aluno->getNome()}', '{$aluno->getCurso()}', '{$aluno->getTurno()}', '{$aluno->getAvp1()}', '{$aluno->getAvp2()}', '{$aluno->getMed()}')";
            $sucesso = $this->conexao->query($sqlInsert);

            if($sucesso){
                $aluno->setId($this->conexao->insert_id);
            }

            return $sucesso;
        }

        public function readAluno($nome, $id){
            if($id !== null){
                $sqlConsult = "SELECT * FROM aluno WHERE nome = '$nome' AND id = $id";
                $result = $this->conexao->query($sqlConsult);
                if($result->num_rows === 1){
                    $dados = $result->fetch_assoc();
                }
                else{
                    return false;
                }
                return $dados;
            }
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
