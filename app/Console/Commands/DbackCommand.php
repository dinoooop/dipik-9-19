<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Dback;

class DbackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:dback {arg1} {arg2?}';

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
        $method = $this->argument('arg1');
        $param = $this->argument('arg2');
        $dbackObj = new Dback();
        $dbackObj->$method($param);
    }
}
