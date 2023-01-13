<?php

interface ContaBancariaInterface
{
    public function depositar(float $valor);
    public function sacar(float $valor);
    public function saldo();
}