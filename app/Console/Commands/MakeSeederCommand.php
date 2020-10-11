<?php


namespace App\Console\Commands;


class MakeSeederCommand extends Command
{
    protected $name = 'make:seeder';
    protected $help = 'Make a Seeder Scaffold';
    protected $description = 'Generate a database seeder scaffold';

    protected function arguments()
    {
        return [
            'name' => $this->require('Name of Scaffolded Seeder Class')
        ];
    }

    public function handler()
    {
        $this->info("========================");
        $this->info("Making a Seeder Scaffold");
        $this->info("========================");
        
        $name = $this->input->getArgument('name');
    	$command = base_path('vendor/bin/phinx seed:create {$name}');

        shell_exec($command);

        $this->info("=================================================");
        $this->info("Successful if no error message is displayed above");
        $this->info("=================================================");

    }
}
