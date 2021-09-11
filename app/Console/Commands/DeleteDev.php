<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moyenne:deletedev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'moyenne à supprimer tous les trois mois';

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
     * @return int
     */
    public function handle()
    {
        DB::table('moyennes')->whereIn('type_id', [1, 2])->delete();
        echo"operation done";
        //return 'boco dev laravel';
    }
}
