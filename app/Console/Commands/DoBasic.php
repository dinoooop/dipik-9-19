<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Dback;

class DoBasic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:basic {type?} {arg1?} {arg2?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Basic DB operations';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $type = $this->argument('type');

        if ($type == 'dback') {

            // backup DB
            // method -> backup, restore, five, list
            $method = $this->argument('arg1');
            $arg2 = $this->argument('arg2');
            $dbackObj = new Dback();
            $dbackObj->$method($arg2);
        }
    }
}
