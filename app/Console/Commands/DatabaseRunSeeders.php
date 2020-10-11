<?php


namespace App\Console\Commands;


class DatabaseRunSeeders extends Command
{
    protected $name = 'db:seed';
    protected $help = 'Seed Database Using Seeders';
    protected $description = 'Run Database Seeders';

    public function handler()
    {

        $this->info("====================================");
        $this->info("===== Seeding Database Tables ======");
        $this->info("====================================");

    	$command = base_path('vendor/bin/phinx seed:run');
        shell_exec($command);

        $this->info("======================================");
        $this->info("Successful when no error shown above");
        $this->info("======================================");

    }
}
