<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

/**
 * 
 * 
 * The class is used only for test purpose of the app
 * Not have any role in application functions
 */
class Dback
{
    function __construct()
    {
        // Config
        $this->env = config('app.env');
        if($this->env == 'local'){
            $this->mysqldump = 'E:/xampp-7/mysql/bin/mysqldump';
            $this->mysqlPath = 'E:/xampp-7/mysql/bin/mysql';
        } else {
            $this->mysqldump = '/usr/bin/mysqldump';
            $this->mysqlPath = '/usr/bin/mysql';
        }
        $this->prefix = config('database.connections.mysql.prefix');

        $this->tables = [];
        $showTables = DB::select('SHOW TABLES');
        $tablesIn = 'Tables_in_' . env('DB_DATABASE');
        
        foreach ($showTables as $table) {
            if($this->prefix !== '' && strpos($table->$tablesIn, $this->prefix) === 0){
                $this->tables[] = $table->$tablesIn;
            }
        }
    }

    public function printer()
    {
        dd($this->tables);
    }

    public function dropTables()
    {
        foreach ($this->tables as $table) {
            Schema::dropIfExists($table);
        }
    }

    public function backup($bkpfilename = null)
    {

        if (is_null($bkpfilename)) {
            $bkpfilename = rand(10000, 90000);
            $filename = date('Y-m-d-H-i-s') . '-' . $bkpfilename . '.sql';
        } else {
            $filename = $bkpfilename . '.sql';
        }

        $filePath = storage_path('app/dback/' . $filename);
        $selectedTables = '';
        if($this->prefix !== ''){
            $selectedTables = implode(' ', $this->tables);
        } 
        $command = $this->mysqldump . ' --user=' . env('DB_USERNAME') . ' --host=' . env('DB_HOST') . ' ' . env('DB_DATABASE') . ' ' . $selectedTables . ' > ' . $filePath;
        $returnVar = NULL;
        $output = NULL;
        exec($command, $output, $returnVar);
        echo $filename;
    }

    // restore the last backup file or given file
    public function restore($latestSqlFile = null)
    {


        if (is_null($latestSqlFile)) {

            $filePath = storage_path('app/dback/*');
            $sql = glob($filePath);

            $total = count($sql);
            if ($total == 0) {
                echo "No backups available";
                return;
            }

            $lastKey = $total - 1;
            $latestSqlFile = $sql[$lastKey];
        } else {
            $latestSqlFile = storage_path('app/dback/' . $latestSqlFile);
        }

        $command = $this->mysqlPath . ' -u ' . env('DB_USERNAME') . ' ' . env('DB_DATABASE') . ' < ' . $latestSqlFile;

        $returnVar = NULL;
        $output = NULL;
        exec($command, $output, $returnVar);
    }

    // Keep the last five sql backup files
    public function five()
    {
        $filePath = storage_path('app/dback/*');
        $sqlFiles = glob($filePath);
        rsort($sqlFiles);

        foreach ($sqlFiles as $key => $value) {
            if ($key < 5) {
                continue;
            }

            unlink($value);
        }
    }

    // Keep the last five sql backup files
    public function list()
    {
        $filePath = storage_path('app/dback/*');
        $sqlFiles = glob($filePath);
        rsort($sqlFiles);

        foreach ($sqlFiles as $key => $value) {
            if ($key < 5) {
                echo basename($value) . "\n";
            } else {
                break;
            }
        }
    }


   
}
