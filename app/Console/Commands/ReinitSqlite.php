<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class ReinitSqlite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reinit:sqlite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes and creates a sqlite database file';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        File::delete(storage_path('db/db.sqlite'));
        File::put(storage_path('db/db.sqlite'), '');
    }
}
