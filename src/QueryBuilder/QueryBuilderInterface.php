<?php

namespace ErikFig\ActiveRecordOrm\QueryBuilder;

interface QueryBuilderInterface
{
    public function getValues() :array;
    public function __toString();
}
