<?php

namespace TestFolder;

use Databases\TableMigrate;
use TestFolder\main_file;

class file_2 extends TableMigrate
{
    public function index($num)
    {
        $obj = new main_file();
        echo "file 2";
        $obj->method_1($num);
        $this->test();
    }
}
