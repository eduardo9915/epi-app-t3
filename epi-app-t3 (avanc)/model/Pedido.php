<?php
require_once __DIR__ . "./Usuario.php"
class Pedido {
    private int $idPedido;
    private string $dataHora;
    private string $status;
    private string $tipo;
    private Usuario $solicitanteId;
    private ?string $observacao;
    private ?string $dataRetirada;
    private ?string $dataDevolucao;

    public function __construct(
        string $dataHora,
        string $status,
        string $tipo,
        int $solicitanteId,
        ?string $observacao = null,
        ?string $dataRetirada = null,
        ?string $dataDevolucao = null,
        int $idPedido = 0
    ) {
        $this->idPedido = $idPedido;
        $this->dataHora = $dataHora;
        $this->status = $status;
        $this->tipo = $tipo;
        $this->solicitanteId = $solicitanteId;
        $this->observacao = $observacao;
        $this->dataRetirada = $dataRetirada;
        $this->dataDevolucao = $dataDevolucao;
    }

    public function getId(): int {
        return $this->idPedido;
    }

    /**
     * Get the value of dataHora
     */ 
    public function getDataHora()
    {
        return $this->dataHora;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Get the value of solicitanteId
     */ 
    public function getSolicitanteId()
    {
        return $this->solicitanteId;
    }

    /**
     * Get the value of observacao
     */ 
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Get the value of dataRetirada
     */ 
    public function getDataRetirada()
    {
        return $this->dataRetirada;
    }

    /**
     * Get the value of dataDevolucao
     */ 
    public function getDataDevolucao()
    {
        return $this->dataDevolucao;
    }
}