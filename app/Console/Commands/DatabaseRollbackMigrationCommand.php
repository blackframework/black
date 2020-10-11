<?php


namespace App\Console\Commands;


class DatabaseRollbackMigrationCommand extends Command
{
    protected $name = 'migrate:rollback';
    protected $help = 'Rollback Database Migration Command';
    protected $description = 'Rollback Previous Database Migration';

    public function handler()
    {

    	$this->info("====================================");
        $this->info("Rolling back the last migrated table");
        $this->info("====================================");

    	$command = base_path('vendor/bin/phinx rollback');
        shell_exec($command);

        $this->info("===================================================================");
        $this->info("Successful (If this message is the only message, Errors show above)");
        $this->info("===================================================================");
        
    }
}
