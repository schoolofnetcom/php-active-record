<?php

namespace ErikFig\ActiveRecordOrm\QueryBuilder;

class Select implements QueryBuilderInterface
{
    use Filters\Where;

    private $query;
    private $values = [];

    public function __construct(string $table, array $conditions = [])
    {
        $this->query = $this->makeSql($table, $conditions);
    }

    private function makeSql($table, $conditions)
    {
        $sql = sprintf('SELECT * FROM %s', $table);

        if ($conditions) {
            $sql .= $this->makeWhere($conditions);
        }
        return $sql;
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
