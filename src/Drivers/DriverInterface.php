<?php

namespace ErikFig\ActiveRecordOrm\Drivers;

use ErikFig\ActiveRecordOrm\QueryBuilder\QueryBuilderInterface;

interface DriverInterface
{
    public function connect(array $config);
    public function close();
    public function setQueryBuilder(QueryBuilderInterface $query);
    public function execute();
    public function lasInsertedId();
    public function first();
    public function all();
}
