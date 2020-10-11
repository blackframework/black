<?php

namespace App\Console\Commands;

use DB;
// use Symfony\Component\Console\Helper\DialogHelper;

class DatabaseDropCommand extends Command
{
    protected $name = 'db:drop';
    protected $help = 'Drop all database tables';
    protected $description = 'Drop all database tables';

    public function handler()
    {

       $this->info("====================");

       $this->info("Droping All Tables");

       $this->info("====================");


       $column = "Tables_in_" . env("DB_DATABASE");
       $tables = DB::select("SHOW TABLES");

       foreach ($tables as $table) {
           $dropping[] = $table->$column;
       }

       if (empty($dropping)) {

           $this->info("================================");

           $this->info("No Tables in Database To Drop");

           $this->info("================================");
       } else {
           $dropping = implode(', ', $dropping);

           DB::beginTransaction();

           DB::statement("DROP TABLE {$dropping}");

           DB::commit();

           $this->info("================================");
           
           $this->info("Dropped All Tables: {$dropping}");

           $this->info("================================");
       }


       $this->info("==========================");
       $this->info("Tables Droped Successfully");
       $this->info("==========================");
    }
}

