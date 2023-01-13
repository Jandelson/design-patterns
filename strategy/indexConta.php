<?php

require_once __DIR__ . '/Conta.php';
require_once __DIR__ . '/ContaCorrente.php';
require_once __DIR__ . '/ContaPaupanca.php';

$contaP = new ContaPoupanca(
    '0001',
    '1234',
    'Jandelson',
    100
);

$contaC = new ContaCorrente(
    '0001',
    '12345',
    'Joao',
    920
);


var_dump($contaP);
$contaP->sacar(10);
$contaP->depositar(10);
$contaP->saldo();