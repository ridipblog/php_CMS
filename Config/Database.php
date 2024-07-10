<?php

namespace Config;
use Exception;
use PDO;
use PDOException;
class Database
{
    private $host = 'localhost';
    private $db_name = 'php_cms';
    private $username = 'root';
    private $password = '';
    public $pdo;
    private $options;
    public function __construct()
    {
        $this->pdo = null;
        $this->options=[
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC
        ];
        try {

            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password,$this->options);
            echo "Connection Successfully";
            
        } catch (PDOException $err) {
            echo "Connection error {$err->getMessage()}";
            exit();
        }
    }
}
// new Database();