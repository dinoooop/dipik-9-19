<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class BackupTables extends Command
{
    protected $signature = 'backup:tables {filename}';
    protected $description = 'Backup database tables';

    private $backupSql = '';

    public function handle()
    {

        $tables = ['users', 'blogs'];
        $backupDirectory = storage_path('app/dback');

        if (!File::exists($backupDirectory)) {
            File::makeDirectory($backupDirectory, 0755, true);
        }

        $filename = $this->argument('filename') . '.sql';
        $path = "{$backupDirectory}/{$filename}";

        foreach ($tables as $table) {
            $this->backupSql = '';
            $this->getTableBackupSql($table);
            $this->info("Backup created for table '{$table}'");
            file_put_contents($path, $this->backupSql . "\n", FILE_APPEND);
        }

        $this->info("Backup process completed. All tables backed up to '{$path}'.");
    }

    private function getTableBackupSql($table)
    {
        $columns = Schema::getColumnListing($table);
        $createTableSql = $this->getCreateTableSql($table);
        $inserts = DB::table($table)->get();
        $tablePrefix = config('database.connections.mysql.prefix');

        $this->backupSql .= "SET FOREIGN_KEY_CHECKS=0;\n";
        $this->backupSql .= "$createTableSql;\n";
        $this->backupSql .= "TRUNCATE TABLE `{$tablePrefix}{$table}`;\n";
        $this->backupSql .= "SET FOREIGN_KEY_CHECKS=1;\n";

        foreach ($inserts as $insert) {
            $values = [];

            foreach ($columns as $column) {
                $value = addslashes($insert->$column);
                $values[] = $value !== null ? "'$value'" : 'NULL';
            }

            $this->backupSql .= "INSERT INTO `{$tablePrefix}{$table}` (`" . implode('`, `', $columns) . "`) VALUES (" . implode(', ', $values) . ");\n";
        }
    }

    private function getCreateTableSql($table)
    {
        $tablePrefix = config('database.connections.mysql.prefix');
        $tableName = "{$tablePrefix}{$table}";


        $dropTableSql = "DROP TABLE IF EXISTS `$tableName`;\n";

        $createTable = DB::select("SHOW CREATE TABLE `$tableName`")[0];
        return $dropTableSql . $createTable->{'Create Table'};
    }
}
