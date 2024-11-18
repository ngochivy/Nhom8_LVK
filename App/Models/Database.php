<?php

namespace App\Models;

use mysqli;
use PDO;
use PDOException;

class Database
{
    private $_host;
    private $_username;
    private $_password;
    private $_database;

    public function __construct()
    {
        if (!isset($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME'])) {
            die("Environment variables for database connection are not set.");
        }

        $this->_host = $_ENV['DB_HOST'];
        $this->_username = $_ENV['DB_USERNAME'];
        $this->_password = $_ENV['DB_PASSWORD'];
        $this->_database = $_ENV['DB_NAME'];
    }

    public function Pdo()
    {
        try {
            $conn = new PDO(
                "mysql:host={$this->_host};dbname={$this->_database}",
                $this->_username,
                $this->_password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            error_log("PDO Connection failed: " . $e->getMessage());
            throw new \Exception("Failed to connect to database.");
        }
    }

    public function MySQLi()
    {
        $conn = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

        if ($conn->connect_error) {
            error_log("MySQLi Connection failed: " . $conn->connect_error);
            throw new \Exception("Failed to connect to database.");
        }

        return $conn;
    }
}
