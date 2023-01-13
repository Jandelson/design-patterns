<?php

namespace Jandelson\Builder;

use Jandelson\Builder\Builder\SqlQueryBuilder;

class PostgresQueryBuilder extends MysqlQueryBuilder
{
        public function limit(int $start, int $offset): SqlQueryBuilder
    {
        parent::limit($start, $offset);

        $this->query->limit = " LIMIT " . $start . " OFFSET " . $offset;

        return $this;
    }
}