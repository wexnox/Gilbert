<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the application by clearing caches and re-running all migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Clear application cache
        $this->call('cache:clear');

        // Clear route cache
        $this->call('route:clear');

        // Clear config cache
        $this->call('config:clear');

        // Clear compiled views
        $this->call('view:clear');

        // Rollback all migrations and re-run them
        $this->call('migrate:refresh');

        // Any other commands you want to run
        // $this->call('your:command');

        $this->info('Application has been refreshed!');
    }
}
