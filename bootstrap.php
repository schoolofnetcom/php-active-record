<?php

require __DIR__ . '/vendor/autoload.php';

use ErikFig\ActiveRecordOrm\Drivers\MySql;
use App\Models\Users;

$mysql = new MySql();
$mysql->connect([
    'server' => 'localhost',
    'database' => 'php_active_record',
    'user' => 'root',
]);

$user = new Users($mysql);
$user->first(1);

var_dump($user->name);