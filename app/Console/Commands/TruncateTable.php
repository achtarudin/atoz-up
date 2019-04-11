<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'truncate:history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate  table Topup, Product, Order History';

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
        DB::table('atoz_product.topups')->truncate();
        DB::table('atoz_product.products')->truncate();
        DB::table('atoz_product.order_histories')->truncate();
        DB::table('atoz_user.jobs')->truncate();
    }
}
