<?php

class ProdutoDAO {

    private PDO $conexao;

    public function __construct(PDO $conexao) {
        $this->conexao = $conexao;
    }

    /**
     * Inserir produto
     */
    public function inserir(Produto $produto): bool {
        $sql = "INSERT INTO produto (
                    nome_produto,
                    discriminacao_produto,
                    tipo_produto,
                    marca_produto,
                    validade_produto,
                    ca_produto,
                    ca_validade_produto,
                    data_registro_produto
                ) VALUES (
                    :nome,
                    :discriminacao,
                    :tipo,
                    :marca,
                    :validade,
                    :ca,
                    :ca_validade,
                    :data_registro
                )";

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ':nome'          => $produto->getNome(),
            ':discriminacao' => $produto->getDiscriminacao(),
            ':tipo'          => $produto->getTipo(),
            ':marca'         => $produto->getMarca(),
            ':validade'      => $produto->getValidade(),
            ':ca'            => $produto->getCa(),
            ':ca_validade'   => $produto->getCaValidade(),
            ':data_registro' => $produto->getDataRegistro()
        ]);
    }

    /**
     * Atualizar produto
     */
    public function atualizar(Produto $produto): bool {
        $sql = "UPDATE produto SET
                    nome_produto = :nome,
                    discriminacao_produto = :discriminacao,
                    tipo_produto = :tipo,
                    marca_produto = :marca,
                    validade_produto = :validade,
                    ca_produto = :ca,
                    ca_validade_produto = :ca_validade,
                    data_registro_produto = :data_registro
                WHERE id_produto = :id";

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ':nome'          => $produto->getNome(),
            ':discriminacao' => $produto->getDiscriminacao(),
            ':tipo'          => $produto->getTipo(),
            ':marca'         => $produto->getMarca(),
            ':validade'      => $produto->getValidade(),
            ':ca'            => $produto->getCa(),
            ':ca_validade'   => $produto->getCaValidade(),
            ':data_registro' => $produto->getDataRegistro(),
            ':id'            => $produto->getId()
        ]);
    }

    /**
     * Excluir produto
     */
    public function excluir(int $idProduto): bool {
        $sql = "DELETE FROM produto WHERE id_produto = :id";
        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ':id' => $idProduto
        ]);
    }

    /**
     * Buscar produto por ID
     */
    public function buscarPorId(int $idProduto): ?Produto {
        $sql = "SELECT * FROM produto WHERE id_produto = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id' => $idProduto]);

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }

        return new Produto(
            $dados['nome_produto'],
            $dados['discriminacao_produto'],
            $dados['tipo_produto'],
            $dados['marca_produto'],
            $dados['data_registro_produto'],
            $dados['validade_produto'],
            $dados['ca_produto'],
            $dados['ca_validade_produto'],
            $dados['id_produto']
        );
    }

    /**
     * Listar todos os produtos
     */
    public function listarTodos(): array {
        $sql = "SELECT * FROM produto ORDER BY nome_produto";
        $stmt = $this->conexao->query($sql);

        $produtos = [];

        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] = new Produto(
                $dados['nome_produto'],
                $dados['discriminacao_produto'],
                $dados['tipo_produto'],
                $dados['marca_produto'],
                $dados['data_registro_produto'],
                $dados['validade_produto'],
                $dados['ca_produto'],
                $dados['ca_validade_produto'],
                $dados['id_produto']
            );
        }

        return $produtos;
    }
}