<?php

namespace App\Console\Commands;

class MakeControllerCommand extends MakeScaffoldCommand
{
    /**
     * Define console command name
     * php slim make:command
     */
    protected $name = 'make:controller';
    protected $help = 'Generate Controller Scaffold';
    protected $description = 'Generate Controller Scaffold';

    protected function arguments()
    {
        return [
            'name' => $this->require('MakeController name command description'),
        ];
    }

    public function handler()
    {

        $name = $this->input->getArgument('name');

        $this->info("============================");
        $this->info("Making a new Controller file");
        $this->info("============================");

        $file = $this->scaffold(
            $this->stub('file'),
            $this->stub('replace.file')
        );

        $content = $this->scaffold(
            $this->stub('content'),
            $this->stub('replace.content')
        );

        $path = "{$this->stub('make_path')}/{$file}";

        $exists = $this->files->exists($path);

        if ($exists) {
            $this->info("===============================");
            return $this->error("{$file} already exists!");
            $this->info("===============================");
        }

        $status = $this->files->put($path, $content);

        $this->info("==========================================================");
        return $this->info("Successfully Generated {$file}! (status: {$status})");
        $this->info("==========================================================");

    }
}
