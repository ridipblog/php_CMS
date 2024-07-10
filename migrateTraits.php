<?php
require_once __DIR__."/Databases/create_user_table.php";

trait migrateTraits{
    public function index($name){
        echo $name;
    }
}