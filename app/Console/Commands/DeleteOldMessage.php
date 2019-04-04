<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteOldMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteOldMessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Message by Command';

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
    public function handle(){
      echo "Delete The Message\n";
    }
}
