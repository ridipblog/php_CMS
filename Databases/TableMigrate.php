<?php

namespace Databases;
// require_once __DIR__ .'/../Config/Database.php';


use Config\Database as Database;
use PDOException;
use Databases\QueryMigrate;


class TableMigrate extends QueryMigrate
{
    protected $generate_query;
    private $table_name;
    public function __construct()
    {
        parent::__construct();
    }
    public function table($table)
    {
        $this->generate_query = 'CREATE TABLE ' . $table;
        $this->table_name = $table;
        return $this;
    }
    public function executeQuery($query)
    {
        $query = $this->generate_query . ' (' . implode(', ', $query).')';
        if ($this->pdo) {
            try {
                $this->pdo->exec($query);
                echo "Table ".$this->table_name." created successfully";
            } catch (PDOException $e) {
                echo "Error creating table: " . $e->getMessage();
                exit(1);
            }
        } else {
            echo "No database connection.";
        }
    }
}