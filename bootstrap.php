<?php

require __DIR__ . '/vendor/autoload.php';

use ErikFig\ActiveRecordOrm\Drivers\MySql;
use ErikFig\ActiveRecordOrm\QueryBuilder\Select;
use ErikFig\ActiveRecordOrm\Models\Model;

$mysql = new MySql();
$mysql->connect([
    'server' => 'localhost',
    'database' => 'php_active_record',
    'user' => 'root',
]);

$query = new Select('users'); 
$data = $mysql->setQueryBuilder($query)
    ->execute()
    ->all();

var_dump($data);
