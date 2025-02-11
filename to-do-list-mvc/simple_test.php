<?php
try {
    $dsn = "mysql:host=127.0.0.1;dbname=todolist;charset=utf8mb4";
    $user = "root";
    $pass = "kupadupa27Mysql!";

    $pdo = new PDO($dsn, $user, $pass);
    echo "Database connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
