<?php

namespace Databases;
// require_once __DIR__ .'/../Config/Database.php';


use Config\Database as Database;
use PDOException;

class QueryMigrate extends Database
{
    protected $migration_query;
    public function __construct()
    {
        parent::__construct();
    }
    public function DBid(){
        $this->migration_query='id INT AUTO_INCREMENT PRIMARY KEY';
        return $this;
    }
    public function DBstring($name)
    {
        $this->migration_query = $name . ' VARCHAR(255)';
        return $this;
    }
    public function DBNull()
    {
        $this->migration_query .= " NULL";
        return $this;
    }
    public function DBDefault($value)
    {
        $this->migration_query .= " default '" . $value."'";
        return $this;
    }
    public function DBUnique()
    {
        $this->migration_query .= ' unique';
        return $this;
    }
    public function DBInteger($name)
    {
        $this->migration_query = $name . ' INT(100) NOT NULL';
        return $this;
    }
    public function DBText($name){
        $this->migration_query=$name.' TEXT(2000) NOT NULL';
    }
    public function DBTimeStamps(){
        $this->migration_query.='created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP';
        $this->migration_query.='updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP';
        return $this;
    }
    public function DBQueryMigrate()
    {
        if(!preg_match('/(NULL)/',$this->migration_query)){
            $this->migration_query.=' NOT NULL';
        }
        return $this->migration_query;
    }
    public function test(){
        echo "Tested";
    }
}