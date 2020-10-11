<?php


namespace App\Console\Commands;


class DatabaseMigrateCommand extends Command
{
    protected $name = 'db:migrate';
    protected $help = 'migrate';
    protected $description = 'Migration migrations to database';

    public function handler()
    {

        $this->info("================");
        $this->info("Migrating Tables");
        $this->info("================");
        
    	$command = base_path('vendor/bin/phinx migrate');
        shell_exec($command);

        $this->info("====================================");
        $this->info("Successful when no error shown above");
        $this->info("====================================");
    }
}
