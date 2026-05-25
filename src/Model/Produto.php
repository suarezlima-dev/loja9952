<?php

namespace App\Model;

class Produto
{
    private string $nome;
    private float $preco;
    private int $quantidade;

    public function __construct(string $nome, float $preco, int $quantidade)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function descricao(): string
    {
        return "Produto: {$this->nome} | Preco: {$this->preco} | Quantidade: {$this->quantidade}";
    }
}
