<?php

namespace Drfraker\Snipe\Console;

use Illuminate\Console\Command;

class CreateSqliteDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snipe:create-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new sqlite db based on your mysql dump file for testing.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $db = database_path('database.db');

        if (! file_exists($db)) {
            exec(base_path('vendor/dumblob/mysql2sqlite/mysql2sqlite ').base_path('dump_mysql.sql')." | sqlite3 ". $db);
        }
    }
}
