<?php

namespace ErikFig\ActiveRecordOrm\QueryBuilder;

class Select implements QueryBuilderInterface
{
    private $query;
    private $values = [];

    public function __construct(string $table)
    {
        $sql = sprintf('SELECT * FROM %s', $table);
        $this->query = $sql;
    }

    public function getValues() :array
    {
        return $this->values;
    }

    public function __toString()
    {
        return $this->query;
    }

}
