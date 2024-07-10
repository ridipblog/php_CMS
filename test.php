<?php

namespace Database;
require_once "./Migration.php";
use Databases\TableMigrate as TableMigrate;

class create_user_table extends TableMigrate{
    private $query;
    public function __construct()
    {
        parent::__construct();
        $this->query=[
            $this->DBid()->DBQueryMigrate(),
            $this->DBstring('name')->DBQueryMigrate(),
            $this->DBstring('phone')->DBUnique()->DBQueryMigrate(),
            $this->DBstring('email')->DBUnique()->DBQueryMigrate(),
            $this->DBstring('username')->DBUnique()->DBQueryMigrate()
        ];
        // print_r(implode(', ',$query));
    }
    public function up(){
        $this->table('table_name')->executeQuery($this->query);
    }

}
$obj=new create_user_table();
// $obj->up();