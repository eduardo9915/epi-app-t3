<?php
require_once __DIR__ . "./Produto.php"
class Estoque {
    private int $idEstoque;
    private int $produtoId;
    private int $quantidade;
    private string $dataEntrada;
    private ?string $dataSaida;

    public function __construct(
        int $produtoId,
        int $quantidade,
        string $dataEntrada,
        ?string $dataSaida = null,
        int $idEstoque = 0
    ) {
        $this->idEstoque = $idEstoque;
        $this->produtoId = $produtoId;
        $this->quantidade = $quantidade;
        $this->dataEntrada = $dataEntrada;
        $this->dataSaida = $dataSaida;
    }

    public function getId(): int {
        return $this->idEstoque;
    }

    public function getProdutoId(): int {
        return $this->produtoId;
    }

    public function getQuantidade(): int {
        return $this->quantidade;
    }

    public function getDataEntrada(): string {
        return $this->dataEntrada;
    }

    public function getDataSaida(): ?string {
        return $this->dataSaida;
    }
}