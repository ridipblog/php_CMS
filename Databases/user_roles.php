<?php
// include "../Config/config.php";
// include "./database_class.php";
// class user_roles extends database_class{
//     protected $conn;
//     function __construct($conn,$call){
//         $this->conn=$conn;
//         $call =="up" ? $this->up() :$this->down();
//     }
//     protected function up()
//     {
//         $query = "CREATE TABLE users(
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     user_id int
//     role_id int
//     index (user_id),
//     fore
//     )";
//     $this->manageTable($this->conn,$query);
//     }
//     protected function down(){
//         $query="DROP table users";
//         $this->manageTable($this->conn,$query);
//     }
// }
// ?>