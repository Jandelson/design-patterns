<?php

namespace Jandelson\Builder;

use Jandelson\Builder\Builder\SqlQueryBuilder;
use Jandelson\Builder\Enuns\QueryTypes;

class MysqlQueryBuilder implements SqlQueryBuilder
{
    protected $query;
    protected function reset(): void
    {
        $this->query = new \stdClass();
    }
	/**
	 * @param string $table
	 * @param array $fields
	 * @return SqlQueryBuilder
	 */
	public function select(string $table, array $fields): SqlQueryBuilder 
    {
        $this->reset();
        $this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        $this->query->type = 'select';

        return $this;
	}
	
	/**
	 *
	 * @param string $field
	 * @param string $value
	 * @param string $operator
	 * @return SqlQueryBuilder
	 */
	public function where(string $field, string $value, string $operator = "="): SqlQueryBuilder 
    {
        if (!in_array($this->query->type, QueryTypes::getAllValues())) {
            throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }
        $this->query->where[] = "$field $operator '$value'";

        return $this;
	}
	
	/**
	 *
	 * @param int $start
	 * @param int $offset
	 * @return SqlQueryBuilder
	 */
	public function limit(int $start, int $offset): SqlQueryBuilder 
    {
        if (!in_array($this->query->type, [QueryTypes::SELECT->value])) {
            throw new \Exception("LIMIT can only be added to SELECT");
        }
        $this->query->limit = " LIMIT " . $start . ", " . $offset;

        return $this;
	}
	
	/**
	 * @return string
	 */
	public function getSQL(): string 
    {
        $query = $this->query;
        $sql = $query->base;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        if (isset($query->limit)) {
            $sql .= $query->limit;
        }
        $sql .= ";";
        return $sql;
	}
}