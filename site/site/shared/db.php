<?php

require_once 'vendor/autoload.php';

use crojasaragonez\UtnDb\PgConnection;

$con = new PgConnection('postgres', 'edson2018', 'isw', 5432, 'localhost');
$con->connect();
/*
$sql = "INSERT INTO users(email, password) VALUES ($1, md5($2))";
$con->runStatement($sql, ['estudiante@est.utn.ac.cr', '12345']);

$results = $con->runQuery('SELECT * FROM users WHERE id >= $1', [1]);

var_dump($results);

$con->disconnect();
*/