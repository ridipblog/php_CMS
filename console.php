<?php
require_once __DIR__ . '/vendor/autoload.php';

// require_once __DIR__ . '/Databases/Migrations/migration_lists.txt';

// require_once "./Databases/create_user_table.php";
use Database\create_user_table as create_user_table;
use Databases\TestMigration;

use function PHPSTORM_META\type;

class Console
{
    protected $commands = [];
    private $argv;
    protected $all_migration_files = [];
    protected $main_class_name;
    protected $current_table_name='';
    public function __construct($argv)
    {
        $this->argv = $argv;
        $this->commands = [
            "migrate" => "migrate",
            "db:migrate" => 'dbMigrate',
            "db:migration" => 'dbMigration'
        ];
        $this->all_migration_files = [
            'main_migration_path' => __DIR__ . '/ridip_framework/migration.php',
            'migration_list_path' => __DIR__ . '/Databases/Migrations/all_migration_list.php'
        ];
    }
    public function run()
    {
        global $argv;
        if (!isset($argv[1])) {
            echo "No command execute !";
            exit(1);
        }
        $command = $argv[1];
        if (isset($this->commands[$command])) {
            call_user_func([$this, $this->commands[$command]]);
        } else {
            echo "Command '$command' not found !";
        }
    }
    protected function migrate()
    {
        echo "migrate command ";
    }
    public function dbMigrate()
    {

        require __DIR__ . '/Databases/Migrations/all_migration_list.php';
        $content=<<<EOT
        <?php
        require __DIR__. '/../../vendor/autoload.php';
        EOT;
        file_put_contents($this->all_migration_files['migration_list_path'], $content);

    }
    // ----------------------- generate db migration file --------------
    protected function dbMigration()
    {
        if (isset($this->argv[2])) {
            $class_name = $this->argv[2];
            $this->all_migration_files['new_migration_path'] = __DIR__ . "/Databases/Migrations/$class_name.php";
            $this->all_migration_files['class_name']=$class_name;
            $this->main_class_name=$class_name;
            $check_file_error = [
                $this->all_migration_files['main_migration_path'] => 11,
                $this->all_migration_files['migration_list_path'] => 11,
                $this->all_migration_files['new_migration_path'] => 21,
                // $file_content => 12
            ];
            $this->checkMigrationFile($check_file_error);
            $this->generateMigrationFile()->addMigrartionList();
            // require_once __DIR__ ."/Databases/Migrations/employees_4.php";
            // $obj=new employees_4();
            // $obj->index();
            echo "created ".$this->all_migration_files['class_name'] ." migration file ";
        } else {
            echo "Enter a table name ";
        }
    }
    // ---------------- check migration file on creation ------------------
    protected function checkMigrationFile($check_file_error)
    {
        $check = true;
        foreach ($check_file_error as $check_file_key => $check_file_value) {
            $perform = array_map('intval', str_split($check_file_value));
            $perform[1] == 1 ? (file_exists($check_file_key) ? '' : $check = false) : (isset($check_file_key) ?: $check = false);
            // (!$check?($perform[0]==1?print("migration file not found "):($perform[0]==2?$check=true:'')):($perform[0]==2?print('Problem in create migration file trywith another name'):''));
            if (!((!$check ? ($perform[0] == 1 ? false : true) : ($perform[0] == 2 ? false : true)))) {
                echo $perform[0] == 1 ? "migration file not found " : "problem in create migration file ";
                exit(1);
                break;
            }
        }
    }
    // ----------------- generate migration file -----------------
    protected function generateMigrationFile()
    {
        try {
            $file_content = file_get_contents($this->all_migration_files['main_migration_path']);
            $file_content = preg_replace('/\btable_name_000_000\b/im', $this->all_migration_files['class_name'], $file_content);
            // print_r($file_content);
            file_put_contents($this->all_migration_files['new_migration_path'], $file_content);
        } catch (Exception $err) {
            echo "Problem in migration file";
            exit(1);
        }
        return $this;
    }
    // ------------ add file in migration lists -------------
    protected function addMigrartionList()
    {
        echo $this->all_migration_files['class_name'];
        $name="coder";
        // $new_migration_content="require_once __DIR__ . '/".$this->all_migration_files['class_name'].".php';\n";
        $new_migration_content= <<<EOT
        \nuse Migrations\\$this->main_class_name;
        
        $$this->main_class_name = new $this->main_class_name();
        $$this->main_class_name->up();
        EOT;
        file_put_contents($this->all_migration_files['migration_list_path'], $new_migration_content, FILE_APPEND);
    }
    // ----------- check table exists or not --------------
}
$console = new Console($argv);
$console->run();
