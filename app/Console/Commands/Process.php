<?php

namespace App\Console\Commands;

use App\Model\Activity;
use Illuminate\Console\Command;

class Process extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $startMemory = memory_get_usage();
        // $array = range(1, 4100000);
        // foreach ($array as $key => $value) {
        //   $Activity =new Activity();
        //   $Activity->admin_id=1;
        //   $Activity->message=$value;
        //   $Activity->save();
        // }
        // return 'success';
    }
}
