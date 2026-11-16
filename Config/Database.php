<?php

$host = 'localhost';
$bd   = 'booshelf_db';
$user = 'root';
$pass = '';

$pdo =new PDO("mysql:host=$host;dbname=$bd;charset=utf8mb4", $user, $pass);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);