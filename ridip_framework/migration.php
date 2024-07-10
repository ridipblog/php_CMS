<?php

// namespace Database; old migration file namespcace
// namespace Database\Migrations;
// require __DIR__ . '/../Migration.php';
namespace Migrations;
use Databases\TableMigrate;

class table_name_000_000 extends TableMigrate{
    private $query;
    public function __construct()
    {
        parent::__construct();
        $this->query=[
            // ------------------- write your column requirements-------------------------
        ];
        // print_r(implode(', ',$query));
    }
    public function up(){
        $this->table('table_name_000_000')->executeQuery($this->query);
    }
    public function index(){
        echo "Home";
    }

}
// $obj=new table_name_000_000();
// $obj->up();