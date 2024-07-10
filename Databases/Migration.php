<?php

// namespace Databases;
// require_once __DIR__ .'/../Config/Database.php';


// use Config\Database as Database;
// use PDOException;

// class QueryMigrate extends Database
// {
//     protected $migration_query;
//     public function __construct()
//     {
//         parent::__construct();
//     }
//     public function DBid(){
//         $this->migration_query='id INT AUTO_INCREMENT PRIMARY KEY';
//         return $this;
//     }
//     public function DBstring($name)
//     {
//         $this->migration_query = $name . ' VARCHAR(255) NOT NULL';
//         return $this;
//     }
//     public function DBNull()
//     {
//         $this->migration_query .= " NULL";
//         return $this;
//     }
//     public function DBDefault($value)
//     {
//         $this->migration_query .= 'default ' . $value;
//         return $this;
//     }
//     public function DBUnique()
//     {
//         $this->migration_query .= ' unique';
//         return $this;
//     }
//     public function DBInteger($name)
//     {
//         $this->migration_query .= $name . ' INT(100) NOT NULL';
//         return $this;
//     }
//     public function DBTimeStamps(){
//         $this->migration_query.='created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP';
//         $this->migration_query.='updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP';
//         return $this;
//     }
//     public function DBQueryMigrate()
//     {
//         return $this->migration_query;
//     }
//     public function test(){
//         "Tested";
//     }
// }
// class TableMigrate extends QueryMigrate
// {
//     protected $generate_query;
//     private $table_name;
//     public function __construct()
//     {
//         parent::__construct();
//     }
//     public function table($table)
//     {
//         $this->generate_query = 'CREATE TABLE ' . $table;
//         $this->table_name = $table;
//         return $this;
//     }
//     public function executeQuery($query)
//     {
//         $query = $this->generate_query . ' (' . implode(', ', $query).')';
//         if ($this->pdo) {
//             try {
//                 $this->pdo->exec($query);
//                 echo "Table ".$this->table_name." created successfully";
//             } catch (PDOException $e) {
//                 echo "Error creating table: " . $e->getMessage();
//             }
//         } else {
//             echo "No database connection.";
//         }
//     }
// }