<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResetDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:db {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the database to default';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filename = $this->argument('filename');
        $file = Storage::get("/dback/{$filename}.sql");
        DB::unprepared($file);
        $this->info($filename . ' DB imported successfully');
    }
}
