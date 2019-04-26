<?php

namespace ErikFig\ActiveRecordOrm\Models;

use ErikFig\ActiveRecordOrm\QueryBuilder\Select;
use ErikFig\ActiveRecordOrm\Drivers\DriverInterface;

trait RepositoryTrait
{
    protected $driver;

    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function getTable() :string
    {
        if (!empty($this->table)) {
            return $this->table;
        }

        $table = get_class($this);
        $table = explode('\\', $table);
        $table = array_pop($table);

        return strtolower($table);
    }

    public function first($id = null)
    {
        $conditions = [];

        if ($id != null) {
            $conditions[] = ['id', $id];
        }

        $query = new Select($this->getTable(), $conditions); 
        $data = $this->driver->setQueryBuilder($query)
            ->execute()
            ->first();
        
        $this->setAll($data);
    }
}