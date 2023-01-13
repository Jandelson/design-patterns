<?php

require_once __DIR__ . '/ContaBancariaInterface.php';
require_once __DIR__ . '/Conta.php';

class ContaCorrente extends Conta implements ContaBancariaInterface
{
    public $juros = 0.03;

    public function __construct($agencia, $numeroConta, $cliente, $saldo)
    {
        $this->agencia = $agencia;
        $this->numeroConta = $numeroConta;
        $this->cliente = $cliente;
        $this->saldo = $saldo;
    }

    public function depositar(float $valor)
    {
        $this->saldo += $valor;
    }


    public function sacar(float $valor)
    {
        $calculaJuros = $valor * $this->juros;
        if ($this->saldo < $valor) {
            throw new DomainException('Saldo menor que o valor do saque!');
        }
        return $this->saldo -= $valor + $calculaJuros;
    }

    public function saldo()
    {
        echo "Valor do saldo: " . $this->saldo . PHP_EOL;
    }
}