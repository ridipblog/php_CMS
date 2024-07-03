<?php
include "../Config/config.php";
include "./database_class.php";
// ---------------------- create users table -------------------
class users extends database_class
{
    protected $conn;
    function __construct($conn,$call)
    {
        $this->conn=$conn;
        $call =="up" ? $this->up() :$this->down();
    }
    protected function up()
    {
        $query = "CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    unique_name VARCHAR(255) NOT NULL UNIQUE,
    password varchar(255) not null,
    name varchar(255) not null,
    email_id varchar(255) not null unique,
    phone_number varchar(255) not null unique)";
    $this->manageTable($this->conn,$query);
    }
    protected function down(){
        $query="DROP table users";
        $this->manageTable($this->conn,$query);
    }
}

new users($conn,'up');