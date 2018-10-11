<?php

namespace Drfraker\Snipe\Console;

use Illuminate\Console\Command;

class DumpDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snipe:copy-schema';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a copy of your mysql database schema';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $mysqldb = env('DB_DATABASE');

        exec("mysqldump --no-data -uroot -p {$mysqldb} > dump_mysql.sql");
    }
}
