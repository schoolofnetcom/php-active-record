<?php

namespace ErikFig\ActiveRecordOrm\Drivers;

use ErikFig\ActiveRecordOrm\QueryBuilder\QueryBuilderInterface;

class Mysql implements DriverInterface
{
    protected $pdo;
    protected $sth;
    protected $query;

    public function connect(array $config)
    {
        if (empty($config['server'])) {
            throw new \InvalidArgumentException('server is required');
        }

        if (empty($config['database'])) {
            throw new \InvalidArgumentException('database is required');
        }
        
        if (empty($config['user'])) {
            throw new \InvalidArgumentException('user is required');
        }

        $dsn = sprintf('mysql:host=%s;dbname=%s', $config['server'], $config['database']);
        $user = $config['user'];
        $password = $config['password'] ?? null;
        $options = $config['options'] ?? [];

        $this->pdo = new \PDO($dsn, $user, $password, $options);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function close()
    {
        $this->pdo = null;
    }

    public function setQueryBuilder(QueryBuilderInterface $query)
    {
        $this->query = $query;
        return $this;
    }

    public function execute()
    {
        $this->sth = $this->pdo->prepare((string)$this->query);
        $this->sth->execute();
        return $this;
    }

    public function lasInsertedId()
    {

    }

    public function first()
    {
        return $this->sth->fetch(\PDO::FETCH_ASSOC);
    }

    public function all()
    {
        return $this->sth->fetchAll(\PDO::FETCH_ASSOC);
    }

}
