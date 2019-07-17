<?php
$config = include __DIR__ . '/../database/config.php';

use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;

return new QueryBuilder(
	Connection::make($config['database'])
);
