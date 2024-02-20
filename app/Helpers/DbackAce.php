<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DbackAce
{
    public function getTableBackupSql()
    {
        $columns = Schema::getColumnListing($this->table);
        $createTableSql = $this->getCreateTableSql();
        $inserts = DB::table($this->table)->get();
        

        $this->backupSql .= "SET FOREIGN_KEY_CHECKS=0;\n";
        $this->backupSql .= "$createTableSql;\n";
        $this->backupSql .= "TRUNCATE TABLE `{$this->tableName}`;\n";
        $this->backupSql .= "SET FOREIGN_KEY_CHECKS=1;\n";

        foreach ($inserts as $insert) {
            $values = [];

            foreach ($columns as $column) {
                $value = addslashes($insert->$column);
                $values[] = $value !== null ? "'$value'" : 'NULL';
            }

            $this->backupSql .= "INSERT INTO `{$this->tableName}` (`" . implode('`, `', $columns) . "`) VALUES (" . implode(', ', $values) . ");\n";
        }
    }

    public function getCreateTableSql()
    {
        $dropTableSql = "DROP TABLE IF EXISTS `{$this->tableName}`;\n";
        $createTable = DB::select("SHOW CREATE TABLE `{$this->tableName}`")[0];
        return $dropTableSql . $createTable->{'Create Table'};
    }

    public function removePrefix($inputString)
    {
        if (is_null($this->prefix) || $this->prefix == '') {
            return $inputString;
        }

        if (strpos($inputString, $this->prefix) === 0) {
            return substr($inputString, strlen($this->prefix));
        } else {
            return $inputString;
        }
    }
}
