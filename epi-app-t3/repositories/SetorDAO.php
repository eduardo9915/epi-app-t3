<?php
require_once __DIR__ . "/../utils/Conexao.php";
class SetorDAO extends Conexao {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = $this::pegarConexao();
    }

    /**
     * Inserir um novo setor
     */
    public function inserir(Setor $model): bool {
        try {
            $sql = "INSERT INTO setor (nome_setor) VALUES (:nome)";
            $stmt = $this->conexao->prepare($sql);
            
            $stmt->bindValue(":nome", $model->getNome(), PDO::PARAM_STR);
    
            return $stmt->execute();

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * Atualizar um setor existente
     */
    public function atualizar(Setor $setor): bool {
        try {
            $sql = "UPDATE setor SET nome_setor = :nome WHERE id_setor = :id";
            $stmt = $this->conexao->prepare($sql);
    
            return $stmt->execute([
                ':nome' => $setor->getNome(),
                ':id'   => $setor->getId()
            ]);
        } catch (Exception $e){

        }
    }

    /**
     * Excluir um setor
     */
    public function excluir(int $idSetor): bool {
        $sql = "DELETE FROM setor WHERE id_setor = :id";
        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ':id' => $idSetor
        ]);
    }

    /**
     * Buscar setor pelo ID
     */
    public function buscarPorId(int $idSetor): ?Setor {
        $sql = "SELECT * FROM setor WHERE id_setor = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id' => $idSetor]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }

        return new Setor(
            $dados['nome_setor'],
            $dados['id_setor']
        );
    }

    /**
     * Listar todos os setores
     */
    public function listarTodos(): array {
        try {
            $sql = "SELECT * FROM setor ORDER BY nome_setor";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $resposta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reposta;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }

        
    }
}