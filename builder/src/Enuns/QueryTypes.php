<?php

namespace Jandelson\Builder\Enuns;
enum QueryTypes: string
{
    case SELECT = 'select';
    case UPDATE = 'update';
    case DELETE = 'delete';

    public static function getAllValues(): array
    {
        return array_column(QueryTypes::cases(), 'value');
    }
}