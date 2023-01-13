<?php

use Jandelson\Builder\Builder\SqlQueryBuilder;
use Jandelson\Builder\MysqlQueryBuilder;
use Jandelson\Builder\PostgresQueryBuilder;

require_once __DIR__ . '/vendor/autoload.php';
function clientCode(SqlQueryBuilder $queryBuilder)
{
    $query = $queryBuilder
        ->select("users", ["name", "email", "password"])
        ->where("age", 18, ">")
        ->where("age", 30, "<")
        ->limit(01, 20)
        ->getSQL();

    echo $query;
}

echo "Testing MySQL query builder:\n";
clientCode(new MysqlQueryBuilder());
echo PHP_EOL;
clientCode(new PostgresQueryBuilder());
echo PHP_EOL;