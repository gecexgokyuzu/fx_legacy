<?php

$config = [
    'name' => 'fx_legacy',
    'host' => 'localhost',
    'user' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];

try {
    $db = new PDO(
        'mysql:host=' . $config['host'] . ';dbname=' . $config['name'] . ';charset=' . $config['charset'],
        $config['user'],
        $config['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    die('Veritabanı bağlantısında hata meydana geldi');
}