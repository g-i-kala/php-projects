<?php

class Database {
    private $host = "localhost";
    private $dbname = "todolist";
    private $username = "root";
    private $password = "kupadupa27Mysql!";
    private $charset = 'utf8mb4';
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname. ";" . $this->charset, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
        } catch (PDOException $e) {
            echo "Connection failed. Error: " . $e->getMessage();
            error_log($e->getMessage());
            http_response_code(500);
            exit;
        }
        return $this->conn;
    }
}

