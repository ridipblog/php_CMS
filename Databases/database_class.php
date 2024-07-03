<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
class database_class{
    function __construct()
    {
        
    }
    protected function manageTable($conn,$query){
        if($conn->query($query)=== TRUE){
            echo "Query executed successfully !";
        }else{
            echo "Error query not resloved !";
        }
    }
}