<?php


require 'vendor/autoload.php';


use TestFolder\file_1;
use TestFolder\file_2;
$obj_1=new file_1();
$obj_2=new file_2();
$obj_1->index("1");
$obj_2->index("2");