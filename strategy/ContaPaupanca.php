<?php

require_once __DIR__ . '/ContaBancariaInterface.php';
require_once __DIR__ . '/Conta.php';

class ContaPoupanca extends Conta implements ContaBancariaInterface
{
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
        if ($this->saldo < $valor) {
            throw new DomainException('Saldo menor que o valor do saque!');
        }
        return $this->saldo -= $valor;
    }

    public function saldo()
    {
        echo "Valor do saldo: " . $this->saldo . PHP_EOL;
    }

    public function __call($name, $arguments)
    {
        echo "Method: $name not exists in here!";
        echo "arguments not found: " . var_dump($arguments);
    }
}