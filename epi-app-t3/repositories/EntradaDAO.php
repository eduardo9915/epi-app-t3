<?php

class EntradaDAO {

    private PDO $conexao;

    public function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }

    /**
     * Inserir entrada
     */
    public function inserir(Entrada $entrada): bool {
        $sql = "INSERT INTO entrada (
                    data_hora_entrada,
                    tipo_entrada,
                    observacao_entrada
                ) VALUES (
                    :data_hora,
                    :tipo,
                    :observacao
                )";

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ':data_hora'  => $entrada->getDataHora(),
            ':tipo'       => $entrada->getTipo(),
            ':observacao' => $entrada->getObservacao()
        ]);
    }

    /**
     * Atualizar entrada
     */
    public function atualizar(Entrada $entrada): bool {
        $sql = "UPDATE entrada SET
                    data_hora_entrada = :data_hora,
                    tipo_entrada = :tipo,
                    observacao_entrada = :observacao
                WHERE id_entrada = :id";

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ':data_hora'  => $entrada->getDataHora(),
            ':tipo'       => $entrada->getTipo(),
            ':observacao' => $entrada->getObservacao(),
            ':id'         => $entrada->getId()
        ]);
    }

    /**
     * Excluir entrada
     */
    public function excluir(int $idEntrada): bool {
        $sql = "DELETE FROM entrada WHERE id_entrada = :id";
        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ':id' => $idEntrada
        ]);
    }

    /**
     * Buscar entrada por ID
     */
    public function buscarPorId(int $idEntrada): ?Entrada {
        $sql = "SELECT * FROM entrada WHERE id_entrada = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id' => $idEntrada]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }

        return new Entrada(
            $dados['data_hora_entrada'],
            $dados['tipo_entrada'],
            $dados['observacao_entrada'],
            $dados['id_entrada']
        );
    }

    /**
     * Listar todas as entradas
     */
    public function listarTodos(): array {
        $sql = "SELECT * FROM entrada ORDER BY data_hora_entrada DESC";
        $stmt = $this->conexao->query($sql);

        $entradas = [];

        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $entradas[] = new Entrada(
                $dados['data_hora_entrada'],
                $dados['tipo_entrada'],
                $dados['observacao_entrada'],
                $dados['id_entrada']
            );
        }

        return $entradas;
    }
}